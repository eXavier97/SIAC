<?php
session_start();
require_once "../includes/pdo.php";
require_once "../includes/util.php";

validarAdmin();
/*
$trabajoInfantil = $pdo->prepare("INSERT INTO trabajoinfantil(
        IdBeneficiario, IdLugarTrabajo, IdTipoTrabajo,
        IdCondicionTrabajo, IdFrecuenciaPagoTrabajo,
        IdFormaPago, IdGastaDineroEn, IdTipoTrabajoInfantil, 
        EnQueTrabaja, HorasTrabajo, RealizaTrabajoCon,
        ConQuienTrabaja, Observaciones, FechaRegistro)
    VALUES(
        :IdBeneficiario, :IdLugarTrabajo, :IdTipoTrabajo,
        :IdCondicionTrabajo, :IdFrecuenciaPagoTrabajo,
        :IdFormaPago, :IdGastaDineroEn, :IdTipoTrabajoInfantil, 
        :EnQueTrabaja, :HorasTrabajo, :RealizaTrabajoCon,
        :ConQuienTrabaja, :Observaciones, NOW())"
);
$trabajoInfantil->execute(array(
    ':IdBeneficiario' => $_POST['CodigoNino'],
    ':IdLugarTrabajo' => $_POST['lugartrabajo'],
    ':IdTipoTrabajo' => $_POST['tipotrabajo'],
    ':IdCondicionTrabajo' => $_POST['condiciontrabajo'],
    ':IdFrecuenciaPagoTrabajo' => $_POST['frecuenciapago'],
    ':IdFormaPago' => $_POST['formapago'],
    ':IdGastaDineroEn' => $_POST['gastadineroen'],
    ':IdTipoTrabajoInfantil' => $_POST['trabajoinfantil'],
    ':EnQueTrabaja' => $_POST['trabajaEn'],
    ':HorasTrabajo' => $_POST['horas'],
    ':RealizaTrabajoCon' => $_POST['realizaT'],
    ':ConQuienTrabaja' => $_POST['NombreQ']?? NULL,
    ':Observaciones' => $_POST['ObservacionesTI'],    
));

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
    ':Foto' => $_POST['foto'] ?? NULL,
    ':Nombres' => $_POST['NombreNino'],
    ':Apellidos' => $_POST['ApellidosNino'],
    ':NumId' => $_POST['IdNino'],
    ':Sexo' => $_POST['sexo'] ?? NULL,
    ':FechaNacimiento' => $_POST['fechaNac'],
    ':DireccionDomicilio' => $_POST['DireccionDom'],
    ':Correo' => $_POST['correonino'] ?? NULL,
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
    ':IdPadrinazgo' => $_POST['TipoPadrinazgo'],  
    ':IdDpto' => $_POST['lugar'],
    ':IdBarrio' => $_POST['bar'],
    ':IdEducador' => $_POST['codigoEdu']
));
*/
/*Antes ejecutar una consulta sql:
    ALTER TABLE relacionesfamiliares DROP COLUMN IdRelacion*/
/*
$relacionesFamiliares = $pdo->prepare("INSERT INTO relacionesfamiliares(
    IdBeneficiario, EntrePadres,
    EntreHermanos, MadreHijo, PadreHijo, ConLaFamiliaMaterna, ConLaFamiliaPaterna,
    ConLosVecinos, Observaciones, FechaRegistro)
VALUES (
    :IdBeneficiario, :EntrePadres,
    :EntreHermanos, :MadreHijo, :PadreHijo, :ConLaFamiliaMaterna, :ConLaFamiliaPaterna,
    :ConLosVecinos, :Observaciones, NOW())"
);

$relacionesFamiliares->execute(array(
    ':IdBeneficiario' => $_POST['CodigoNino'],
    ':EntrePadres' => $_POST['entrepadres'] ?? NULL,
    ':EntreHermanos' => $_POST['entrehermanos'] ?? NULL,
    ':MadreHijo' => $_POST['madreHijo'] ?? NULL,
    ':PadreHijo' => $_POST['PadreHijo'] ?? NULL,
    ':ConLaFamiliaMaterna' => $_POST['familiamaterna'] ?? NULL,
    ':ConLaFamiliaPaterna' => $_POST['familiapaterna'] ?? NULL,
    ':ConLosVecinos' => $_POST['relavecinos'] ?? NULL,
    ':Observaciones'=> $_POST['Observacionesv'] ?? NULL
));*/

$educacion = $pdo->prepare("INSERT INTO educacionbeneficiario(
    IdBeneficiario, IdCentroEducativo, Primaria,
    secundaria, UltimoGradoAprobado, AnioLectivoAprobado, HaReprobado, GradosReprobados,
    CuantasVecesReprobo, MotivosReprobacion, HaSidoExpulsado, EducacionVocacional, NombreCentroVocacional,
    Oficio, Deserto, MotivosDesercion, Observaciones, FechaRegistro)
VALUES (
    :IdBeneficiario, :IdCentroEducativo, :Primaria,
    :secundaria, :UltimoGradoAprobado, :AnioLectivoAprobado, :HaReprobado, :GradosReprobados,
    :CuantasVecesReprobo, :MotivosReprobacion, :HaSidoExpulsado, :EducacionVocacional, :NombreCentroVocacional,
    :Oficio, :Deserto, :MotivosDesercion, :Observaciones, NOW())"
);

$educacion->execute(array(
    ':IdBeneficiario' => $_POST['CodigoNino'],
    ':IdCentroEducativo' => $_POST['centroEduc'] ?? NULL,
    ':Primaria' => $_POST['Primaria'] ?? NULL,
    ':secundaria' => $_POST['secu'] ?? NULL,
    ':UltimoGradoAprobado' => $_POST['uGrado'] ?? NULL,
    ':AnioLectivoAprobado' => $_POST['sel1'] ?? NULL,
    ':HaReprobado' => $_POST['Repro'] ?? NULL,
    ':GradosReprobados'=> $_POST['GradosRepro'] ?? NULL,
    ':CuantasVecesReprobo' => $_POST['veces'] ?? NULL,
    ':MotivosReprobacion' => $_POST['motivosRep'] ?? NULL,
    ':HaSidoExpulsado' => $_POST['expul'] ?? NULL,
    ':EducacionVocacional' => $_POST['eduV'] ?? NULL,
    ':NombreCentroVocacional' => $_POST['nombrecv'] ?? NULL,
    ':Oficio' => $_POST['Oficio'] ?? NULL,
    ':Deserto' => $_POST['desertO'] ?? NULL,
    ':MotivosDesercion' => $_POST['motivosDese'] ?? NULL,
    ':Observaciones'=> $_POST['Observaciones'] ?? NULL
));

// header('Location: http://localhost:8081/siac/admin.php');
header('Location: http://localhost/siac/admin.php');

?>
