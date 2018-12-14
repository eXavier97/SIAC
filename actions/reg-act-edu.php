<?php
session_start();
require_once "../includes/pdo.php";
require_once "../includes/util.php";

validarAdmin();

$ActividadesEdu = $pdo->prepare("INSERT INTO beneficiario_has_actividadeseducativas(
        IdBeneficiario, IdActividadEdu,
        FechaActividad, Observaciones, FechaRegistro)
    VALUES (
        :IdBeneficiario, :IdActividadFamiliar,
        :FechaActividad, :Observaciones, NOW())"
);

$ActividadesEdu->execute(array(
    ':IdBeneficiario' => $_POST['CodigoNino'],
    ':IdActividadFamiliar' => $_POST['ActividadEducativa'],
    ':FechaActividad' => $_POST['Fecha'],
    ':Observaciones' => $_POST['Observaciones']??NULL
));

header('Location: http://localhost:8081/siac/admin.php');
//header('Location: http://localhost/siac/admin.php');
?>