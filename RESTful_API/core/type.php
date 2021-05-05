<?php


class Type {
	
	private $conn; 
 
    public $id; 
    public $name; 
    public $create_at; 
   

public function __construct($config) {
				
		$this->conn = $config;
		
	}	
	
	public function read() {
		
		$sql = "
		
		SELECT 
		*
		FROM `types`";
		
		$read = $this->conn->prepare($sql);
		$read->execute(); 
		
		return $read;

	}
	public function read_single() {
		
		$query = "SELECT 
		
		* FROM `types` WHERE `id` = ? LIMIT 1
	
		";
		
		
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindParam(1, $this->id);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->name = $row['name'];
		
	}
	public function create() {
		
		$query = "INSERT INTO `types` SET `name` = :name"; 
		
		$stmt = $this->conn->prepare($query);
		
		$this->name = htmlspecialchars(strip_tags($this->name));
		
	
	    $stmt->bindParam(':name', $this->name);
		
		
		if($stmt->execute()) {
			
			
			return true; 
			
		}
		printf("Error %s. \n", $stmt->error);
		return false; 
	}
	public function update() {
		
		$query = "UPDATE `types` 
		 SET `name` = :name
		
		WHERE `id` = :id"; 
		
		$stmt = $this->conn->prepare($query);
		

	    $this->id = htmlspecialchars(strip_tags($this->id));
		$this->name = htmlspecialchars(strip_tags($this->name));
		
	  
		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':name', $this->name);
		
		if($stmt->execute()) {
			
			
			return true; 
			
		}
		printf("Error %s. \n", $stmt->error);
		return false; 
	}
	public function delete() {
		
		$query = "DELETE FROM `types` WHERE `id` = :id";
		
		$stmt = $this->conn->prepare($query);
		
		
		$this->id = htmlspecialchars(strip_tags($this->id));
		$stmt->bindParam(':id', $this->id);
		
	
	if($stmt->execute()) {
		
		return true; 
		
	}
	else {
		
		printf("Error %s. \n", $stmt->error);
		return false; 
		
	}
	
	}
	
}
?>