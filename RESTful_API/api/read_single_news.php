<?php

header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');


include_once('../core/initialize.php'); 

$news = new News($config);

$news->id = isset($_GET['id']) ? $_GET['id'] : die();

$news->read_single(); 


$post_arr = array(

  'id' => $news->id , 
  'title' => $news->title , 
  'body' => $news->body , 
  'author' => $news->author , 
  'type_id' => $news->type_id , 
  'type_name' => $news->type_name  



);
print_r(json_encode($post_arr));
?>