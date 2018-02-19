<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

use App\Controller\AppController;

class HomesController extends AppController{
	public function index(){
		
		$Rooms    =   TableRegistry::get('rooms');

      
       	$rooms = $Rooms->find('all',['limit'=>6,'order'=>array('id DESC')])->where(['is_active'=>1]);
       	
		
		$this->set('rooms',$rooms);
		
	}

	public function search(){
	 	$this->viewBuilder()->layout('defaultview');
	

	 }
	 public function payment(){
	 	$this->viewBuilder()->layout('ajax');
	 	
	 }
	 public function success(){
	 	
	 }
	  public function fail(){
	  	$this->viewBuilder()->layout('ajax');
	 	
	 }
	 public function about(){
	 	$this->viewBuilder()->layout('defaultview');
	

	 }
	 public function licenses(){
	 	$this->viewBuilder()->layout('defaultview');

	 }

}?>