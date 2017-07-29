<?php

    require_once('../database/Connection.class.php');

    class Membro {
        public $id = null;
        public $score = null;
        public $login = null;
        public $password = null;
        public $role = null;
        public $name = null;
        public $privilege = null;
        //

        function __construct($login, $password, $id=null, $score=null, $role=null, $name=null, $privilege=null/* , $historic=null */){
            $this->id = $id;
            $this->score = $score;
            $this->login = $login;
            $this->password = $password;
            $this->role = $role;
            $this->name = $name;
            $this->privilege = $privilege;
            // $this->historic = $historic;
        }
        function getId(){
            return $this->id;
        }

        function setId($id){
            $this->id = $id;
        }

        function getScore(){
            return $this->score;
        }

        function setScore($score){
            $this->score = $score;
        }
        
        function getLogin(){
            return $this->login;
        }

        function setLogin($login){
            $this->login = $login;
        }

        function getPassword(){
            return $this->password;
        }

        function setPassword($password){
            $this->password = $password;
        }

        function getRole(){
            return $this->role;
        }

        function setRole($role){
            $this->role = $role;
        }

        function getName(){
            return $this->name;
        }

        function setName($name){
            $this->name = $name;
        }

        function getPrivilege(){
            return $this->privilege;
        }

        function setPrivilege($privilege){
            $this->privilege = $privilege;
        }
/* 
        function getHistoric(){
            return $this->historic;
        }

        function setHistoric($historic){
            $this->historic = $historic;
        }
 */
        function auth(){
            
            $conn = Connection::getInstance();
            $query = "SELECT * FROM `membros` WHERE `login` =  '$this->login' AND `password` = '$this->password'";
            $sql = $conn->query($query);
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->score = $row['score'];
            $this->role = $row['role'];
            $this->name = $row['name'];
            $this->privilege = $row['privilege']; 
           // $historic = $row['historic']; 

            return $row; 

        }

    }
?>