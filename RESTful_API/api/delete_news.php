<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../core/initialize.php');

$news = new News($config);

$data = json_decode(file_get_contents("php://input"));

$news->id = $data->id; 



if($news->delete()) {
	
	echo json_encode(
	
	  array('message' => 'News deleted.')
	
	);
	
	
}
else {
	
	
	echo json_encode(
	
	  array('message' => 'News not deleted.')
	
	);
	
	
	
}
