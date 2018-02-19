<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class LocationController extends AppController{

   
	
	public function index(){
		$this->viewBuilder()->layout('admin');
		$location = $this->paginate($this->Location);

         $this->set(compact('location'));
        $this->set('_serialize', ['location']);

	}
	public function view($id=null){
		$this->viewBuilder()->layout('admin');
	}
	public function add(){
		$this->viewBuilder()->layout('admin');
		$location = $this->Location->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['is_active']=1;
            $location = $this->Location->patchEntity($location, $this->request->data);
            
            if ($this->Location->save($location)) {
                $this->Flash->success(__('Your Location has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Location.'));
        }
        $cities = $this->Location->Cities->find('list', ['limit' => 200]);
        $this->set(compact('location', 'cities'));
        $this->set('_serialize', ['location']);


	}
	public function edit($id=null){
		$this->viewBuilder()->layout('admin');
		$location = $this->Location->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['is_active']=1;
            $location = $this->Location->patchEntity($location, $this->request->data);
            
            if ($this->Location->save($location)) {
                $this->Flash->success(__('Your Location has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Location.'));
        }
        $cities = $this->Location->Cities->find('list', ['limit' => 200]);
        $this->set(compact('location', 'cities'));
        $this->set('_serialize', ['location']);
	}
	public function delete($id=null){
		$this->viewBuilder()->layout('admin');
		 $Location = $this->Location->get($id);
        if ($this->Location->delete($Location)) {
          

            $this->Flash->success(__('The Location has been deleted.'));
        } else {
            $this->Flash->error(__('The Location could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
	}
    public function ajax($id=null){
        $this->viewBuilder()->layout('ajax');
        $location =$this->Location->find('all')->select(['id','name'])->where(['city_id'=>$id]);
        $this->set(compact('location'));
        $this->set('_serialize', ['location']);
    }
	
	

}