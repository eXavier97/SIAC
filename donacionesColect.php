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
<h2 style="text-align: center; color:darkblue; padding:0.5cm; margin-top:70px; margin-bottom:-130px">Donaciones colectivas</h2>
<form id="regForm" action="#" method="POST">
  <ul class="nav flex-column flex-md-row ">
    <li class="nav-item">
      <a class="nav-link custom" href="#">Celebraciones especiales</a>
    </li>
  </ul>

<div class="tab">
         
    <div class="form-row">
         <div class="form-group col-md-4">
		  <label for="TipDon">Tipo de donación recibida</label>
          <select id="" name="TipDon" class="form-control">
			<option hidden="">Seleccione</option>
            <option value="porCumple">Por Cumpleaños</option>
            <option value="navid">Navideña</option>
            <option value="otr">Otros</option>
          </select>
         </div>

         <div class="form-group col-md-4">
			<label for="fechaNot">Fecha de notificación:</label>
            <input type="date" class="form-control" id="fechaNot" name="fechaNot" placeholder="Fecha de notificación"/>
         </div>

         <div class="form-group col-md-4">
			<label for="Convocatoria">Convocatoria realizada</label>
            <select id="Convocatoria" name="Convocatoria" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
          </select>
         </div>

         <div class="form-group col-md-4">
			<label for="ActRealizada">Actividad realizada</label>
            <select id="" name="ActRealizada" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Cultura">Cultura</option>
               <option value="OrgComunit">Organización comunitaria</option>
               <option value="Educacion">Eduación</option>
          </select>
         </div>

         <div class="form-group col-md-4">
			<label for="CartInstReali">Carta institucional realizada</label>
            <select id="" name="CartInstReali" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
          </select>
         </div>

         <div class="form-group col-md-4">
			<label for="CartPartReali">Carta de participantes realizada</label>
            <select id="" name="CartPartReali" class="form-control">
		       <option hidden="">Seleccione</option>
               <option value="Si">Si</option>
               <option value="No">No</option>
          </select>
         </div>
<!-- Lo siguiente depende de las dos respuestas anteriores-->
         <div class="form-group col-md-4">
			<label for="fechaEnvF">Fecha de envío a Francia:</label>
            <input type="date" class="form-control" id="fechaEnvF" name="fechaEnvF" placeholder="Fecha de envío a Francia"/>
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
