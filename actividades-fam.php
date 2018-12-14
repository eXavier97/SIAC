<?php
session_start();
require_once "includes/pdo.php";
require_once "includes/util.php";
validarAdmin();

$actividades = $pdo->query("SELECT c.idbeneficiario, concat_ws(' ', d.Nombres,d.Apellidos) AS NombreBeneficiario, c.idactividadfamiliar,c.nombreactividadfamiliar,c.valoractividadfamiliar,c.fechaactividad,c.observaciones
from(
    select b.IdBeneficiario, a.IdActividadFamiliar, a.NombreActividadFamiliar, a.ValorActividadFamiliar,
    b.FechaActividad, b.Observaciones 
    from actividadesfamiliares a inner join beneficiario_x_actividadesfamiliares b on
    a.IdActividadfamiliar=b.IdActividadFamiliar)c INNER join beneficiario d on c.idbeneficiario = d.IdBeneficiario");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Actividades Familiares</title>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <?php require_once "includes/header.php" ?>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="styles/ver.css">
</head>
<style>
.centrar{
      margin-left:40%;
      margin-right:40%;
      margin-top:20px;
  }
</style>
<body>
<?php require_once "includes/nav-admin.php" ?>


<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>


<div class="container bg-white p-5 mt-5">
    <div class="row">
        <div class="col-12 table-responsive">
        <h1 style="text-align: center; color:darkblue;">Actividades Familiares por Participante</h1>
        <a href="reg-act-fam.php" class="btn btn-primary btn-lg active centrar" role="button" aria-pressed="true">Registrar Actividad</a>
        <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th class="th-sm">Código del Participante</th>
                    <th class="th-sm">Nombre del Participante</th>
                    <th class="th-sm">Código de la Actividad</th>
                    <th class="th-sm">Nombre de la Actividad</th>
                    <th class="th-sm">Valor</th>
                    <th class="th-sm">Fecha</th>
                    <th class="th-sm">Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $actividades->fetch()){
                        echo "<tr>";
                        echo "<td>" . htmlentities($row['IdBeneficiario']) . "</td>";
                        echo "<td>" . htmlentities($row['NombreBeneficiario']) . "</td>";
                        echo "<td>" . htmlentities($row['IdActividadFamiliar']) . "</td>";
                        echo "<td>" . htmlentities($row['NombreActividadFamiliar']) . "</td>";
                        echo "<td>" . htmlentities($row['ValorActividadFamiliar']) . "</td>";
                        echo "<td>" . htmlentities($row['FechaActividad']) . "</td>";
                        echo "<td>" . htmlentities($row['Observaciones']) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">Código del Participante</th>
                    <th class="th-sm">Nombre del Participante</th>
                    <th class="th-sm">Código de la Actividad</th>
                    <th class="th-sm">Nombre de la Actividad</th>
                    <th class="th-sm">Valor</th>
                    <th class="th-sm">Fecha</th>
                    <th class="th-sm">Observaciones</th>
                </tr>
            </tfoot>
        </table>
            
        </div>
    </div>
</div>


</body>
</html>