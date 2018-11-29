<?php
session_start();
require_once "../includes/pdo.php";
require_once "../includes/util.php";

validarAdmin();

$datosGenerales = $pdo->prepare("INSERT INTO beneficiario(
        IdBeneficiario, Foto, Nombres,
        Apellidos, NumId, Sexo, FechaNacimiento,
        DireccionDomicilio, Correo, Celular, Telefono, 
        Facebook, FechaIngreso, NumIdPadre, NombrePadre, 
        NumIdMadre, NombreMadre, FechaRegistro, Responsable, 
        RiesgoAbandonoH, IdSector, IdMunicipio, IdCentroComunitarioRef, 
        IdReconocidoPor, IdViveCon, IdMotivosRiesgoAbandonoH, IdPadrinazgo, 
        IdDpto, IdBarrio, IdEducador)
    VALUES (
        :IdBeneficiario, :Foto, :Nombres,
        :Apellidos, :NumId, :Sexo, :FechaNacimiento,
        :DireccionDomicilio, :Correo, :Celular, :Telefono, 
        :Facebook, :FechaIngreso, :NumIdPadre, :NombrePadre, 
        :NumIdMadre, :NombreMadre, NOW(), :Responsable, 
        :RiesgoAbandonoH, :IdSector, :IdMunicipio, :IdCentroComunitarioRef, 
        :IdReconocidoPor, :IdViveCon, :IdMotivosRiesgoAbandonoH, :IdPadrinazgo, 
        :IdDpto, :IdBarrio, :IdEducador)"
);

$datosGenerales->execute(array(
    ':IdBeneficiario' => $_POST['CodigoNino'],
    ':Foto' => $_POST['foto'],
    ':Nombres' => $_POST['NombreNino'],
    ':Apellidos' => $_POST['ApellidosNino'],
    ':NumId' => $_POST['IdNino'],
    ':Sexo' => $_POST['sexo'],
    ':FechaNacimiento' => $_POST['fechaNac'],
    ':DireccionDomicilio' => $_POST['DireccionDom'],
    ':Correo' => $_POST['correonino'],
    ':Celular' => $_POST['Celularnino'] ?? NULL, //campos no obligatorios
    ':Telefono' => $_POST['telefononino'] ?? NULL,
    ':Facebook' => $_POST['Facebook'] ?? NULL,
    ':FechaIngreso' => $_POST['fechaIng'],
    ':NumIdPadre' => $_POST['IdPadre'],
    ':NombrePadre' => $_POST['NombrePadre'],
    ':NumIdMadre' => $_POST['IdMadre'],
    ':NombreMadre' => $_POST['NombreMadre'],
    ':Responsable' => $_POST['ResponsableNino'],
    ':RiesgoAbandonoH' => $_POST['abandono'],
    ':IdSector' => $_POST['sec'],
    ':IdMunicipio' => $_POST['muni'],
    ':IdCentroComunitarioRef' => $_POST['centroc'],
    ':IdReconocidoPor' => $_POST['reconocido'],
    ':IdViveCon' => $_POST['vivecon'],
    ':IdMotivosRiesgoAbandonoH' => $_POST['abandonoHogar'],
    ':IdPadrinazgo' => $_POST['TipoPadrinazgo'] ?? NULL,  
    ':IdDpto' => $_POST['lugar'],
    ':IdBarrio' => $_POST['bar'],
    ':IdEducador' => $_POST['codigoEdu']
));

header('Location: http://localhost/siac/admin.php');

?>
