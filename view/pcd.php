<?php

    session_start();
    
    require_once("../controller/MembersController.class.php");
    $mbmController = new MembersController();
    $members = $mbmController->getMembersDB();

    require_once("../controller/AdvertenciasController.class.php");
    $advController = new AdvertenciasController();
    $advertencias = $advController->getAdvertenciasDB();

    if(!isset($_SESSION["auth"])) {
        header("location:../view/login.php");
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>PCD - ECOMP Jr.</title>

   <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <script src="https://use.fontawesome.com/330b781289.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/stylepcd.css">
    <script src="assets/js/jquery-3.2.1.js"></script>
    <script src="assets/js/javascript.js"></script>  

    <!-- Icon -->
    <link rel="icon" href="assets/images/ecomp/logo.png">

    <!-- Modal plugin -->
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>      
</head>

<body>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top bg-gray">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/images/ecomp/logo.png" width="30">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll scrollSuave" href="index.html">Página Inicial</a></li>
                    <li><a class="page-scroll scrollSuave" href="pcd.php">Membros</a></li>
                    <li><a class="page-scroll scrollSuave" href="painel.php">Cadastrar Membros</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="message"></h1>
                <hr>
                <a href="#members" class="btn btn-primary btn-xl page-scroll scrollSuave">Iniciar</a>
                <hr>
            </div>
        </div>
    </header>

    <!-- Members set -->
    <div id="members">
        <div class="col-lg-12">
            <br><br><br><br><br>
        </div>

        <div class="container">
            <div class="row">
                <?php
                    for($i=0; $i < sizeof($members) ; $i++) {
                       // for ($j=0; $j < sizeof($advertencias) ; $j++) {

                            echo "<div id='effect-1' class='col-lg-4 col-sm-6 effects clearfix'>
                                    <div class='img img-memberIcon img-circle img-responsive'>
                                        <img class='memberIcon' src='assets/images/ecomp/logo.png' width=180 height=180 alt='' />
                                        <div class='overlay'>
                                            <a href='#window1' data-toggle='modal' class='expand pointsText'>".$members[$i]['score']." PONTOS</a>
                                        </div>
                                    </div>

                                    
                                    <div class='modal fade' id='window1' tabindex='-1' role='dialog' aria-labelledby='window1' aria-hidden='true'>
                                        <div class='modal-dialog modal-lg modal-lg'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <img class='img img-responsive img-companyLogo' src='assets/images/ecomp/logoNome.png' width='200' height='50'></img>                                                                                                    
                                                <h1 id='insideWidow' class='memberName text-right'>
                                                    <i class='fa fa-user-o' aria-hidden='true'></i>".$members[$i]['id']." - ".$members[$i]['name']."
                                                    <div id='insideWidow' class='memberClassification text-right'>
                                                        ".$members[$i]['role']."
                                                    </div>
                                                </h1>        
                                            </div>
                                            <div class='modal-body'>
                                            
                                                <hr class='dark'>
                                                <p class='text-center historicTitle'>HISTÓRICO</p>
                                                <hr class='dark'>
                                                <div>";
                                                    for ($j=0; $j < sizeof($advertencias) ; $j++) {
                                                        if($advertencias[$j]['idmember'] == $members[$i]['id']){
                                                            echo "<p class='text-Window text-center'><span class='numberPunition'>#".$advertencias[$j]['id']." - </span> <span class='topicPunition'>PERDEU</span> <span class='numberPunition'>".$advertencias[$j]['score']."</span> <span class='topicPunition'>PONTOS EM ".$advertencias[$j]['date']." POR " .$advertencias[$j]['reason']."<br><span class='responsiblePunition'>RESPONSÁVEL:</span>" .$advertencias[$j]['responsible']."</p>";
                                                                echo "<hr>"; 
                                                        }
                                                    }                                      
                                                echo"</div>
                                                <a href='paineladv.php' class='page-scroll btn btn-primary btn-xl sr-button'>Adicionar Advertência</a>
                                                <a href='updateMember.php' class='page-scroll btn btn-primary btn-xl sr-button'>Atualizar Membro</a>
                                                <a href='updateWarning.php' class='page-scroll btn btn-primary btn-xl sr-button'>Atualizar Advertencia</a>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </div>                    
                                
                                    <h3 class='memberName'>".$members[$i]['name'].
                                        "<div class='memberClassification'>".$members[$i]['role']."</div>
                                    </h3>
                            </div>";
                                    }
                    //}
?>

<div class="col-lg-12 text-center">
    <hr>
    <br><br>
    <a href="painel.php" class="page-scroll btn btn-primary btn-xl sr-button">Cadastrar Membros</a>
    <br><br>
    <form action="../routes/routes.php" method="POST">
        <input class="btn btn-primary" type="submit" value="Logoff" name="logoutAttempt"/>
    </form>
    <hr>
    <br>

</div>
                
</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

</html>