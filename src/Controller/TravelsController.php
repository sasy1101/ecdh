<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Query;
use App\Model\Entity\Passenger;

/**
 * Travels Controller
 *
 * @property \App\Model\Table\TravelsTable $Travels
 *
 * @method \App\Model\Entity\Travel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TravelsController extends AppController
{
	
	public function isAuthorized($user)
	{
		if(in_array($user['rule'], ['admin', 'driver'])) return true;
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
            'contain' => ['Cars']
        ];
        
        $travels = $this->paginate($this->Travels);
        $data = $this->paginate($this->Travels->find()->select(['id', 'hanyutas' => 'count(*)']));
        

        $this->set(compact('travels', 'data'));
    }

    /**
     * View method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travel = $this->Travels->get($id, [
            'contain' => ['Cars', 'Passengers']
        ]);

        $this->set('travel', $travel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $travel = $this->Travels->newEntity();
        if ($this->request->is('post')) {
            $travel = $this->Travels->patchEntity($travel, $this->request->getData());
            if ($this->Travels->save($travel)) {
                $this->Flash->success(__('The travel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel could not be saved. Please, try again.'));
        }
        $cars = $this->Travels->Cars->find('list', ['limit' => 200]);
        $this->set(compact('travel', 'cars'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$travel = $this->Travels->get($id, [
    			'contain' => []
    	]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travel = $this->Travels->patchEntity($travel, $this->request->getData());
            if ($this->Travels->save($travel)) {
                $this->Flash->success(__('The travel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel could not be saved. Please, try again.'));
        }
        $cars = $this->Travels->Cars->find('list', ['limit' => 200]);
        $this->set(compact('travel', 'cars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travel = $this->Travels->get($id);
        if ($this->Travels->delete($travel)) {
            $this->Flash->success(__('The travel has been deleted.'));
        } else {
            $this->Flash->error(__('The travel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
