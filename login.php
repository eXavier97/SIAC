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
<style>
/* Bordered form */
form {
    background: white;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}
</style>
</head>
<body style="background-color: darkslateblue">

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

                    <button type="submit" name="login">Ingresar</button>
                    <?php flashMessage() ?>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <a href="index.php"><button type="button" class="cancelbtn" name="cancel">Cancelar</button></a>
                </div>
            </form>
        </div>
        <div class="col-md"></div>
    </div>
</div>

</body>
</html>