<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="assets/js/jquery-3.2.1.js"></script>
    <title>Document</title>
</head>
<body>
<header>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title inputBig">Programa de Controle Disciplinar</h3>
                 </div>
                 <br>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="../routes/routes.php" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="login" type="text">
                            </div><br>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div><br>

                            <input class="btn btn-lg btn-primary btn-block" type="submit" name="loginAttempt" value="Login">
                        </fieldset>
                      </form>
                    <?php
                        if(isset($_GET['valid'])){
                            if($_GET['valid']!="true"){
                                echo "<h3>Login Errado!</h3>";
                            }
                        }
                    ?>                      
			    </div>
			</div>
		</div>
	</div>
</div>
</div>
</header>
</body>
</html>