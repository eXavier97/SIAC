<?php
session_start();
require_once "../includes/pdo.php";
require_once "../includes/util.php";

validarAdmin();

$ActividadesSalud = $pdo->prepare("INSERT INTO beneficiario_x_actividadessalud(
        IdBeneficiario, IdActividadesSalud,
        FechaActividad, Observaciones, FechaRegistro)
    VALUES (
        :IdBeneficiario, :IdActividadesSalud,
        :FechaActividad, :Observaciones, NOW())"
);

$ActividadesSalud->execute(array(
    ':IdBeneficiario' => $_POST['CodigoNino'],
    ':IdActividadesSalud' => $_POST['ActividadSalud'],
    ':FechaActividad' => $_POST['Fecha'],
    ':Observaciones' => $_POST['Observaciones']??NULL
));

header('Location: http://localhost:8081/siac/admin.php');
//header('Location: http://localhost/siac/admin.php');
?>