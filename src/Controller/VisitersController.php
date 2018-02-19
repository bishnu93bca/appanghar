<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class VisitersController extends AppController{
	
	public function index(){
		$this->viewBuilder()->layout('admin');
		$visiters = $this->paginate($this->Visiters->find('all',['order'=>array('id DESC')]));

                 $this->set(compact('visiters'));
                $this->set('_serialize', ['visiters']);
	}
	public function view($id=null){
		$this->viewBuilder()->layout('admin');
	}
	public function add($id=null){
		$this->viewBuilder()->layout('admin');
		$visiters = $this->Visiters->newEntity();
        if ($this->request->is('post')) {
        	$this->request->data['name']=$this->request->data['firstname']." ".$this->request->data['lastname'];
        	$this->request->data['mobile']=$this->request->data['phone'];
        	$this->request->data['detail']=$this->request->data['rooms'];
        	$this->request->data['date']=$this->request->data['visit_date'];
        	$visiters = $this->Visiters->patchEntity($visiters, $this->request->data);
        	if ($this->Visiters->save($visiters)) {
                $this->Flash->success(__('Successful.'));
                return $this->redirect(['controller'=>'homes','action' => 'index']);
        	}
        }

	}
	public function edit($id=null){
		$this->viewBuilder()->layout('admin');
	}
	public function delete($id=null){
		$this->viewBuilder()->layout('admin');
	}
	

}