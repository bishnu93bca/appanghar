<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class CategoriesController extends AppController{
	
	public function index(){
		$this->viewBuilder()->layout('admin');
		$categories = $this->paginate($this->Categories);

         $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);

	}
	public function view($id=null){
		$this->viewBuilder()->layout('admin');
	}
	public function add(){
		$this->viewBuilder()->layout('admin');
		$categories = $this->Categories->newEntity();
        if ($this->request->is('post')) {
           // $this->request->data['is_active']=1;
            $categories = $this->Categories->patchEntity($categories, $this->request->data);
            if ($this->Categories->save($categories)) {
                $this->Flash->success(__('Your categories has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your categories.'));
        }
         $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);

	}
	public function edit($id=null){
		$this->viewBuilder()->layout('admin');
		$categories = $this->Categories->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categories = $this->Categories->patchEntity($categories, $this->request->data);
            if ($this->Categories->save($categories)) {
                $this->Flash->success(__('The categories has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categories could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
	}
	public function delete($id=null){
		$this->viewBuilder()->layout('admin');
        $categories = $this->Categories->get($id);
        if ($this->Categories->delete($categories)) {
            $this->Flash->success(__('The categories has been deleted.'));
        } else {
            $this->Flash->error(__('The categories could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
    public function ajax(){
        $this->viewBuilder()->layout('ajax');
        $categories = $this->Categories->find('all')->select(['id','name']);

         $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);

    }
		
	

}