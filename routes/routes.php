<?php

    require_once("../model/Membro.class.php");
    require_once("../model/Advertencia.class.php");
    require_once("../controller/MembersController.class.php");
    require_once("../controller/AdvertenciasController.class.php");

    session_start();
    if(isset($_POST["loginAttempt"])){
        $login = $_POST["login"];
        $password = $_POST["password"];

        $user = new Membro($login, $password);
        if($user->auth()){
            $_SESSION["auth"] = true;
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["role"] = $user->getRole();
            $_SESSION["name"] = $user->getName();
            $_SESSION["privilege"] = $user->getPrivilege();
            $_SESSION["score"] = $user->getScore();
            $_SESSION["id"] = $user->getId();
            if($_SESSION["privilege"]){
                header("location:../view/pcd.php");
            }
            else{
                header("location:../view/pcduser.php");
            }
        }
        else{
            header("location:../view/login2.php?valid=false");
        }
    }

    if(isset($_SESSION["auth"]) && isset($_POST["registerAttempt"])){

        $membersController = new MembersController();

        $name = $_POST["name"]; 
        $login = $_POST["login"];
        $password = md5($_POST["password"]);
        $score = $_POST["score"];
        $role = $_POST["role"];
        $privilege = $_POST["privilege"];

        $member = new Membro($login, $password, $id=null, $score, $role, $name, $privilege);
        $membersController->registerMemberDB($member);
                
        header("location:../view/pcd.php?validRegisterMember=true");

    }

    if(isset($_SESSION["auth"]) && isset($_POST["updateMemberAttempt"])){

        $membersController = new MembersController();

        $id = $_POST["id"];
        $name = $_POST["name"]; 
        $login = $_POST["login"];
        $password = md5($_POST["password"]);
        $score = $_POST["score"];
        $role = $_POST["role"];
        $privilege = $_POST["privilege"];

        $member = new Membro($login, $password, $id, $score, $role, $name, $privilege);
        $membersController->updateMemberDB($member);
                
        header("location:../view/pcd.php?validUpdateMember=true");

    }

    if(isset($_SESSION["auth"]) && isset($_POST["deleteMemberAttempt"])){
        $membersController = new MembersController();

        $id = $_POST["id"];
        
        $membersController->deleteMemberDB($id);

        header("location:../view/pcd.php?validDeleteMember=true");
    }

    if(isset($_SESSION["auth"]) && isset($_POST["warningAttempt"])){

        $advController = new AdvertenciasController();
        
        $idmember = $_POST["idmember"];
        $date = $_POST["date"];
        $reason = $_POST["reason"];
        $score = $_POST["score"];
        $responsible = $_POST["responsible"];
        $dismissed = $_POST["dismissed"];
        
    
        $adv = new Advertencia($id=null, $date, $reason, $score, $responsible, $dismissed, $idmember);
        $advController->registerWarningDB($adv);

        $mbmController = new MembersController();
        $member = array();
        $member = $mbmController->getMembersDB();

        for($i=0;$i<sizeof($member);$i++){
            if($member[$i]['id']==$idmember){
                $newScore = ($member[$i]['score'] - $score);
            }
        }
        
        
        echo "<script>alert('".var_dump($member)."')</script>";
        $member['score'] = $newScore;
        

        $mbmController->updateMemberScore($idmember, $newScore);

        if($adv->okay()){
            $_SESSION["okay"] = true;

            header("location:../view/pcd.php?validRegisterWarning=true");
        }
        
    }
    
    if(isset($_SESSION["auth"]) && isset($_POST["updateWarningAttempt"])){

        $wngController = new AdvertenciasController();

        $id = $_POST["id"];
        $idmember = $_POST["idmember"];
        $date = $_POST["date"];
        $reason = $_POST["reason"];
        $score = $_POST["score"];
        $responsible = $_POST["responsible"];
        $dismissed = $_POST["dismissed"];

        $wng = new Advertencia($id, $date, $reason, $score, $responsible, $dismissed, $idmember);
        $wngController->updateWarningDB($wng);
                
        header("location:../view/pcd.php?validUpdateWarning=true");

    }

    if(isset($_SESSION["auth"]) && isset($_POST["deleteWarningAttempt"])){
        $wngController = new AdvertenciasController();

        $id = $_POST["id"];
        
        $wngController->deleteWarningDB($id);

        header("location:../view/pcd.php?validDeleteWarning=true");
    }

    if(isset($_SESSION["auth"]) && isset($_POST["logoutAttempt"])) { 
        unset($_SESSION["auth"]);
        unset($_SESSION["login"]);
        session_destroy(); 
        header("location:../index.php");
    }   


?>