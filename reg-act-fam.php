<?php
session_start();
require_once "includes/pdo.php";
require_once "includes/util.php";
validarAdmin();

$sql = "SELECT IdActividadFamiliar, NombreActividadFamiliar FROM actividadesfamiliares";
$resultado = $pdo-> query($sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registar Actividad Familiar</title>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <?php require_once "includes/header.php" ?>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="styles/ver.css">
</head>
<style>
.centrar{
      margin-left:15%;
      margin-right:15%;
      margin-top:20px;
  }
</style>
<body>
<?php require_once "includes/nav-admin.php" ?>
<form id="regForm" action="actions/reg-act-fam.php" method="POST">
  <div class="tab container bg-white p-5 mt-5">
    <h1 style="text-align: center; color:darkblue;">Actividad Familiar por Participante</h1>
      <div class="form-row centrar">
        <div class="form-group col-10">
            <label for="CodigoNino">Código del/la participante:</label>
            <input type="number" id="CodigoNino" name="CodigoNino" class="form-control" placeholder="Codigo del/la participante" maxlength="11" onkeypress="return event.charCode >= 48" min="1" required/>
        </div>

        <div class="form-group col-md-10">
          <label for="tipo">Nombre de la Actividad:</label>
          <select class="form-control" id="ActividadFamiliar" name="ActividadFamiliar" required>
                <option hidden="">Seleccione un Actividad</option>
                <?php
                while ($row = $resultado->fetch()) {
                ?>
                <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
                <?php
                }?>
            </select>
        </div>

        <div class="form-group col-md-10">
		    <label for="Fecha">Fecha:</label>
            <input type="date" class="form-control" id="Fecha" name="Fecha" placeholder="Fecha que se llevó a cabo" required/>
        </div>

        <div class="form-group col-md-10">
                <label for="Observaciones">Observaciones:</label>
                <input type="text" name="Observaciones" id="Observaciones" value="" class="form-control" placeholder="Observaciones">
        </div>
  </div>
  <div class="row py-5">
    <div class="col-12">
      <div class="btn-group float-right" role="group" aria-label="Basic example">
          <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </div>
  </div>
</form>

<script src="js/form.js"></script>


</body>
</html>