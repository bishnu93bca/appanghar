<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class UsersController extends AppController{
	
	public function index(){
		 $this->viewBuilder()->layout('ajax');

	}
	public function view(){
		$this->viewBuilder()->layout('ajax');


	}
	public function edit(){
		$this->viewBuilder()->layout('ajax');


	}
	public function delete(){
		$this->viewBuilder()->layout('ajax');


	}
	public function login(){
		 $this->viewBuilder()->layout('login');
		 $users='';
		 if ($this->request->is('post')) {
		 	 $session= $this->request->session();
             if ($users=$this->Users->find('all')->where(['email'=>$this->request->data['email']])->andwhere(['password'=>$this->request->data['password']])->first()){
            	$session->write('user',$users);
            	
                $this->Flash->success(__('Login successful.'));
                return $this->redirect(['controller'=>'cities','action'=>'index']);
            }
            $this->Flash->error(__('Unable to add your filter.'));
        }
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

	}
	public function logout(){
		 $this->viewBuilder()->layout('login');
		 $session= $this->request->session();
		$session->destroy('user');
		return $this->redirect(['controller'=>'Users','action' => 'login']);

	}


}