<?php
session_start();
require_once "includes/pdo.php";
require_once "includes/util.php";
validarAdmin();

$id = $_GET["id"];

$datosGenerales = $pdo->prepare("SELECT * FROM beneficiario WHERE IdBeneficiario = :id");

$datosGenerales->execute(array(
    ':id' => $id
));

$datos = $datosGenerales->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detalles</title>
  <?php require_once "includes/header.php" ?>
  <link rel="stylesheet" href="styles/detalles.css">
</head>
</head>

<body>

<?php require_once "includes/nav-admin.php" ?>

<div class="container bg-white">
    <div class="row">
        <div class="col-12 p-5">
            <h1 class="text-center">Detalles</h1>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Nombres</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['Nombres'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Apellidos</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['Apellidos'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Identidad</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['NumId'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Sexo</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['Sexo'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Fecha Nacimiento</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['FechaNacimiento'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Dirección</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['DireccionDomicilio'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Correo</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['Correo'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Telefono</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['Telefono'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12 col-md-2 col-form-label">Fecha Ingreso</label>
                <div class="col-12 col-md-10">
                    <input class="form-control" type="text" value="<?=$datos['FechaIngreso'] ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>