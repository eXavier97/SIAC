<?php
	session_start();
	include '../includes/pdo.php';
	include '../includes/util.php';
	validarAdmin();
	
	$IdDpto = $_POST['IdDpto'];
	
	$queryM = "SELECT IdMunicipio, NombreMunicipio FROM municipio WHERE IdDpto = '$IdDpto' ";
	$resultadoM = $pdo->query($queryM);
	
	$html= "<option value='0' disabled>Seleccione el Municipio</option>";
	
	while($rowM = $resultadoM->fetch())
	{
		$html.= "<option value='".$rowM['IdMunicipio']."'>".$rowM['NombreMunicipio']."</option>";
	}
	
	echo $html;
?>		