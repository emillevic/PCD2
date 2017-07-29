

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Login - PCD EcompJr.</title>
</head>
<body>
    <header>
        <div class="form centralizar">
            <h2>Conecte-se!</h1>
            <hr><br>
            <form action="../routes/routes.php" method="POST">

                <label for="text">Login:</label>
                <input class="inputBig" type="text" name="login" placeholder="Login"/><br><br>
                <label for="text">Senha:</label>
                <input class="inputBig" type="password" name="password" placeholder="Senha"/><br><br>
                <input type="submit" name="loginAttempt" value="Login"/>
            </form>
        </div>
        <?php
            if(isset($_GET['valid'])){
                if($_GET['valid']!="true"){
                    echo "<h3>Login Errado!</h3>";
                }
            }
        ?>
    </header>
</body>
</html>