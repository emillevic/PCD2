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
        //$query = "SELECT id=$id FROM membros;";
        $query = "SELECT * FROM membros WHERE id=".$id;
        $sql = $this->conn->query($query);
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        	array_push($member, $row);
        }
        return $member;
    }

    public function registerMemberDB($member){
        $conn = Connection::getInstance();

        $query = "INSERT INTO membros(id,name,login,password,score,role,privilege) VALUES (null,'".$member->getName()."','".$member->getLogin()."','".$member->getPassword()."', '".$member->getScore()."', '".$member->getRole()."', '".$member->getPrivilege()."')"; 

        $sql = $conn->query($query);
    }

    public function updateMemberScore($id, $newScore){
        $conn = Connection::getInstance();

        $query = "UPDATE membros SET score = '$newScore' WHERE id = $id";
        $sql = $conn->query($query);
    }

    public function updateMemberDB($member){
        $conn = Connection::getInstance();

        $score = $member->getScore();
        $login = $member->getLogin();
        $id = $member->getId();
        $password = $member->getPassword();
        $role = $member->getRole();
        $name = $member->getName();
        $privilege = $member->getPrivilege();

        $query = "UPDATE membros SET score = '$score', login = '$login', password = '$password', role = '$role', name = '$name', privilege = '$privilege' WHERE id = $id";
        $sql = $conn->query($query);
    }

    public function deleteMemberDB($id){
		$conn = Connection::getInstance();

		$query = "DELETE FROM membros WHERE id = $id";

		$sql = $conn->query($query);
	}



}

?>