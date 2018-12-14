<?php
session_start();
require_once "../includes/pdo.php";
require_once "../includes/util.php";

validarAdmin();

$ActividadesFamiliares = $pdo->prepare("INSERT INTO beneficiario_x_actividadesfamiliares(
        IdBeneficiario, IdActividadFamiliar,
        FechaActividad, Observaciones, FechaRegistro)
    VALUES (
        :IdBeneficiario, :IdActividadFamiliar,
        :FechaActividad, :Observaciones, NOW())"
);

$ActividadesFamiliares->execute(array(
    ':IdBeneficiario' => $_POST['CodigoNino'],
    ':IdActividadFamiliar' => $_POST['ActividadFamiliar'],
    ':FechaActividad' => $_POST['Fecha'],
    ':Observaciones' => $_POST['Observaciones']??NULL
));

header('Location: http://localhost:8081/siac/admin.php');
//header('Location: http://localhost/siac/admin.php');
?>