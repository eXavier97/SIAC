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
<h2 style="text-align: center; color:darkblue; padding:0.5cm; margin-top:70px; margin-bottom:-130px">Padrinazgo local</h2>
<form id="regForm" action="#" method="POST">
<div class="tab">
    <h3>Primer envío: Regreso a clases</h3>
    <div class="form-row">
         <div class="form-group col-md-4">
			<label for="CartRealiz">Carta realizada</label>
            <select id="CartRealiz" name="CartRealiz" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
            </select>
         </div>
    </div>
    <h3>Segundo envío: Aniversario</h3>
    <div class="form-row">
         <div class="form-group col-md-4">
			<label for="CartRealiz1">Carta realizada</label>
            <select id="CartRealiz1" name="CartRealiz1" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
            </select>
         </div>

         <div class="form-group col-md-4">
			<label for="fotoAct">Foto actualizada</label>
            <select id="fotoAct" name="fotoActz" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
            </select>
         </div>
    </div>
    <h3>Tercer envío: Navideño</h3>
    <div class="form-row">
         <div class="form-group col-md-4">
			<label for="CartRealiz2">Carta realizada</label>
            <select id="CartRealiz2" name="CartRealiz2" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
            </select>
         </div>

         <div class="form-group col-md-4">
			<label for="reportReal">Reporte realizado</label>
            <select id="reportReal" name="reportReal" class="form-control">
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
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script src="js/form.js"></script>
</body>
</html>