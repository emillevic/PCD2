<?php

require_once("../database/Connection.class.php");
require_once('../model/Membro.class.php');

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

    public function registerMemberDB($member){
        $conn = Connection::getInstance();

        $query = "INSERT INTO membros(id,name,login,password,score,role,privilege) VALUES (null,'".$member->getName()."','".$member->getLogin()."','".$member->getPassword()."', '".$member->getScore()."', '".$member->getRole()."', '".$member->getPrivilege()."')"; //String com consulta SQL da inserção

        $sql = $conn->query($query);
    }



}

?>