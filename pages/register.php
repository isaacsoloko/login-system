<?php
    session_start();
    if ((isset($_SESSION['fullName']) && ! empty($_SESSION['fullName'])) &&
        (isset($_SESSION['name']) && ! empty($_SESSION['name'])) && 
        (isset($_SESSION['email']) && ! empty($_SESSION['email'])) &&
        (isset($_SESSION['password']) && ! empty($_SESSION['password']))) {
        header('Location:profile.php');
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
        <meta property="og:image" content="https://isaacsoloko.github.io/login-system/img/code.png" />
        <meta property="og:description" content="Php & MySql :: Mise en pratique des notions acquises" />
        <link rel="shortcut icon" href="../img/code.png" type="image/x-icon" />
        <link rel="stylesheet" href="../css/style.css" />
        <title>Login System</title>
    </head>
    <body>
        <div class="container">
            <h3>S'enregistrer</h3>
            <form method="POST" action="../src/controller/loginController.php" class="register-form">
                <input type="text" name="fullname" placeholder="Nom complet" />
                <input type="email" name="email" placeholder="Adresse email" />
                <input type="text" name="user" placeholder="User name" />
                <input type="password" name="password" placeholder="User password" />
                <input type="submit" name="register" value="Créer un compte" class="primary-btn" />
                <label>Déjà membre ? <a href="login.php">connectez-vous !</a></label>
            </form>
        </div>
    </body>
</html>