<?php


class News {
	
	private $conn; 
 
    public $id; 
    public $type_id; 
    public $type_name; 
    public $title; 
    public $body;
    public $author; 
    public $create_at; 

public function __construct($config) {
				
		$this->conn = $config;
		
	}	
	
	public function read() {
		
		$sql = "
		
		SELECT 
		`types`.`name` as `type_name` , 
		`news`.`id`, 
		`news`.`type_id`, 
		`news`.`title`, 
		`news`.`body`, 
		`news`.`author`, 
		`news`.`created_at` 
		
		FROM `news`
		LEFT JOIN 
		`types` ON `news`.`type_id` = `types`.`id` 
		ORDER BY `news`.`created_at` DESC
			
		";
		
		$read = $this->conn->prepare($sql);
		$read->execute(); 
		
		return $read;
		
		
		
		
	}
	
	public function read_single() {
		
		
		$sql = "
		
		SELECT 
		`types`.`name` as `type_name` , 
		`news`.`id`, 
		`news`.`type_id`, 
		`news`.`title`, 
		`news`.`body`, 
		`news`.`author`, 
		`news`.`created_at` 
		
		FROM `news`
		LEFT JOIN 
		`types` ON `news`.`type_id` = `types`.`id` 
		WHERE `news`.`id` = ? LIMIT 1
			
		";
		
		$read = $this->conn->prepare($sql);
		$read->bindParam(1, $this->id);
		$read->execute(); 
		
		$row = $read->fetch(PDO::FETCH_ASSOC);
		
		$this->title = $row['title'];
		$this->body = $row['body'];
		$this->author = $row['author'];
		$this->type_id = $row['type_id'];
		$this->type_name = $row['type_name'];
		

	}
	
	public function create() {
		
		
		$sql = "INSERT INTO `news` SET 
		`title` = :title, 
		`body` = :body , 
		`author` = :author , 
		`type_id` = :type_id";
		
		$create = $this->conn->prepare($sql);
		
		$this->title = htmlspecialchars(strip_tags($this->title));
		$this->body = htmlspecialchars(strip_tags($this->body));
		$this->author = htmlspecialchars(strip_tags($this->author));
		$this->type_id = htmlspecialchars(strip_tags($this->type_id));
		
		
		$create->bindParam(':title', $this->title); 
		$create->bindParam(':body', $this->body); 
		$create->bindParam(':author', $this->author); 
		$create->bindParam(':type_id', $this->type_id); 
		
		if($create->execute()) {
			
			return true; 
			
		}
		
		printf("Error %s. \n", $create->error);
		return false; 
		
		
	}
	
	public function update() {
		
		$sql = "UPDATE `news` SET 
		`title` = :title, 
		`body` = :body , 
		`author` = :author , 
		`type_id` = :type_id 
		WHERE `id` = :id";
		
		$create = $this->conn->prepare($sql);
		
		$this->title = htmlspecialchars(strip_tags($this->title));
		$this->body = htmlspecialchars(strip_tags($this->body));
		$this->author = htmlspecialchars(strip_tags($this->author));
		$this->type_id = htmlspecialchars(strip_tags($this->type_id));
		$this->id = htmlspecialchars(strip_tags($this->id));
		
		
		$create->bindParam(':title', $this->title); 
		$create->bindParam(':body', $this->body); 
		$create->bindParam(':author', $this->author); 
		$create->bindParam(':type_id', $this->type_id); 
		$create->bindParam(':id', $this->id); 
		
		if($create->execute()) {
			
			return true; 
			
		}
		
		printf("Error %s. \n", $create->error);
		return false; 
		
		
		
		
	}
	
	public function delete() {
		
		$sql = "DELETE FROM `news` WHERE `id` = :id";
		$delete = $this->conn->prepare($sql);
		
		$this->id = htmlspecialchars(strip_tags($this->id));
		$delete->bindParam(':id', $this->id); 
		
		if($delete->execute()) {
			
			return true; 
			
		}
		else {
			
			printf("Error %s. \n", $delete->error); 
			return false; 
			
			
		}
		
		
		
	}
	
	
	
	
}
?>