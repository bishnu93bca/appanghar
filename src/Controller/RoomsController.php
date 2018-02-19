<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class RoomsController extends AppController{
	
	public function index(){
        $this->viewBuilder()->layout('defaultview');
            $cities =TableRegistry::get('cities');
            $filters =TableRegistry::get('filters');
            $location =TableRegistry::get('location');
            $categories =TableRegistry::get('categories'); 
            
                if ($this->request->is('post')) { 

                $city_id=$this->request->data['cities'];
                $location_id=$this->request->data['location'];
                $category_id=$this->request->data['category'];
                
                $cities = $cities->find('all')->select(['id','name'])->where(['id'=>$city_id])->first();
                $loc = $location->find('all')->select(['id','name'])->where(['city_id'=>$city_id]);
                $categories = $categories->find('all')->select(['id','name'])->where(['id'=>$category_id])->first();
                $filters=$filters->find('all')->select(['room_id'])->where(['city_id'=>$city_id])->andwhere(['location_id'=>$location_id])->andwhere(['category_id'=>$category_id]);

                
                    foreach ($filters as $key => $value) {
                        $room_id[]= $value->room_id;
                    }
                    if(!empty($room_id)){
                    $rooms=$this->Rooms->find('all')->where(['id IN'=>$room_id]);
                }
                $filters=$filters->find('all')->select(['room_id'])->where(['city_id'=>$city_id])->andwhere(['category_id'=>$category_id]);
                foreach ($filters as $key => $value) {
                        $room_id[]= $value->room_id;
                    }
                    if(!empty($room_id)){
                    $popular=$this->Rooms->find('all',['limit'=>10])->where(['id IN'=>$room_id])->andwhere(['is_active'=>1]);
                }
                $this->set('popular',$popular);
                $this->set('cities',$cities);
                $this->set('location',$loc);
                $this->set('categories',$categories);
                $this->set(compact('rooms', 'cities','loc','categories'));
                $this->set('_serialize', ['rooms']); 
            }
        


	}
	public function view($id=null){
        $this->viewBuilder()->layout('defaultview');
        $filters =TableRegistry::get('filters');
         $rooms = $this->Rooms->get($id, [
            'contain' =>'Filters'
        ]);
         $location_id=$rooms->filters[0]->location_id;
        $filters=$filters->find('all')->select(['room_id'])->where(['location_id'=>$location_id]);
        foreach ($filters as $key => $value) {
                        $room_id[]= $value->room_id;
                    }
                    if(!empty($room_id)){
                    $related=$this->Rooms->find('all',['limit'=>2,'order'=>array('id DESC')])->where(['id IN'=>$room_id])->andwhere(['is_active'=>1]);
                } 
        $this->set('related', $related);
        $this->set('rooms', $rooms);
        $this->set('_serialize', ['rooms']);
	}
	public function add(){
		$this->viewBuilder()->layout('admin');
		$cities =TableRegistry::get('cities');
        $location =TableRegistry::get('location');
        $categories =TableRegistry::get('categories');
        $filters =TableRegistry::get('filters');

        $rooms = $this->Rooms->newEntity();
        
        if ($this->request->is('post')) {
            
           //  pr($this->request->data);
           // exit();
            foreach ($this->request->data['image'] as $key => $value) {
                $filePath = WWW_ROOT."img".DS."rooms".DS;
                $filename = end(explode('.',$value['name']));
                $imagename = 'Img_'.time().rand().'.'.$filename;
                if(pathinfo($imagename, PATHINFO_EXTENSION)){ 
                    $img[] =$imagename; 
                }
                move_uploaded_file($value['tmp_name'],$filePath.$imagename);
            }
            $this->request->data['address']=$this->request->data['location'];
            $Address_json=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($this->request->data['location']).'&key=AIzaSyCnVo0BsW-gAsZyCq_Wgo_7-zaS0NAXhGw');
        $address_array=json_decode($Address_json,true);
        
            
            $this->request->data['lat']=$address_array['results'][0]['geometry']['location']['lat'];
            $this->request->data['lng']=$address_array['results'][0]['geometry']['location']['lng'];
            $this->request->data['images']=json_encode($img);
            $this->request->data['is_active'] = 1;
           //  pr($this->request->data);
           // exit();
            $rooms = $this->Rooms->patchEntity($rooms, $this->request->data);
            if ($rooms=$this->Rooms->save($rooms)) {
                            $filter = $filters->newEntity();
                            $filter->city_id     =$this->request->data['city_id'];
                            $filter->location_id =$this->request->data['location_id'];
                            $filter->category_id =$this->request->data['category_id'];
                            $filter->room_id     =$rooms->id;
                            if ($filters->save($filter)) {
        
                            }
                    
                
                $this->Flash->success(__('Your Room has been saved.'));
                return $this->redirect(['action' => 'listadmin']);
            }
            $this->Flash->error(__('Unable to add your Room.'));
        }
        $cities = $cities->find('list');
        $loc = $location->find('list');
        $categories = $categories->find('list');
        $this->set('location',$loc);
        $this->set('categories',$categories);
        $this->set(compact('rooms', 'cities','loc','categories'));
        $this->set('_serialize', ['rooms']);

	}
	public function edit($id=null){
		$this->viewBuilder()->layout('admin');
        $cities =TableRegistry::get('cities');
        $location =TableRegistry::get('location');
        $categories =TableRegistry::get('categories');
        $filters =TableRegistry::get('filters');

        $rooms = $this->Rooms->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
           
            
             foreach ($this->request->data['image'] as $key => $value) {
                $filePath = WWW_ROOT."img".DS."rooms".DS;
                // $filename = explode('.',$value['name']);
                // $imagename = 'Img_'.time().rand().'.'.$filename[1];

                $filename = end(explode('.',$value['name']));
                $imagename = 'Img_'.time().rand().'.'.$filename;

                if(pathinfo($imagename, PATHINFO_EXTENSION)){ 
                    $img[] =$imagename; 
                }else{
                  $img=json_decode($rooms->images,true);  
                }
                move_uploaded_file($value['tmp_name'],$filePath.$imagename);
            }
            
            $this->request->data['address']=$this->request->data['location'];
            $Address_json=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($this->request->data['location']).'&key=AIzaSyCnVo0BsW-gAsZyCq_Wgo_7-zaS0NAXhGw');
        $address_array=json_decode($Address_json,true);
        
            
            $this->request->data['lat']=$address_array['results'][0]['geometry']['location']['lat'];
            $this->request->data['lng']=$address_array['results'][0]['geometry']['location']['lng'];
            $this->request->data['images']=json_encode($img);
           // $this->request->data['is_active'] = 1;
           //  pr($this->request->data);
           // exit();
            $rooms = $this->Rooms->patchEntity($rooms, $this->request->data);
            if ($rooms=$this->Rooms->save($rooms)) {
                            $filter = $filters->newEntity();
                            $filter->city_id     =$this->request->data['city_id'];
                            $filter->location_id =$this->request->data['location_id'];
                            $filter->category_id =$this->request->data['category_id'];
                            $filter->room_id     =$rooms->id;
                            if ($filters->save($filter)) {
        
                            }
                    
                
                $this->Flash->success(__('Your Room has been saved.'));
                return $this->redirect(['action' => 'listadmin']);
            }
            $this->Flash->error(__('Unable to add your Room.'));
        }
        $cities = $cities->find('list');
        $loc = $location->find('list');
        $categories = $categories->find('list');
        $this->set('location',$loc);
        $this->set('categories',$categories);
        $this->set(compact('rooms', 'cities','loc','categories'));
        $this->set('_serialize', ['rooms']);

	}
	public function delete($id=null){
		$this->viewBuilder()->layout('admin');
        $filters =TableRegistry::get('filters');
         $rooms = $this->Rooms->get($id);
        if ($this->Rooms->delete($rooms)) {
            $filter = $filters->find('all')->where(['room_id'=>$id])->first();
            if ($filters->delete($filter)) { }

            $this->Flash->success(__('The Room has been deleted.'));
        } else {
            $this->Flash->error(__('The Room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'listadmin']);

	}
	public function listadmin(){
        $this->viewBuilder()->layout('admin');
        $rooms = $this->paginate($this->Rooms->find('all',['order'=>array('id DESC')]));

         $this->set(compact('rooms'));
        $this->set('_serialize', ['rooms']);

    }
    public function active($id=null,$action=null){
        $this->viewBuilder()->layout('admin');
        $rooms = $this->Rooms->get($id);
        $rooms->is_active=$action;
        if ($this->Rooms->save($rooms)) {
                            
         return $this->redirect(['action' => 'listadmin']);
            }
        

    }

} 