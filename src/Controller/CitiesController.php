<?php

namespace App\Controller;

use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class CitiesController extends AppController{

    public function initialize()
    {
        parent::initialize();
        // Add the 'add' action to the allowed actions list.
     //  $this->Auth->allow([ 'add']);
    }
	
	public function index(){
		$this->viewBuilder()->layout('admin');
		$cities = $this->paginate($this->Cities);

         $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);

	}
	public function view($id=null){
		$this->viewBuilder()->layout('admin');
         $cities = $this->Cities->get($id, [
            'contain' => ['Location']
        ]);
        $this->set('cities', $cities);
        $this->set('_serialize', ['cities']);
	}
	public function add(){
		$this->viewBuilder()->layout('admin');
		$cities = $this->Cities->newEntity();
        if ($this->request->is('post')) {
           // $this->request->data['is_active']=1;
            $cities = $this->Cities->patchEntity($cities, $this->request->data);
            if ($this->Cities->save($cities)) {
                $this->Flash->success(__('Your cities has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your cities.'));
        }
         $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);

	}
	public function edit($id=null){
		$this->viewBuilder()->layout('admin');
		$cities = $this->Cities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cities = $this->Cities->patchEntity($cities, $this->request->data);
            if ($this->Cities->save($cities)) {
                $this->Flash->success(__('The cities has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cities could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);
	}
	public function delete($id=null){
		 $Location    =   TableRegistry::get('location');
        $cities = $this->Cities->get($id,['contain'=>['Location']]);

        foreach ($cities->location as $key => $value) {
           $location=$Location->find('all')->where(['id'=>$value->id])->first();
           if ($Location->delete($location)) {}

        }
        if ($this->Cities->delete($cities)) {
            $this->Flash->success(__('The cities has been deleted.'));
        } else {
            $this->Flash->error(__('The cities could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function ajax(){
        $this->viewBuilder()->layout('ajax');
        $cities = $this->Cities->find('all')->select(['id','name']);

         $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);

    }
	

}