<?php
    /*require_once('model/Membro.class.php');

    $membro = new Membro("login", "senha");

    echo $membro->getLogin();
    echo "</br>";
    echo $membro->getSenha();  */
    
    
    
    if(isset($_SESSION['auth'])){
        if($_SESSION['auth']){
            header("location:../view/painel.php");
        }
        else{
            header("location:../view/login2.php");
        }
    }
    else{
        header("location:../view/login2.php");
    }

?>