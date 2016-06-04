<?php 
include 'common.php';

class Agent{ 

    // database connection and table name 
    private $conn; 
    private $table_name = "AGENTS"; 
 
    //properties  
    public $id;
    public $name; 
    public $country; 
    public $customid; 
    public $contactNo;
 
    // constructor with $db as database connection 
    public function __construct($db){ 
        $this->conn = $db;
    }
	
	// create agent
	public function create(){
		 
		// query to insert record
		$query = 'INSERT INTO '.$this->table_name.' (Name, Country, CustomID, CreatedBy, CreatedOn, EditBy, EditedOn, Guid, ContactNo) VALUES (:name, :country, :customid, :createdBy, :createdOn, :editBy, :editedOn, :guid, :contactNo)';
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		$cid = 1;
		$now = date('Y-m-d H:i:s');
		$eid = 1;
		$uid = uniqid();
		$country = "SL";
		// bind values
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":country", $country);
		$stmt->bindParam(":customid", $this->customid);
		$stmt->bindParam(":contactNo", $this->contactNo);
		$stmt->bindParam(":createdBy", $cid);
		$stmt->bindParam(":createdOn", $now);
		$stmt->bindParam(":editBy", $eid);
		$stmt->bindParam(":editedOn", $now);
		$stmt->bindParam(":guid", $uid);
		// execute query
		if($stmt->execute()){
			return true;
		}else {
			echo "<pre>";
				print_r($stmt->errorInfo());
			echo "</pre>";
			return false;
		}
	}
	
/*	// read agents
	public function readAll(){
	 
		// select all query
		$query = 'SELECT ID, Name, Country, CustomID FROM '.$this->table_name.'ORDER BY ID DESC';
		 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
		 
		// execute query
		$stmt->execute();
		 
		return $stmt;
	}
	
	// used when filling up the update agent form
	public function readOne(){
		 
		// query to read single record
		$query = 'SELECT ID, Name, Country, CustomID FROM '.$this->table_name.' WHERE ID = ? LIMIT 0,1';
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		 
		// bind id of agent to be updated
		$stmt->bindParam(1, $this->id);
		 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		 
		// set values to object properties
		$this->name = $row['Name'];
		$this->country = $row['Country'];
		$this->customid = $row['CustomID'];
	}
	
	// update the agent
	public function update(){
	 
		// update query
		$query = 'UPDATE '.$this->table_name.' SET Name=:name, Country=:country, CustomID=:customid, EditBy=:editBy, EditedOn=:editedOn WHERE ID=:id';
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 	$now = date('Y-m-d H:i:s');
	 	
		// bind new values
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':country', $this->country);
		$stmt->bindParam(':customid', $this->customid);
		$stmt->bindParam(":editedBy", 1);
		$stmt->bindParam(":editedOn", $now);
		$stmt->bindParam(':id', $this->id);
		 
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the agent
	public function delete(){
	 
		// delete query
		$query = 'DELETE FROM '.$this->table_name.' WHERE ID = ?';
		 
		// prepare query
		$stmt = $this->conn->prepare($query);
		 
		// bind id of record to delete
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}*/
	
}
?>