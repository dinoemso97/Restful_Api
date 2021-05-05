<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once('../core/initialize.php');

$post = new Type($config);

$result = $post->read();

$num = $result->rowCount(); 

if($num > 0){
	
	$post_arr = array();
	$post_arr['data'] = array();
	
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		
		extract($row);
		$post_item = array(
		
		'id' => $id , 
		'name' => $name 

		);
		
		
		array_push($post_arr['data'], $post_item);
	}
	echo json_encode($post_arr);
}
else {
	
	echo json_encode(array("message" => "No posts found."));
	
}






?>