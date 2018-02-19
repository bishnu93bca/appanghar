<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;
use Cake\Event\Event;
//use Cake\Network\Session\DatabaseSession;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

    // public $components = array(
    //         'Auth' => array(
    //         'loginRedirect' => array(
    //             'controller' => 'Users',
    //             'action' => 'index'
    //         ),

    //         'logoutRedirect' => array(
    //             'controller' => 'Users',
    //             'action' => 'login'
                
    //         ),

    //         'authenticate' => array(
    //                 'Form' => array(
                        
    //                     'userModel' => 'Users'
    //                 )
    //             ),   
    //         )
    //     );
    public function initialize()
    {
        parent::initialize();
       // $session= $this->request->session();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    public function filter($search){
        $filters =TableRegistry::get('filters');
        $packages    =   TableRegistry::get('Packages');
        $filtervalues    =   TableRegistry::get('filtervalues');
        $filters = $filters ->find('all')->select(['id','filter']);
        $filter[0]='All';
        foreach ($filters as $key => $value) {
                $id=$value['id'];
                $filter[$id]=$value['filter'];
        }
        $search_val=$search['search'];
        $id=$search['filter_id'];
        if($id !=0){
            if(!empty($id)&& !empty($search_val)){
                $filtervalue=$filtervalues->find('all')->contain(['Packagefilters'])->where(['filter_id'=>$id]);
            foreach ($filtervalue as $key => $value) {
                $va=$value['packagefilters'];
                foreach ($va as $key => $value) {
                    $package_id[]=$value['package_id'];
                }
            } 
            if(!empty($package_id) && !empty($package_id)){
                $packages=$packages->find('all')->where(['id IN' => $package_id]);
                foreach ($packages as $key => $value) {
                     if(trim($search_val) != ""){
                    if(preg_match("/".$search_val."/i",$value['package_name'])){
                            $package[]=$value;
                        }elseif(preg_match("/".$search_val."/i",$value['package_description'])) {
                            $package[]=$value;
                        }else{}
                    }
            }
                foreach ($package as $key => $value) {
                    $send_val['search'][]=$value;
                    
                }
                
               
            }

            }else{
        
            
       //      $filtervalue=$filtervalues->find('all')->contain(['Packagefilters'])->where(['filter_id'=>$id]);
       //      foreach ($filtervalue as $key => $value) {
       //          $va=$value['packagefilters'];
       //          foreach ($va as $key => $value) {
       //              $package_id[]=$value['package_id'];
       //          }
       //      } 
       //      if(!empty($package_id)){
       //      	$packages=$packages->find('all')->where(['id IN' => $package_id]);
	   			// foreach ($packages as $key => $value) {
	   			// 	 $send_val['search'][]=$value;
	   			// }
               
       //      }
            }
		}else{
	        $packages=$packages->find('all');
			foreach ($packages as $key => $value) {
				if(trim($search_val) != ""){
					if(preg_match("/".$search_val."/i",$value['package_name'])){
							$package[]=$value;
						}elseif(preg_match("/".$search_val."/i",$value['package_description'])) {
							$package[]=$value;
						}else{}
					}else{
						//$package[]=$value;
				}	
			}
		        foreach ($package as $key => $value) {
		        	$send_val['search'][]=$value;
		        	
		        }
    	 }
        	 
        $send_val['filter']=$filter;
        $result=json_encode($send_val);
        return $result;
    }
   

}
