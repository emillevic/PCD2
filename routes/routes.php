<?php

    require_once('../model/Membro.class.php');
    require_once('../model/Advertencia.class.php');
    require_once('../controller/MembersController.class.php');
    require_once('../controller/AdvertenciasController.class.php');

    session_start();
    if(isset($_POST['loginAttempt'])){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = new Membro($login, $password);
        if($user->auth()){
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $_POST["login"];
            $_SESSION['role'] = $user->getRole();
            $_SESSION['name'] = $user->getName();
            $_SESSION['privilege'] = $user->getPrivilege();
            $_SESSION['score'] = $user->getScore();
            $_SESSION['id'] = $user->getId();
            if($_SESSION['privilege']){
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

    if(isset($_POST['registerAttempt'])){

        $membersController = new MembersController();

        $name = $_POST["name"]; 
        $login = $_POST["login"];
        $password = md5($_POST["password"]);
        $score = $_POST["score"];
        $role = $_POST["role"];
        $privilege = $_POST["privilege"];

        $member = new Membro($login, $password, $id=null, $score, $role, $name, $privilege);
        $membersController->registerMemberDB($member);
                
        header("location:../view/painel.php?valid=true");

    }

    if(isset($_POST['updateMemberAttempt'])){

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
                
        header("location:../view/update.php?valid=true");

    }

    if(isset($_POST['warningAttempt'])){

        $advController = new AdvertenciasController();
        
        $idmember = $_POST['idmember'];
        $date = $_POST['date'];
        $reason = $_POST['reason'];
        $score = $_POST['score'];
        $responsible = $_POST['responsible'];
        $dismissed = $_POST['dismissed'];
        
    
        $adv = new Advertencia($id=null, $date, $reason, $score, $responsible, $dismissed, $idmember);
        $advController->registerWarningDB($adv);

        if($adv->okay()){
            $_SESSION['okay'] = true;
            $mbmController = new MembersController();
            $member = $mbmController->getMemberDB($adv->getIdMember());
            $newScore = ($member[4] - $score);
            
            $member[4] = $newScore;
            echo $member;

            $mbmController->updateMemberScore($idmember, $newScore);
            header("location:../view/paineladv.php?send=true");
        }
        
    }
    
    if(isset($_POST['updateWarningAttempt'])){

        $wngController = new AdvertenciasController();

        $id = $_POST['id'];
        $idmember = $_POST['idmember'];
        $date = $_POST['date'];
        $reason = $_POST['reason'];
        $score = $_POST['score'];
        $responsible = $_POST['responsible'];
        $dismissed = $_POST['dismissed'];

        $wng = new Advertencia($id, $date, $reason, $score, $responsible, $dismissed, $idmember);
        $wngController->updateWarningDB($wng);
                
        header("location:../view/updateWarning.php?valid=true");

    }

    if(isset($_POST['logoutAttempt'])) { 
        session_destroy(); 
        header("location:../index.php");
    }   


?>