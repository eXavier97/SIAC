<?php 
session_start();
require_once "includes/pdo.php";
require_once "includes/util.php";

if(isset($_POST['login'])) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(array(':username' => $_POST['username']));
    $row = $stmt->fetch();
    if($row === false) {
        $_SESSION['failure'] = "Usuario Incorrecto";
        header('Location: login.php');
        exit;
    }
    if(!password_verify($_POST['password'],$row['password'])) {
        $_SESSION['failure'] = "Contraseña Incorrecta";
        header('Location: login.php');
        exit;
    }
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['admin'] = $row['admin'];
    
    if($row['admin'] == 1) {
        header('Location: admin.php');
    } else {
        header('Location: educador.php');
    }
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php require_once "includes/header.php"?>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md"></div>
        <div class="col col-md-6">
            <form method="POST">
                <div class="imgcontainer">
                    <img src="images/logoOficial.jpeg" alt="logo" class="avatar">
                </div>

                <div class="container">
                    <label for="username"><b>Usuario</b></label>
                    <input type="text" placeholder="Ingrese Usuario" name="username" required>

                    <label for="password"><b>Contraseña</b></label>
                    <input type="password" placeholder="Ingrese Contraseña" name="password" required>

                    <button type="submit" name="login" class="btn btn-lg btn-block btn-outline-light my-5">Ingresar</button>
                    <?php flashMessage() ?>
                </div>
            </form>
        </div>
        <div class="col-md"></div>
    </div>
</div>

</body>
</html>