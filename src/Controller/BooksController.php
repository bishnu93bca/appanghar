<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;

class BooksController extends AppController{
	
	public function index(){
		 $this->viewBuilder()->layout('admin');
                $books = $this->paginate($this->Books->find('all',['order'=>array('id DESC')]));

                 $this->set(compact('books'));
                $this->set('_serialize', ['books']);

	}
	public function view($id=null){
		$this->viewBuilder()->layout('admin');
	}
	public function add(){
		$this->viewBuilder()->layout('defaultview');


	}
	public function success(){
		$this->viewBuilder()->layout('ajax');
		$books = $this->Books->newEntity();
        if ($this->request->is('post')) {
        	// pr($this->request->data);
        	// echo $this->request->data['productinfo'];
        	// exit();
        	$this->request->data['name']=$this->request->data['buyer_name'];
        	$this->request->data['mobile']=$this->request->data['phone'];
        	$this->request->data['amount']=$this->request->data['amount'];
        	$this->request->data['tr_id']=$this->request->data['txnid'];
        	$this->request->data['date']=$this->request->data['addedon'];
        	$this->request->data['booking_id']=$this->request->data['firstname'].mt_rand();
        	$this->request->data['detail']=json_encode($this->request->data);
        	$books = $this->Books->patchEntity($books, $this->request->data);
        	if ($order=$this->Books->save($books)) {
                $this->set('book',$order);
        	}
        }


	}
	
	public function payment(){
		$this->viewBuilder()->layout('ajax');
		if(strlen(strip_tags($this->request->data['productinfo']))> 25){
                              $pro = substr(strip_tags($this->request->data['productinfo']),0,25)."...";
                                } else{    
                                  $pro = strip_tags($this->request->data['productinfo'])."...";
                                }
		   //$pro= $this->request->data['productinfo'];
        $phone= $this->request->data['phone'];
        $name =$this->request->data['firstname'];
        $name .=  $this->request->data['lastname'];
        $email= $this->request->data['email'];
        $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("X-Api-Key:dbd5193a04269afd6332df6cefd477e3",
                      "X-Auth-Token:f3a154dc00fb3a728a501772568c8f74"));
    $payload = Array(
        'purpose' => $pro,
        'amount' => '5000',
        'phone' => $phone,
        'buyer_name' => $name,
        'redirect_url' => 'http://appanghar.com/books/success',
        'send_email' => true,
        'webhook' => '',
        'send_sms' => true,
        'email' =>  $email,
        'allow_repeated_payments' => false
    );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 


    $json_decode=json_decode($response,true);
    $long_url=$json_decode['payment_request']['longurl'];
    return $this->redirect($long_url);

	}
	public function fail(){
		$this->viewBuilder()->layout('ajax');
		$books = $this->Books->newEntity();
        if ($this->request->is('post')) {
        	// pr($this->request->data);
        	// echo $this->request->data['productinfo'];
        	// exit();
        	$this->request->data['name']=$this->request->data['firstname']." ".$this->request->data['lastname'];
        	$this->request->data['mobile']=$this->request->data['phone'];
        	$this->request->data['amount']=$this->request->data['amount'];
        	$this->request->data['tr_id']=$this->request->data['txnid'];
        	$this->request->data['date']=$this->request->data['addedon'];
        	$this->request->data['booking_id']=$this->request->data['firstname'].mt_rand();
        	$this->request->data['detail']=json_encode($this->request->data);
        	$books = $this->Books->patchEntity($books, $this->request->data);
        	if ($order=$this->Books->save($books)) {
                $this->set('book',$order);
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