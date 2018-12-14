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
  <title>Correspondencia</title>
  <?php require_once "includes/header.php" ?>
  <link rel="stylesheet" href="styles/admin.css">
  <link rel="stylesheet" href="styles/form.css">
</head>

<style>
  h3 {
    text-align: center; 
    margin-top:40px;
    margin-bottom:40px;
  }
</style>

<script src="js/registrar-participante.js"></script>

<body>
<?php require_once "includes/nav-admin.php" ?>
<form id="regForm" action="#" method="POST">
<h2 style="text-align: center; color:darkblue;">Fichas de ingreso/Reemplazo</h2>
  <ul class="nav flex-column flex-md-row justify-content-center">
    <li class="nav-item">
      <a class="nav-link custom" href="#">Ficha nueva</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Actualizar ficha</a>
    </li>
  </ul>

  <div class="tab">
    <h3>Ficha nueva</h3>
    <div class="form-row">
        <div class="form-group col-md-4">
			<label for="fechaEnvF">Fecha de envío a Francia:</label>
            <input type="date" class="form-control" id="fechaEnvF" name="fechaEnvF" placeholder="Fecha de notificación"/>
         </div>
   

         <div class="form-group col-md-4">
			<label for="fichaComplet">Ficha completa del niño</label>
            <select id="" name="fichComplet" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
            </select>
         </div>
    </div>
  </div>

  <div class="tab">
      <h3>Actualizar ficha</h3>
      <div class="form-row">
         <div class="form-group col-md-4">
			<label for="fechaDAct">Fecha de actualización:</label>
            <input type="date" class="form-control" id="fechaDAct" name="fechaDAct" placeholder="Fecha de actualización"/>
         </div>

         <div class="form-group col-md-4">
			<label for="fichaComplet1">Ficha completa del niño</label>
            <select id="fichaComplet1" name="fichComplet1" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
            </select>
         </div>
      </div>
  </div>



  <div class="row py-5">
    <div class="col-12">
      <div class="btn-group float-right" role="group" aria-label="Basic example">
          <button class="btn btn-warning btn btn-secondary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button class="btn btn-success btn btn-secondary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
  </div>

  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script src="js/form.js"></script>
</body>
</html>