<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class CommentsController extends AppController{

	// public function index(){
 //        $this->viewBuilder()->layout('defaultview');
 //    }
    public function listadmin(){
        $this->viewBuilder()->layout('admin');
         $Comments = $this->paginate($this->Comments);
         $this->set(compact('Comments'));
        $this->set('_serialize', ['Comments']);
    }
    public function listview($id=null){
        $this->viewBuilder()->layout('admin');
         $Comments = $this->Comments->get($id, [
            'contain' => []
        ]);
        $this->set('Comments', $Comments);
        $this->set('_serialize', ['Comments']);
    }
    public function add($id=null){
        $this->viewBuilder()->layout('ajax');
        $Comments = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $value=$this->request->data['image'];
                $filePath = WWW_ROOT."img".DS."rooms".DS;
                $filename = end(explode('.',$value['name']));
                $imagename = 'Img_'.time().rand().'.'.$filename;
                if(pathinfo($imagename, PATHINFO_EXTENSION)){ 
                    $this->request->data['image']=$imagename; 
                }

                move_uploaded_file($value['tmp_name'],$filePath.$imagename);
                $this->request->data['blog_id']=$id;
            
            $Comments = $this->Comments->patchEntity($Comments, $this->request->data);
            if ($this->Comments->save($Comments)) {
                $this->Flash->success(__('Your Comments has been Submit.'));
                return $this->redirect(['controller'=>'Blogs','action' =>'view',$id]);
            }
            $this->Flash->error(__('Unable to submit your Comments.'));
            return $this->redirect(['controller'=>'Blogs','action' =>'view',$id]);
        }
        $this->set(compact('Comments'));
        $this->set('_serialize', ['Comments']);
    }
    public function view($id=null){
        $this->viewBuilder()->layout('defaultview');
        // $Comments = $this->Comments->get($id, [
        //     'contain' => []
        // ]);
        // $this->set('Comments', $Comments);
        // $this->set('_serialize', ['Comments']);
    }
    public function edit($id=null){
        $this->viewBuilder()->layout('admin');
        $Comments = $this->Comments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        $value=$this->request->data['image'];
                $filePath = WWW_ROOT."img".DS."rooms".DS;
                $filename = end(explode('.',$value['name']));
                $imagename = 'Img_'.time().rand().'.'.$filename;
                if(pathinfo($imagename, PATHINFO_EXTENSION)){ 
                    $this->request->data['image']=$imagename; 
                }
                move_uploaded_file($value['tmp_name'],$filePath.$imagename);
            
            $Comments = $this->Comments->patchEntity($Comments, $this->request->data);
            if ($this->Comments->save($Comments)) {
                $this->Flash->success(__('Your Comments has been saved.'));
                return $this->redirect(['action' =>'listadmin']);
            }
            $this->Flash->error(__('Unable to add your Comments.'));
        }
        $this->set(compact('Comments'));
        $this->set('_serialize', ['Comments']);
    }
    public function delete($id=null){
        $this->viewBuilder()->layout('admin');
         $Comments = $this->Comments->get($id);
        if ($this->Comments->delete($Comments)) {
            $this->Flash->success(__('The Comments has been deleted.'));
        } else {
            $this->Flash->error(__('The Comments could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'Blogs','action' => 'listadmin']);
    }
}