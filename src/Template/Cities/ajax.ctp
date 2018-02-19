<?php 
foreach ($cities as $key => $value) {
	$arr[]=array('id'=>$value->id,'name'=>$value->name);
}
echo json_encode($arr);