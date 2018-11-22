<?php 
session_start();

require_once "includes/pdo.php";
require_once "includes/util.php";

validarAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <?php require_once "includes/header.php"?>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>

<?php require_once "includes/nav-admin.php"; ?>

<div class="container-fluid bg-dark">
    <div class="row py-3">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner justify-content-center">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="images/5.jpg" style="max-width: 700px; margin: 0 auto" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="images/2.jpg" style="max-width: 700px; margin: 0 auto" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="images/3.jpg" style="max-width: 700px; margin: 0 auto" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="background-color: #2E378D">
    <div class="row py-5">
        <div class="col">
            <h2 class="text-center display-4 text-white">Información</h2>
            <p class="text-center lead text-white"><span style="color: #9FE9F6">Fundacion Compartir</span> La Asociacion Compartir con los niños y niñas de Honduras, 
            nacio en 1991. Para dar respuesta humana a la problematica de los niños, niñas y jovenes en riesgo social de Honduras, 
            con el fin de contribuir a que los niños mas desprotegidos tengan acceso a sus derechos humanos y a todo lo expresado 
            en la convencion de los derechos del niño/a de la cual Honduras, su pais de intervencion, es suscriptor.</p>
        </div>
    </div>
</div>

<div class="container-fluid py-5" style="background: url('images/fondo.jpg') no-repeat fixed">
    <div class="row">
        <div class="col-12">
            <h2 class="display-4 text-white text-center lead">Antecedentes</h2>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-12 col-md-4 px-4">
            <h3 class="text-white text-center">SERVICIO</h3>
            <p class="text-white text-center lead font-italic">La Asociacion Compartir mantiene su participacion en redes de coordinacion interinstitucional
             con el proposito de consolidar esfuerzos para hacer incidencia en los espacios donde se toman desiciones para combatir los grandes 
             problemas de aquejan la niñez</p>
        </div>
        <div class="col-12 col-md-4 px-4">
            <h3 class="text-white text-center">VISIÓN</h3>
            <p class="text-white text-center lead font-italic">Una Honduras justa y equitativa, en donde todos los niños, niñas y jovenes tengan acceso a 
            aquellos beneficios que la sociedad humana les debe para su desarrollo integral,gozando de derechos en todos los planos del ser humano 
            permaneciendo en el seno de la familia.</p>
        </div>
        <div class="col-12 col-md-4 px-4">
            <h3 class="text-white text-center">MISIÓN</h3>
            <p class="text-white text-center lead font-italic">Al plazo necesario y trabajando intensamente no existan en nuestras ciudades niños y niñas que se 
            vean obliglados por cualquier motivo a vivir en la calle; para ello actuara con firmeza, concientizando a ciudadanos e instituciones publicas y privadas.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row py-5">
        <div class="col-12">
            <h2 class="text-center display-4 lead">Objetivos Institucionales</h2>
            <ul class="pt-3">
                <li><p class="lead font-italic">Procurar para los niños que se encuentran en riesgo psico-social, las oportunidades de acceso a todos aquellos beneficiados 
                que la sociedad humana les debe para su desarrollo integral.</p></li>
                <li><p class="lead font-italic">Promover el respeto a los derechos de los niños sobre todo el de pertenecer y permanecer en el seno de su propia familia 
                y ayudar a que esta construya el marco mas apropiado posible para una vida digna.</p></li>
                <li><p class="lead font-italic">Promover acciones de prevencion que logren diminuir en las familias de riesgo el rompimiento de los lazos entre el niño 
                y su familia, asegurando de esta manera el desarrollo de su propia comunidad.</p></li>
            </ul>
        </div>
    </div>
</div>

<?php require_once "includes/footer.php"; ?>

</body>
</html>