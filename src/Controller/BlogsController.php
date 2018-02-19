<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class BlogsController extends AppController{

	public function index(){
        $this->viewBuilder()->layout('defaultview');
        $Blogs = $this->Blogs->find('all',['order'=>array('id DESC')]);
         $this->set(compact('Blogs'));
        $this->set('_serialize', ['Blogs']);
    }
    public function listadmin(){
        $this->viewBuilder()->layout('admin');
         $Blogs = $this->paginate($this->Blogs->find('all',['order'=>array('id DESC')]));
         $this->set(compact('Blogs'));
        $this->set('_serialize', ['Blogs']);
    }
    public function listview($id=null){
        $this->viewBuilder()->layout('admin');
		 $Blogs = $this->Blogs->get($id, [
            'contain' => ['Comments']
        ]);
		
        $this->set('Blogs', $Blogs);
        $this->set('_serialize', ['Blogs']);
    }
    public function add(){
        $this->viewBuilder()->layout('admin');
        $Blogs = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
        	$value=$this->request->data['images'];
                $filePath = WWW_ROOT."img".DS."rooms".DS;
                $filename = end(explode('.',$value['name']));
                $imagename = 'Img_'.time().rand().'.'.$filename;
                if(pathinfo($imagename, PATHINFO_EXTENSION)){ 
                    $this->request->data['images']=$imagename; 
                }
                move_uploaded_file($value['tmp_name'],$filePath.$imagename);
            
            $Blogs = $this->Blogs->patchEntity($Blogs, $this->request->data);
            if ($this->Blogs->save($Blogs)) {
                $this->Flash->success(__('Your Blogs has been saved.'));
                return $this->redirect(['action' =>'listadmin']);
            }
            $this->Flash->error(__('Unable to add your Blogs.'));
        }
        $this->set(compact('Blogs'));
        $this->set('_serialize', ['Blogs']);
    }
    public function view($id=null){
        $this->viewBuilder()->layout('defaultview');
        $Blogs = $this->Blogs->get($id, [
            'contain' => ['Comments']
        ]);
        $blogs = $this->Blogs->find('all')->select(['name','id']);
        $this->set('Blogs', $Blogs,$blogs);
        $this->set('blogs',$blogs);
        $this->set('_serialize', ['Blogs']);
    }
    public function edit($id=null){
        $this->viewBuilder()->layout('admin');
        $Blogs = $this->Blogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        $value=$this->request->data['images'];
                $filePath = WWW_ROOT."img".DS."rooms".DS;
                $filename = end(explode('.',$value['name']));
                $imagename = 'Img_'.time().rand().'.'.$filename;
                if(pathinfo($imagename, PATHINFO_EXTENSION)){ 
                    $this->request->data['images']=$imagename; 
                }
                move_uploaded_file($value['tmp_name'],$filePath.$imagename);
            
            $Blogs = $this->Blogs->patchEntity($Blogs, $this->request->data);
            if ($this->Blogs->save($Blogs)) {
                $this->Flash->success(__('Your Blogs has been saved.'));
                return $this->redirect(['action' =>'listadmin']);
            }
            $this->Flash->error(__('Unable to add your Blogs.'));
        }
        $this->set(compact('Blogs'));
        $this->set('_serialize', ['Blogs']);
    }
    public function delete($id=null){
        $this->viewBuilder()->layout('admin');
         $Blogs = $this->Blogs->get($id);
        if ($this->Blogs->delete($Blogs)) {
            $this->Flash->success(__('The Blogs has been deleted.'));
        } else {
            $this->Flash->error(__('The Blogs could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listadmin']);
    }
}