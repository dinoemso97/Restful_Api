<?php

header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');


include_once('../core/initialize.php'); 

$news = new News($config);

$result = $news->read();


$number = $result->rowCount();

if($number > 0) {
	
	$post_arr = array(); 
	$post_arr['data'] = array(); 
	
	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		
		extract($row);
		$post_item = array(
		
		 'id' => $id , 
		 'title' => $title , 
		 'body' => html_entity_decode($body) , 
		 'author' => $author , 
		 'type_id' => $type_id , 
		 'type_name' => $type_name
		
		
		);
		
		array_push($post_arr['data'], $post_item); 
		
		
		
	}
	
	echo json_encode($post_arr); 
	
	
}
else {
	
	
	
	echo json_encode(array("message" => "No news found."));
	
}

?>