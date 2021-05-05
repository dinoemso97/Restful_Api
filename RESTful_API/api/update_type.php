<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../core/initialize.php');

$post = new Type($config);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
$post->name = $data->name; 



if($post->update()) {
	
	echo json_encode(
	 
	   array('message' => 'Types updated.')
	);
	
	
}
else {
	
	 echo json_encode(
	 
	   array('message' => 'Types not updated.')
	);
}
	 
	 


?>