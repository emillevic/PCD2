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
                    <li><a href="#rmember" rel="modal" class="page-scroll">Cadastrar Membros</a></li>
                    <li><a href="#addWarning" rel="modal" class="page-scroll">Adicionar Advertência</a></li>
                    <li><a href="#dmember" rel="modal" class="page-scroll">Deletar Membro</a></li>
                    <li><a href="#dwarning" rel="modal" class="page-scroll">Deletar Advertência</a></li>
                    <li><a href="#updateMember" rel="modal" class="page-scroll">Atualizar Membro</a></li>
                    <li><a href="#updateWarning" rel="modal" class="page-scroll">Atualizar Advertência</a></li>
                    
                    
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
                            echo "<div id='effect-1' class='col-lg-4 col-sm-6 effects clearfix'>
                                    <div class='img img-memberIcon img-circle img-responsive'>
                                        <img class='memberIcon' src='assets/images/ecomp/logo.png' width=180 height=180 alt='' />
                                        <div class='overlay'>
                                            <a href='#window".$i."' data-toggle='modal' class='expand pointsText'>".$members[$i]['score']." PONTOS</a>
                                        </div>
                                    </div>

                                    
                                    <div class='modal fade' id='window".$i."' tabindex='-1' role='dialog' aria-labelledby='window".$i."' aria-hidden='true'>
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
    <form action="../routes/routes.php" method="POST">
        <input class="btn btn-primary" type="submit" value="Logoff" name="logoutAttempt"/>
    </form>
    <hr>
    <br>    
</div>


<div class="container">
    <div class="row">

        <!-- Modal Window - Deleting Member - BEGIN -->
        <div class="window" id="dmember">
            <a href="#" class="fechar">X Fechar</a>

            <div class="form">
                <div class="modal-body">
                    <hr class="dark">
                    <p class="text-center historicTitle">DELETAR MEMBRO</p>
                    <hr class="dark">
                    <div>
                        <form action="../routes/routes.php" method="POST">
                            <label for="text">ID Membro:</label>
                            <input type="text" name="id" placeholder="ID Membro"/>
                            <br>
                            <input type="submit" name="deleteMemberAttempt" value="Enviar"/>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Modal Window - Deleting Member - END -->

        <!-- Modal Window - Deleting Warning - BEGIN -->  
        <div class="window" id="dwarning">
            <a href="#" class="fechar">X Fechar</a>
            
            <div class="form">
                <div class="modal-body">
                    <hr class="dark">
                    <p class="text-center historicTitle">DELETAR ADVERTÊNCIA</p>
                    <hr class="dark">
                    <div>
                        <form action="../routes/routes.php" method="POST">
                            <label for="text">ID Advertência:</label>
                            <input type="text" name="id" placeholder="ID Advertência"/>
                            <br>
                            <input type="submit" name="deleteWarningAttempt" value="Enviar"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Window - Deleting Warning - END-->

        <!-- Modal Window - Register Member - BEGIN -->  
        <div class="window" id="rmember">
            <a href="#" class="fechar">X Fechar</a>
            
            <div class="form">
                <div class="modal-body">
                    <hr class="dark">
                    <p class="text-center historicTitle">CADASTRAR MEMBRO</p>
                    <hr class="dark">
                    <div>
                        <form action="../routes/routes.php" method="POST">
                            <label for="text">Nome:</label>
                            <input type="text" name="name" placeholder="Nome"/>
                            <br>
                            <br>
                            <label for="text">Login:</label>
                            <input type="text" name="login" placeholder="Login"/>
                            <br><br>
                            <label for="text">Senha:</label>
                            <input type="text" name="password" placeholder="Senha"/>
                            <br><br>
                            <label for="number">Pontos:</label>
                            <input type="number" name="score" placeholder="Pontos"/>
                            <br><br>
                            <label for="text">Cargo:</label>
                            <input type="text" name="role" placeholder="Cargo"/>
                            <br><br>
                            <label for="text">Privilegio:</label><br>
                            <input type="radio" name="privilege" value="1"> ADMINISTRADOR <br>
                            <input type="radio" name="privilege" value="0"> USUÁRIO <br>
                            <br><br>
                            <input type="submit" name="registerAttempt" value="Enviar"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Window - Register Member - END-->

        <!-- Modal Window - Update Member - BEGIN -->
        <div class="window" id="updateMember">
            <a href="#" class="fechar">X Fechar</a>
            
            <div class="form">
                <div class="modal-body">
                    <hr class="dark">
                    <p class="text-center historicTitle">ATUALIZAR MEMBRO</p>
                    <hr class="dark">
                    <div>
                        <form action="../routes/routes.php" method="POST">
                            <label for="text">ID:</label>
                            <input type="text" name="id" placeholder="ID"/>
                            <br>
                            <br>
                            <label for="text">Nome:</label>
                            <input type="text" name="name" placeholder="Nome"/>
                            <br>
                            <br>
                            <label for="text">Login:</label>
                            <input type="text" name="login" placeholder="Login"/>
                            <br><br>
                            <label for="text">Senha:</label>
                            <input type="text" name="password" placeholder="Senha"/>
                            <br><br>
                            <label for="number">Pontos:</label>
                            <input type="number" name="score" placeholder="Pontos"/>
                            <br><br>
                            <label for="text">Cargo:</label>
                            <input type="text" name="role" placeholder="Cargo"/>
                            <br><br>
                            <label for="text">Privilegio:</label><br>
                            <input type="radio" name="privilege" value="1"> ADMINISTRADOR <br>
                            <input type="radio" name="privilege" value="0"> USUÁRIO <br>
                            <br><br>
                            <input type="submit" name="updateMemberAttempt" value="Enviar"/>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Modal Window - Update Member - END -->

        <!-- Modal Window - Update Warning - BEGIN -->
        <div class="window" id="updateWarning">
            <a href="#" class="fechar">X Fechar</a>
            
            <div class="form">
                <div class="modal-body">
                    <hr class="dark">
                    <p class="text-center historicTitle">ATUALIZAR ADVERTÊNCIA</p>
                    <hr class="dark">
                    <div>
                    <form action="../routes/routes.php" method="POST">
                        <label for="text">ID Advertência:</label>
                        <input type="number" name="id" placeholder="ID Advertencia"/>
                        <br>
                        <br>
                        <label for="text">ID Membro:</label>
                        <input type="number" name="idmember" placeholder="ID Membro"/>
                        <br>
                        <br>
                        <label for="text">Data:</label>
                        <input type="date" name="date" placeholder="Data"/>
                        <br><br>
                        <label for="text">Motivo:</label>
                        <input type="text" name="reason" placeholder="Motivo" size="80"/>
                        <br><br>
                        <label for="number">Pontos:</label>
                        <input type="number" name="score" placeholder="Pontos"/>
                        <br><br>
                        <label for="text">Responsável:</label>
                        <input type="text" name="responsible" placeholder="Responsável"/>
                        <br><br>
                        <label for="text">Indeferido:</label><br>
                        <input type="radio" name="dismissed" value="1"> Sim <br>
                        <input type="radio" name="dismissed" value="0"> Não <br>
                        <br><br>
                        <input type="submit" name="updateWarningAttempt" value="Enviar"/>
                    </form>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Modal Window - Update Warning - END -->

        <!-- Modal Window - Add Warning - BEGIN -->
        <div class="window" id="addWarning">
            <a href="#" class="fechar">X Fechar</a>
            
            <div class="form">
                <div class="modal-body">
                    <hr class="dark">
                    <p class="text-center historicTitle">ADICIONAR ADVERTÊNCIA</p>
                    <hr class="dark">
                    <div>
                        <form action="../routes/routes.php" method="POST">
                            <label for="text">ID Membro:</label>
                                <input type="number" name="idmember" placeholder="ID Membro"/>
                                <br>
                                <br>
                                <label for="text">Data:</label>
                                <input type="date" name="date" placeholder="Data"/>
                                <br><br>
                                <label for="text">Motivo:</label>
                                <input type="text" name="reason" placeholder="Motivo" size="80"/>
                                <br><br>
                                <label for="number">Pontos:</label>
                                <input type="number" name="score" placeholder="Pontos"/>
                                <br><br>
                                <label for="text">Responsável:</label>
                                <input type="text" name="responsible" placeholder="Responsável"/>
                                <br><br>
                                <label for="text">Indeferido:</label><br>
                                <input type="radio" name="dismissed" value="1"> Sim <br>
                                <input type="radio" name="dismissed" value="0"> Não <br>
                                <br><br>
                                <input type="submit" name="warningAttempt" value="Enviar"/>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Window - Add Warning - END -->
    </div>

    <!-- mascara para cobrir o site -->  
    <div id="mascara"></div>
</div>


<?php
    if(isset($_GET['validUpdateMember'])){
        if($_GET['validUpdateMember']=="true"){
            echo "<script>alert('Membro Atualizado!')</script>";
        }
    }
    if(isset($_GET['validUpdateWarning'])){
        if($_GET['validUpdateWarning']=="true"){
            echo "<script>alert('Advertência Atualizada!')</script>";
        }
    }
    if(isset($_GET['validRegisterMember'])){
        if($_GET['validRegisterMember']=="true"){
            echo "<script>alert('Membro Registrado!')</script>";
        }
    }
    if(isset($_GET['validRegisterWarning'])){
        if($_GET['validRegisterWarning']=="true"){
            echo "<script>alert('Advertência Registrada!')</script>";
        }
    }
    if(isset($_GET['validDeleteWarning'])){
        if($_GET['validDeleteWarning']=="true"){
            echo "<script>alert('Advertência deletada!')</script>";
        }
    }
    if(isset($_GET['validDeleteMember'])){
        if($_GET['validDeleteMember']=="true"){
            echo "<script>alert('Membro deletado!')</script>";
        }
    }
?>
</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

</html>