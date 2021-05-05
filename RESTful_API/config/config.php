<?php 

try {
	
	$config = new PDO('mysql: host=localhost; dbname=restfulapi;','root','');
	$config->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$config->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
	$config->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
	
}
catch(PDOException $e) {
	
	echo $e->getMessage(); 
	die();
	
	
}




?>