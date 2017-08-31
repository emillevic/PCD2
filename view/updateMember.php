    <?php
        session_start();
        require_once("../database/Connection.class.php");
        require_once("../controller/MembersController.class.php");
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
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
                <form action="../routes/routes.php" method="POST">
                    <input type="submit" value="Logout" name="logoutAttempt"/>
                </form>
            </div>

        </div>
        </div>
        <a href="index.html" class="page-scroll btn btn-primary btn-xl sr-button">Voltar</a>
        </div>
        </div>
    </div>  

<?php
    if(isset($_GET['valid'])){
        if($_GET['valid']=="true"){
            echo "<h3>Membro Atualizado!</h3>";
        }
    }
?>

</body>
</html>
