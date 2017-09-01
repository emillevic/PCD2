<?php
    /*require_once('model/Membro.class.php');

    $membro = new Membro("login", "senha");

    echo $membro->getLogin();
    echo "</br>";
    echo $membro->getSenha();  */
    
    
    session_start();
    if(isset($_SESSION['auth'])){
        if($_SESSION['auth']){
            header("location:../view/pcd.php");
        }
        else{
            header("location:../view/login2.php");
        }
    }
    else{
        header("location:../view/login2.php");
    }

?>