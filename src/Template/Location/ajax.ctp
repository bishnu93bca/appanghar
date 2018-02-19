<?php
foreach ($location as $key => $value) {
	$arr[]= array('id'=>$value->id,'name'=>$value->name);
}
if(empty($arr)){
	$arr[]=array('id'=>0,'name'=>'select');
}
echo json_encode($arr);