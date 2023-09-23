<?php
    session_start();
    require_once('../../data/db.php');
    require_once('../model/loginModel.php');
    require_once('../model/user.php');
    $login = new Login(DB::get_instance());
    //Si le bouton Se connecter est déclenché
    if (isset($_POST['login'])) {
        $user = $login->getUser(trim($_POST['user']), md5(trim($_POST['password'])));
        if (is_null($user)) {
            header('Location:../../pages/login.php');
        }
        else{
            $_SESSION['fullName'] = $user->getFullName();
            $_SESSION['name'] = $user->getName();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['password'] = $user->getPassword();
            header('Location:../../pages/profile.php');
        }     
    }

    if (isset($_POST['register'])) {
        $fullName = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $name = trim($_POST['user']);
        $password = trim($_POST['password']);
        if (!empty($fullName) && !empty($email) && !empty($name) && !empty($password)) {
            $login->createUser($fullName, $name, $email, md5($password));
            $_SESSION['fullName'] = $fullName;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location:../../pages/profile.php');
        }
    }

    if (isset($_POST['deconnexion'])) {
        session_destroy();
        unset($_SESSION['fullName']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location:../../pages/login.php');
    }