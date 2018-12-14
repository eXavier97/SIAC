<?php
    require_once "../includes/pdo.php";
    $query = "select Foto from beneficiario WHERE idBeneficiario = ?"; 
    $stmt = $pdo->prepare( $query );
    
    // bind the id of the image you want to select
    $stmt->execute(array($_GET['id']));
    $stmt->bindColumn(1, $image, PDO::PARAM_LOB);
    $stmt->fetch(PDO::FETCH_BOUND);
    header("Content-type: image/jpg");
    
    //display the image data
    fpassthru($image);
?>