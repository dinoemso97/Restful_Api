<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../core/initialize.php');

$news = new News($config);

$data = json_decode(file_get_contents("php://input"));


$news->title = $data->title;
$news->body = $data->body;
$news->author = $data->author;
$news->type_id = $data->type_id;


if($news->create()) {
	
	echo json_encode(
	
	  array('message' => 'News created.')
	
	);
	
	
}
else {
	
	
	echo json_encode(
	
	  array('message' => 'News not created.')
	
	);
	
	
	
}



?>