<?php
session_start();
require_once "includes/pdo.php";
require_once "includes/util.php";
validarAdmin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Actividades Familiares</title>
  <?php require_once "includes/header.php" ?>
  <link rel="stylesheet" href="styles/admin.css">
  <link rel="stylesheet" href="styles/form.css">
</head>
<style>
  .centrar{
      margin-left:45%;
      margin-right:45%;
  }
  h2{
      margin-top:30px;
      margin-bottom:30px;
  }
</style>
<body>
    <?php require_once "includes/nav-admin.php" ?>

    <h2 class="text-center">Actividades Familiares por Participante</h2>
    <button type="button" class="btn btn-primary centrar">Registrar Actividad</button>
</body>
</html>