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

<!--<script src="js/registrar-participante.js"></script>-->

<body>
<?php require_once "includes/nav-admin.php" ?>
<form id="regForm" action="#" method="POST">
<h2 style="text-align: center; color:darkblue;">Correspondencia</h2>
  <ul class="nav flex-column flex-md-row justify-content-center">
    
    <li class="nav-item">
      <a class="nav-link custom" href="#">Carta por carta</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Carta de bienvenida/Padrino nominativo</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Carta de bienvenida/Padrino de acción</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Carta de despedida</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Carta por paquete</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Carta por donación recibida</a>
    </li>
  </ul>

  <div class="tab">
     <h3>Carta por carta</h3>    
     <div class="form-row">

       <div class="form-group col-md-12">
             <label for="Contenido">Contenido</label>
            <textarea type="text" class="form-control" id="Contenido" name="Contenido" placeholder="Contenido"></textarea>
       </div>
  
  
       <div class="form-group col-md-4">
					<label for="fechaIngC">Fecha de Ingreso a Compartir:</label>
          <input type="date" class="form-control" id="fechaIngC" name="fechaIngC" placeholder="Fecha de ingreso a Compartir"/>
       </div>

       <div class="form-group col-md-4">
					<label for="fechaEntE">Fecha de entrega al Educador:</label>
          <input type="date" class="form-control" id="fechaEntE" name="fechaEntE" placeholder="Fecha de entrega al Educador"/>
       </div>

       <div class="form-group col-md-4">
					<label for="fechaDevE">Fecha de devolución por el Educador:</label>
          <input type="date" class="form-control" id="fechaDevE" name="fechaDevE" placeholder="Fecha de devolución por el Educador"/>
       </div>

       <div class="form-group col-md-12">
             <label for="ContenidoDPM">Contenido de acuerdo a demanda P/M</label>
            <textarea type="text" class="form-control" id="ContenidoDPM" name="ContenidoDPM" placeholder="Contenido de acuerdo a demanda P/M"></textarea>
       </div>

       <div class="form-group col-md-4">
					<label for="fechaDevE">Fecha de envía a Francia:</label>
          <input type="date" class="form-control" id="fechaDEF" name="fechaDEF" placeholder="Fecha de envío a Francia"/>
       </div>
    </div>
   </div>

   <div class="tab">
       <h3>Carta de bienvenida/ Nuevos padrinos nominativos</h3>
       <div class="form-row">
          
        <div class="form-group col-md-4">
					<label for="fechaNot">Fecha de notificacion:</label>
          <input type="date" class="form-control" id="fechaNot" name="fechaNot" placeholder="Fecha de notificación"/>
       </div>

       <div class="form-group col-md-4">
					<label for="fechaEntE1">Fecha de entrega al Educador:</label>
          <input type="date" class="form-control" id="fechaEntE1" name="fechaEntE1" placeholder="Fecha de entrega al Educador"/>
       </div>

       <div class="form-group col-md-4">
					<label for="Rcontenido">Revición de contenido</label>
          <select id="Rcontenido" name="Rcontenido" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="fechaEnvF">Fecha de envío a Francia:</label>
          <input type="date" class="form-control" id="fechaEnvF" name="fechaEnvF" placeholder="Fecha de envío Francia"/>
        </div>
       </div>
   </div>

   <div class="tab">
    <h3>Carta de bienvenida/ Nuevos padrinos de acción</h3>
      <div class="form-row">
         <div class="form-group col-md-4">
					 <label for="fechaNot1">Fecha de notificación:</label>
           <input type="date" class="form-control" id="fechaNot1" name="fechaNot1" placeholder="Fecha de notitifiación"/>
         </div>

         <div class="form-group col-md-4">
					<label for="Cenviada">Carta enviada</label>
          <select id="Cenviada" name="Cenviada" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
         </div>
      </div>
   </div>

   <div class="tab">
    <h3>Carta de despedida</h3>
      <div class="form-row">
        <div class="form-group col-md-4">
					<label for="Cenviada1">Carta enviada</label>
          <select id="Cenviada1" name="Cenviada1" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="fechaEnvF1">Fecha de envío a Francia:</label>
          <input type="date" class="form-control" id="fechaEnvF1" name="fechaEnvF1" placeholder="Fecha de envío Francia"/>
        </div>

        <div class="form-group col-md-4">
					<label for="Rcontenido1">Contenido revisado</label>
          <select id="Rcontenido1" name="Rcontenido1" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="SolEngPresent">Solicitud de engreso presentado</label>
          <select id="" name="SolEngPresent" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="FichReempPresent">Ficha de reemplazo presentado</label>
          <select id="" name="FichReempPresent" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>
      </div>
   </div>

   <div class="tab">
    <h3>Carta por paquete</h3>
     <div class="form-row">
        <div class="form-group col-md-4">
					<label for="Cenviada2">Carta enviada</label>
          <select id="" name="Cenviada2" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="fechaEnvF2">Fecha de envío a Francia:</label>
          <input type="date" class="form-control" id="fechaEnvF2" name="fechaEnvF2" placeholder="Fecha de envío Francia"/>
        </div>

     </div>
   </div>

   <div class="tab">
    <h3>Carta por donación recibida</h3>     
    <div class="form-row">
        <div class="form-group col-md-4">
					<label for="fechaNot2">Fecha de notificación:</label>
          <input type="date" class="form-control" id="fechaNot2" name="fechaNot2" placeholder="Fecha de notificación"/>
        </div>
        
        <div class="form-group col-md-4">
					<label for="ActParticipa">Actividad en la que participo</label>
          <select id="" name="ActPaticipa" class="form-control">
						<option hidden="">Seleccione</option>
            <option value="Cult">Cultura</option>
            <option value="Org">Organización comunitaria</option>
            <option value="Educ">Educativas</option>
          </select>
        </div>

        <div class="form-group col-md-4">
          <!--No esta obligatorio por si no tienen foto del participante--> 
          <label for="Carta">Carta institucional realizada:</label>
          <input type="file" class="form-control" id="Carta" name="Carta">
        </div>

        <div class="form-group col-md-4">
					<label for="fechaEnvF3">Fecha de envío a Francia:</label>
          <input type="date" class="form-control" id="fechaEnvF3" name="fechaEnvF3" placeholder="Fecha de envío Francia"/>
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
  </div>
</form>


<script src="js/form.js"></script>


</body>
</html>
