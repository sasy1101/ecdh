<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cars Controller
 *
 * @property \App\Model\Table\CarsTable $Cars
 *
 * @method \App\Model\Entity\Car[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsController extends AppController
{
	
	public function isAuthorized($user)
	{
		if($this->request->getParam('action') === 'add' && in_array($user['rule'], ['admin', 'driver'])) return true;
		
		if(in_array($this->request->getParam('action'), ['edit', 'delete'])) {
			$car_id = (int) $this->request->getParam('pass.0');
			if($this->Cars->isOwnedBy($car_id, $user['id'])) return true;
		} else return false;
		
		// By default deny access.
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
            'contain' => ['Users']
        ];
        $cars = $this->paginate($this->Cars);

        $this->set(compact('cars'));
    }

    /**
     * View method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => ['Users', 'Travels']
        ]);

        $this->set('car', $car);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $car = $this->Cars->newEntity();
        if ($this->request->is('post')) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $users = $this->Cars->Users->find('list', ['limit' => 200]);
        $this->set(compact('car', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            if ($this->Cars->save($car)) {
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $users = $this->Cars->Users->find('list', ['limit' => 200]);
        $this->set(compact('car', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $car = $this->Cars->get($id);
        if ($this->Cars->delete($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
