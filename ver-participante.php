<?php
session_start();
require_once "includes/pdo.php";
require_once "includes/util.php";
validarAdmin();

$beneficiario = $pdo->query("SELECT IdBeneficiario, Nombres, Apellidos
        FROM beneficiario");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registar Participante</title>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <?php require_once "includes/header.php" ?>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="styles/ver.css">
</head>
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
        <div class="col-12">
        <h1 style="text-align: center; color:darkblue;">Tabla de Participantes</h1>
        <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th class="th-sm">Código</th>
                    <th class="th-sm">Nombres</th>
                    <th class="th-sm">Apellidos</th>
                    <th class="th-sm">Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $beneficiario->fetch()){
                        echo "<tr>";
                        echo "<td>" . htmlentities($row['IdBeneficiario']) . "</td>";
                        echo "<td>" . htmlentities($row['Nombres']) . "</td>";
                        echo "<td>" . htmlentities($row['Apellidos']) . "</td>";
                        echo "<td><a href='detalles?id=".htmlentities($row['IdBeneficiario'])."'>Ver Detalles</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">Código</th>
                    <th class="th-sm">Nombres</th>
                    <th class="th-sm">Apellidos</th>
                    <th class="th-sm">Detalles</th>
                </tr>
            </tfoot>
        </table>
            
        </div>
    </div>
</div>


</body>
</html>