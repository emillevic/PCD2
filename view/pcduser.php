<?php

    session_start();
    
    require_once("../controller/AdvertenciasController.class.php");
    $advController = new AdvertenciasController();
    $advertencias = $advController->getAdvertenciasDB();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
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
    <title>Advertencias</title>
</head>
<body>
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                <img src="assets/images/ecomp/logo.png" width="30">
                </a>
                <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll scrollSuave" href="#about">Sobre</a>
                    </li>
                    <li>
                        <a class="page-scroll scrollSuave" href="#rules">Regras</a>
                    </li>
                    <li>
                        <a class="page-scroll scrollSuave" href="pcd.html">Membros</a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <div>
        <div class="modal-header">
            <img class="img img-responsive img-companyLogo" src="assets/images/ecomp/logoNome.png" width="200" height="50"></img>                                                                                                    
            <h1 id="insideWidow" class="memberName text-right">
                <i class="fa fa-user-o" aria-hidden="true"></i>
                <?php
                    echo $_SESSION['name'];

                ?>
                <div id="insideWidow" class="memberClassification text-right">
                    <?php
                        echo $_SESSION['role'];
                    ?>
                </div>
            </h1>        
        </div>
        <div class="modal-body">
            <p class="text-center historicTitle"><?php echo $_SESSION['score'] . " pontos" ?></p>
            <hr class="dark">
            <p class="text-center historicTitle">HISTÓRICO</p>
            <hr class="dark">
            <div>
                
 			<?php 
				for ($i=0; $i < sizeof($advertencias) ; $i++) {

                    if($advertencias[$i]['idmember'] == $_SESSION['id']){
                   
                        echo "<p class='text-Window text-center'><span class='numberPunition'>#".$advertencias[$i]['id']." - </span> <span class='topicPunition'>PERDEU</span> <span class='numberPunition'>".$advertencias[$i]['score']."</span> <span class='topicPunition'>PONTOS EM ".$advertencias[$i]['date']." POR " .$advertencias[$i]['reason']."<br><span class='responsiblePunition'>RESPONSÁVEL:</span>" .$advertencias[$i]['responsible']."</p>";
                        echo "<hr>"; 
                    }
                } 
                ?>                                                                                                                        
            </div>
        </div>
        <a href="index.html" class="page-scroll btn btn-primary btn-xl sr-button">Voltar</a>
        </div>
        </div>
    </div>  
</body>
</html>