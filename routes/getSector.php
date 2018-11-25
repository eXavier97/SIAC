<?php
    session_start();
	include '../includes/pdo.php';
	include '../includes/util.php';
	validarAdmin();
	
	$IdBarrio = $_POST['IdBarrio'];
	
	$queryM = "SELECT IdSector, Numero FROM barrio as B INNER JOIN sector as S ON B.IdBarrio = S.IdBarrio INNER JOIN numero as N ON S.IdNumero = N.IdNumero  WHERE B.IdBarrio = '$IdBarrio' ";
	$resultadoM = $pdo->query($queryM);
	
	$html= "<option value='0' disabled>Seleccione el Sector</option>";
	
	while($rowM = $resultadoM->fetch())
	{
		$html.= "<option value='".$rowM['IdSector']."'>".$rowM['Numero']."</option>";
	}
	
	echo $html;
?>		