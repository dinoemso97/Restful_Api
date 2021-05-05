<?php 

   //Create database with PDO and MySQL 
   
   $config = new PDO('mysql: host=localhost; dbname=restfulapi;','root','');
   
   
   $sql = "CREATE DATABASE `restfulapi`";
   $database = $config->query($sql);
   
   
   //Create tables in database 
   
   
   $query1 = "CREATE TABLE `restfulapi`.`news`(
   
        id int(11) not null PRIMARY KEY AUTO_INCREMENT , 
		type_id int(11) not null PRIMARY KEY , 
		title varchar(128) not null , 
		body text not null , 
		author varchar(128) not null , 
		created_at datetime not null ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );";
   $table1 = $config->query($query1);
   
   
   $query2 = "CREATE TABLE `restfulapi`.`news`(
   
        id int(11) not null PRIMARY KEY AUTO_INCREMENT , 
		name varchar(128) not null PRIMARY KEY , 
		create_at datetime not null ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );";
   $table2 = $config->query($query2);
   




?>