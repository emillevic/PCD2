<?php

require_once("../database/Connection.class.php");

class MembersController {
	
	private $conn = null;

	public function __construct(){
		$this->conn = Connection::getInstance();
	}

	public function getMembersDB(){
		$members = [];
        $query = "SELECT * FROM membros;";
        $sql = $this->conn->query($query);
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($members, $row);
        }
        return $members;
	}
    public function getMemberDB($id){
        $member = [];
        $query = "SELECT id=$id FROM membros;";
        $sql = $this->conn->query($query);
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($member, $row);
        }
        return $member;
    }



}

?>