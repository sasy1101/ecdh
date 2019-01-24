<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Passengers Controller
 *
 * @property \App\Model\Table\PassengersTable $Passengers
 *
 * @method \App\Model\Entity\Passenger[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PassengersController extends AppController
{
	
	public function isAuthorized($user) 
	{
		if(in_array($user['rule'], ['admin', 'passenger'])) return true;
		return false;
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Travels', 'Users']
        ];
        $passengers = $this->paginate($this->Passengers);

        $this->set(compact('passengers'));
    }

    /**
     * View method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passenger = $this->Passengers->get($id, [
            'contain' => ['Travels', 'Users']
        ]);

        $this->set('passenger', $passenger);
    }
    
    public function signup($id)
    {
    	$passenger = $this->Passengers->newEntity();
    	$passenger = $this->Passengers->patchEntity($passenger, ['travel_id' => $id, 'user_id' => $this->Auth->user('id')]);
    	if ($this->Passengers->save($passenger)) {
    		$this->Flash->success(__('The passenger has been saved.'));
    		 
    		return $this->redirect(['action' => 'index']);
    	}
    	$this->Flash->error(__('The passenger could not be saved. Please, try again.'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $passenger = $this->Passengers->newEntity();
        if ($this->request->is('post')) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passenger could not be saved. Please, try again.'));
        }
        $travels = $this->Passengers->Travels->find('list', ['limit' => 200]);
        $users = $this->Passengers->Users->find('list', ['limit' => 200]);
        $this->set(compact('passenger', 'travels', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passenger = $this->Passengers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passenger could not be saved. Please, try again.'));
        }
        $travels = $this->Passengers->Travels->find('list', ['limit' => 200]);
        $users = $this->Passengers->Users->find('list', ['limit' => 200]);
        $this->set(compact('passenger', 'travels', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passenger = $this->Passengers->get($id);
        if ($this->Passengers->delete($passenger)) {
            $this->Flash->success(__('The passenger has been deleted.'));
        } else {
            $this->Flash->error(__('The passenger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
