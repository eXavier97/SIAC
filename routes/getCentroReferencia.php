<?php
    session_start();
	include '../includes/pdo.php';
	include '../includes/util.php';
	validarAdmin();
	
	$IdSector = $_POST['IdSector'];
	
	$queryM = "SELECT IdCentroComunitarioRef, CentroComunitarioRef FROM centrocomunitarioref  WHERE IdSector = '$IdSector' ";
	$resultadoM = $pdo->query($queryM);
	
	$html= "<option value='0' disabled>Seleccione el Sector</option>";
	
	while($rowM = $resultadoM->fetch())
	{
		$html.= "<option value='".$rowM['IdCentroComunitarioRef']."'>".$rowM['CentroComunitarioRef']."</option>";
	}
	
	echo $html;
?>		