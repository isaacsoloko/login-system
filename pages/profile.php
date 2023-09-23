<?php
    session_start();
    if ((! isset($_SESSION['fullName']) || empty($_SESSION['fullName'])) &&
        (! isset($_SESSION['name']) || empty($_SESSION['name'])) && 
        (! isset($_SESSION['email']) || empty($_SESSION['email'])) &&
        (! isset($_SESSION['password']) || empty($_SESSION['password']))) {
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta property="og:title" content="Login System" />
        <meta property="og:type" content="profile" />
        <meta property="og:image" content="https://isaacsoloko.github.io/login/img/code.png" />
        <meta property="og:description" content="Php :: Mise en pratique des notions acquises" />
        <link rel="shortcut icon" href="../img/code.png" type="image/x-icon" />
        <link rel="stylesheet" href="../css/style.css" />
        <title>Login System</title>
    </head>
    <body>
        <div class="container">
            <div class="img-container">
                <img src="../img/user.png" alt="User image" />
            </div>
            <h4>Bienvenu dans votre compte, <?= $_SESSION['fullName'];?></h4>
            <div class="user-info">
                @<?= $_SESSION['name'];?> <br>
                <?= $_SESSION['email'];?>
            </div>
            <form method="POST" action="../src/controller/loginController.php">
                <input type="submit" name="deconnexion" value="Déconnexion" class="second-btn" />
            </form>
        </div>
    </body>
</html>