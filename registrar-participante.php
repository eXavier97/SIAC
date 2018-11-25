<?php
session_start();
require_once "includes/pdo.php";
require_once "includes/util.php";
validarAdmin();

$query = "SELECT IdDpto, NombreDpto FROM departamento";
$resultadodepto=$pdo->query($query);

$query = "SELECT IdBarrio, NombreBarrio FROM barrio";
$resultadobarrio=$pdo->query($query);

$sql = "SELECT IdPadrinazgo, NombrePadrinazgo FROM padrinazgo";
$resultadopadrinazgo = $pdo-> query($sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registar Participante</title>
  <?php require_once "includes/header.php" ?>
  <link rel="stylesheet" href="styles/admin.css">
  <link rel="stylesheet" href="styles/form.css">
</head>

<style>
  h3 {
    text-align: center; 
    margin-top:40px;
    margin-bottom:40px;
  }
</style>


<script>
	$(document).ready(function(){
		$("#lugar").change(function () {
			$("#lugar option:selected").each(function () {
        IdDpto = $(this).val();
				$.post("routes/getMunicipio.php", { IdDpto: IdDpto }, function(data){
          $("#muni").html(data);
				}, "html");            
			});
		})
  });
  
  $(document).ready(function(){
		$("#bar").change(function () {
			$("#bar option:selected").each(function () {
        IdBarrio = $(this).val();
				$.post("routes/getSector.php", { IdBarrio: IdBarrio }, function(data){
          $("#sec").html(data);
          $("#sec").trigger("change");
				}, "html");            
			});
		})
  });
  
  $(document).ready(function(){
		$("#sec").change(function () {
			$("#sec option:selected").each(function () {
        IdSector = $(this).val();
				$.post("routes/getCentroReferencia.php", { IdSector: IdSector }, function(data){
          $("#centroc").html(data);
				}, "html");            
			});
		})
	});


  //Funciones de validacion
  function caracterletra(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmnñopqrstuvwxyz";
    especiales = [];
    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
        tecla_especial = true;
        break;
      } 
    } 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
      return false;
  }

  function telefono(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [45];
    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
        tecla_especial = true;
        break;
      } 
    } 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
      return false;
  }  

</script>


<body>
<?php require_once "includes/nav-admin.php" ?>
<h2 style="text-align: center; color:darkblue; padding:0.5cm; margin-top:70px; margin-bottom:-130px">Registro de Nuevo Participante</h2>
<form id="regForm" action="">
  <ul class="nav flex-column flex-md-row ">
    <li class="nav-item">
      <a class="nav-link custom" href="#">Datos Educador</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Datos Generales</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Educación</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Vivienda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Relaciones Familiares</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Estructura Familiar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link custom" href="#">Trabajo Infantil</a>
    </li>
    
  </ul>

  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <h3>Datos del Educador</h3>
    <input type="number" class="form-control" id="codigoEdu" name="codigoEdu" placeholder="Ingrese el Código del Educador" maxlength="11"/>
  </div>

  <div class="tab">

    <h3>Datos generales del/la Participante</h3>

      <div class="form-row">
        <div class="form-group col-md-4">
          <!--No esta obligatorio por si no tienen foto del participante--> 
          <label for="foto">Foto del participante:</label>
          <input type="file" class="form-control" id="foto">
        </div>

        <div class="form-group col-md-4">
          <label for="tipo">Tipo de Padrinazgo:</label>
          <select class="form-control" id="TipoPadrinazgo" name="TipoPadrinazgo">
						<option hidden="">Seleccione un Tipo</option>
						<?php
						while ($row = $resultadopadrinazgo->fetch()) {
						?>
						<option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
						<?php
						}?>
					</select>
        </div>

        <!--Creo que es autoincrement entonces no sería necesario-->
        <div class="form-group col-md-4">
          <label for="CodigoNino">Código del/la participante:</label>
          <input type="number" id="CodigoNino" class="form-control" placeholder="Codigo del/la participante" maxlength="11"/>
        </div>

        <div class="form-group col-md-4">
          <label for="IdNino">Identidad:</label>
          <input type="text" name="IdNino" id="IdNino" class="form-control" placeholder="Identidad" pattern="[0-1][0-9][1-3][0-9]-?[1,2]{1}[0,9]{1}\d{2}-?\d{4}" minlength="13" maxlength="13"/>
        </div>

        <div class="form-group col-md-4">
          <label for="IdNino" >Nombres:</label>
          <input type="text" class="form-control" id="NombreNino" placeholder="Nombres del/la participante" onkeypress="return caracterletra(event)" minlength="3" maxlength="40"/>
        </div>

        <div class="form-group col-md-4">
          <label for="ApellidosNino">Apellidos:</label>
          <input type="text" class="form-control" id="ApellidosNino" placeholder="Apellidos del/la participante" onkeypress="return caracterletra(event)" minlength="3" maxlength="50"/>
        </div>

        <div class="form-group col-md-4">
					<label for="genero">Género</label>
          <select id="genero" class="form-control">
						<option hidden="">Seleccione el género:</option>
            <option>Femenino</option>
            <option>Masculino</option>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="fechaNac">Fecha de Nacimiento:</label>
          <input type="date" class="form-control" id="fechaNac" placeholder="Fecha de nacimiento"/>
        </div>

        <div class="form-group col-md-4">
					<label for="" >Lugar de nacimiento:</label>
					<div >
						<input type="hidden" name="LugarNacimiento" id="LugarNacimiento" class="form-control">
						<select class="form-control" id="lugar" name="lugar">
							<option hidden="">Seleccione el Lugar de Nacimiento</option>
							<?php while($row = $resultadodepto->fetch()) { ?>
							<option value="<?php echo $row['IdDpto']; ?>"><?php echo $row['NombreDpto']; ?></option>
							<?php } ?>
						</select>
					</div> 
				</div>
				<div class="form-group col-md-4">
					<label for="Municipio" >Municipio:</label>
					<div >
						<input type="hidden" class="form-control" id="Municipio" name="Municipio">
						<select class="form-control" id="muni" name="muni">
							<option hidden>Seleccione el Municipio </option>
						</select>
					</div>
        </div>

        <div class="form-group col-md-4">
					<label for="">Direccion de domicilio:</label>
          <input type="text" class="form-control" id="DireccionDom" name="DireccionDom" placeholder="Direccion domicilio" minlength="4" maxlength="100"/>
        </div>

        <div class="form-group col-md-4">
					<label for="Barrio" >Barrio:</label>
          <input type="hidden" class="form-control" id="Barrio" placeholder="Barrio" name="Barrio">
          <select class="form-control" id="bar" name="bar"> 
            <option hidden>Seleccione el Barrio </option>
            <?php while($row = $resultadobarrio->fetch()) { ?>
          	<option value="<?php echo $row['IdBarrio']; ?>"><?php echo $row['NombreBarrio']; ?></option>
            <?php } ?>
          </select>
        </div>
				<!--Es dinámico con respecto al barrio pero no esta hecha la conexion-->
        <div class="form-group col-md-4">
					<label for="" >Sector de domicilio:</label>
					<input type="hidden" class="form-control" id="Sector" placeholder="Sector" name="Sector">
					<select class="form-control" id="sec" name="sec"> 
						<option hidden>Seleccione el Sector</option>
					</select>
        </div>
				<!--Es dinámico respecto a los dos anteriores pero no esta hecha la conexion-->
        <div class="form-group col-md-4">
				<label for="">Centro Comunitario de referencia:</label>
        <input type="hidden" name="CentroReferencia" id="CentroReferencia" class="form-control">
          <select class="form-control" id="centroc" name="centroc">
            <option hidden="">Seleccione el Centro de Referencia</option>
          </select>
        </div>

        <div class="form-group col-md-4">
				<label for="">Facebook:</label>
					<input type="text" class="form-control" id="Facebook" placeholder="Facebook" name="Facebook" minlength="4" maxlength="50">
        </div>

        <div class="form-group col-md-4">
					<label for="">Correo:</label>
					<input type="email" class="form-control" id="correonino" placeholder="Correo electrónico" name="correonino" maxlength="45">
        </div>

        <div class="form-group col-md-4">
					<label for="">Telefono Fijo:</label>
					<input type="text" class="form-control" id="telefononino" placeholder="Telefono" name="telefononino"  onkeypress="return telefono(event)" minlength="8" maxlength="8">
        </div>

        <div class="form-group col-md-4">
					<label for="">Celular:</label>
				  <input type="text" class="form-control" id="Celularnino" placeholder="Celular" name="Celularnino" onkeypress="return telefono(event)" minlength="8" maxlength="8">
        </div>

        <div class="form-group col-md-4">
					<label for="">Fecha ingreso:</label>
         	<input type="date" class="form-control" id="fechaIng" placeholder="fecha de Ingreso" name="fechaIng"/>
        </div>

        <div class="form-group col-md-4">
					<label for="">Responsable del/la participante:</label>
          <input type="text" class="form-control" id="Responsable" placeholder="Responsable del Niño/a" name="ResponsableNino" onkeypress="return caracterletra(event)" minlength="4" maxlength="50">
        </div>

        <div class="form-group col-md-4">
					<label for="">Identidad de la madre:</label>
          <input type="text" class="form-control" id="idMadre" placeholder="Identidad de la Madre" name="IdMadre" pattern="[0-1][0-9][1-3][0-9]-?[1,2]{1}[0,9]{1}\d{2}-?\d{4}" minlength="13" maxlength="13">
        </div>

        <div class="form-group col-md-4">
					<label for="">Nombre de la madre:</label>
         	<input type="text" class="form-control" id="nomMadre" placeholder="Nombre de la Madre" name="NombreMadre" onkeypress="return caracterletra(event)" minlength="4" maxlength="50">
        </div>

        <div class="form-group col-md-4">
					<label for="">Identidad del padre:</label>
          <input type="text" class="form-control" id="idPadre" placeholder="Identidad del padre" name="IdPadre" pattern="[0-1][0-9][1-3][0-9]-?[1,2]{1}[0,9]{1}\d{2}-?\d{4}" minlength="13" maxlength="13">
        </div>

        <div class="form-group col-md-4">
					<label for="">Nombre del padre:</label>
          <input type="text" class="form-control" id="nomPadre" placeholder="Nombre del padre" name="NombrePadre" onkeypress="return caracterletra(event)" minlength="4" maxlength="50">
        </div>

        <div class="form-group col-md-4">
					<label for="">Con quien Vive:</label>
          <input type="hidden" name="vivecon" id="vivecon" class="form-control">
					<select class="form-control" id="vivecon" name="vivecon">
						<option hidden="">Seleccione con quien vive</option>
						<?php
						$sql = "SELECT IdViveCon, ViveCon FROM ViveCon WHERE 1 = 1";
						$resultado = $pdo -> query($sql);
						while ($row = $resultado-> fetch()) {
						?>
						<option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
						<?php
						}?>
					</select>
        </div>

        <div class="form-group col-md-4">
					<label for="">Reconocido por:</label>
          <input type="hidden" name="reconocido" id="reconocido" class="form-control">
          <select class="form-control" id="reconocido" name="reconocido">
            <option hidden="">Seleccione una opción</option>
            <?php
						$sql = "SELECT IdREconocidoPor, ReconocidoPor FROM ReconocidoPor WHERE 1 = 1";
						$resultado = $pdo -> query($sql);
						while ($row = $resultado-> fetch()) {
						?>
						<option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
						<?php
						}?>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="">Riesgo de abandonar el hogar:</label>
					<select class="form-control" id="abandono" name="abandono">
						<option hidden="">Seleccione una opción</option>
						<option value="Si">Si</option>
						<option value="No">No</option>
					</select>
        </div>

        <div class="form-group col-md-4">
					<label for="">Motivos de riesgo de abandono de hogar:</label>
          <input type="hidden" name="abandono" id="abandono" class="form-control">
          <select class="form-control" id="abandonoHogar" name="abandonoHogar">
            <option hidden="">Seleccione el motivo</option>
						<?php
						$sql = "SELECT IdMotivosRiesgoAbandonoH, MotivosRiesgoAbandonoH FROM MotivosRiesgoAbandonoH";
						$resultado = $pdo -> query($sql);
						while ($row = $resultado-> fetch()) {
						?>
						<option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
						<?php
						}?> 
          </select>
        </div>
      </div>
  </div>

  <div class="tab">
    <h3>Educacion del/la participante</h3>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label >Asiste o asistió a primaria:</label>
          <select class="form-control">
            <option hidden="">Seleccione una opción</option>
            <option>Si</option>
            <option>No</option>
          </select>
      </div>

      <div class="form-group col-md-4">
        <label>Asiste o asistió a secundaria:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label >Último grado aprobado:</label>
        <input type="hidden" name="Grado" id="Grado" class="form-control">
        <select class="form-control" id="uGrado" name="uGrado">
          <option hidden="">Seleccione el Grado/Curso</option>
          <?php
            $sql = "SELECT IdGradoCurso, IdSeleccionGradoCurso, NombreCurso FROM gradocurso WHERE 1 = 1";
            $resultado = $pdo-> query($sql);
            while ($row = $resultado-> fetch()) {
            ?>
            <option value="<?php echo $row [2]?>"><?php echo $row[2]?></option>
            <?php
            }?>  
        </select>
      </div>
    
      <div class="form-group col-md-4">
        <label >Año lectivo aprobado:</label>
        <input type="hidden" name="centroEdu" id="centroEdu" class="form-control">
        <?php
        $cont = date('Y');
        ?>
        <select class="form-control" id="sel1">
        <option hidden="">Seleccione un año</option>
        <?php while ($cont >= 1990) { ?>
          <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
        <?php $cont = ($cont-1); } ?>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label > Centro Educativo: </label>
        <input type="hidden" name="centroEdu" id="centroEdu" class="form-control">
        <select class="form-control" id="centroEduc" name="centroEduc">
          <option hidden="">Seleccione el Centro Educativo</option>
          <?php
          $sql = "SELECT IdCentroEducativo, CentroEducativo, CodigoCenEdu FROM CentroEducativo WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?> <?php echo $row[2] ?></option>
          <?php
          }?>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label > Ha reprobado:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label >Grados reprobados:</label>
        <input type="hidden" name="GradoRep" id="GradoRep" class="form-control">
        <select class="form-control" id="GradosRepro" name="GradosRepro">
          <option hidden="">Seleccione el Grado/Curso</option>
          <?php
          $sql = "SELECT IdGradoCurso, IdSeleccionGradoCurso, NombreCurso FROM gradocurso WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [2]?>"><?php echo $row[2]?></option>
          <?php
          }?>  
        </select>
      </div>

      <div class="form-group col-md-4">
        <label >Cuantas veces:</label>
        <input type="number" name="veces" id="veces" value="" placeholder="Ingrese el número de veces" class="form-control" minlength="1" maxlength="2" pattern="^[0-9]+"/>
      </div>

      <div class="form-group col-md-4">
        <label >Motivos de reprobación:</label>
        <input type="hidden" name="motivosRe" id="motivosRe" class="form-control">
          <select class="form-control" id="motivosRep" name="motivosRep">
            <option hidden="">Seleccione el Motivo</option>
            <option value="Cambio de domicilio">Cambio de domicilio</option>
            <option value="Migración por violencia">Migración por violencia</option>
            <option value="Falta de recursos económicos">Falta de recursos económicos</option> 
            <option value="No quiere seguir estudiando">No quiere seguir estudiando</option> 
            <option value="Conflictos familiares">Conflictos familiares</option>
            <option value="Problemas de salud">Problemas de salud</option> 
            <option value="Embarazo adolescente">Embarazo adolescente</option> 
            <option value="Trabajo infantil">Trabajo infantil</option> 
            <option value="Otros">Otros</option>        
          </select>
      </div>

      <div class="form-group col-md-4">
        <label>Ha sido expulsado:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Educacion Vocacional</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>
      <!--solo se tiene que mostrar si el anterior es Si-->
      <div class="form-group col-md-4">
        <label >Nombre centro vocacional:</label>
        <select class="form-control" id="nombrecv" name="nombrecv">
          <option hidden="">Seleccione el Centro Vocacional</option>
          <option value="INFOP">INFOP</option>
          <option value="Otros">Otros</option>        
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Oficio Vocacional:</label>
        <input type="hidden" name="Ofici" id="Ofici"class="form-control">
        <select class="form-control" id="Oficio" name="Oficio">
          <option hidden="">Seleccione el Oficio Vocacional</option>
          <option value="Electricidad">Electricidad</option>
          <option value="Informatica">Informatica</option>
          <option value="Mecanica">Mecanica</option> 
          <option value="Comercio Informal">Comercio Informal</option> 
          <option value="Comercio Formal">Comercio Formal</option>
          <option value="Carpinteria">Carpinteria</option>
          <option value="Idiommas">Idiomas</option>
          <option value="Otros">Otros</option>        
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Desertó:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Motivos de Deserción:</label>
        <select class="form-control" id="motivosDese" name="motivosDese">
          <option hidden="">Seleccione el Motivo</option>
          <option value="Cambio de domicilio">Cambio de domicilio</option>
          <option value="Migración por violencia">Migración por violencia</option>
          <option value="Falta de recursos económicos">Falta de recursos económicos</option> 
          <option value="No quiere seguir estudiando">No quiere seguir estudiando</option> 
          <option value="Conflictos familiares">Conflictos familiares</option>
          <option value="Problemas de salud">Problemas de salud</option> 
          <option value="Embarazo adolescente">Embarazo adolescente</option> 
          <option value="Trabajo infantil">Trabajo infantil</option> 
          <option value="Otros">Otros</option>        
        </select>
      </div>

      <div class="form-group col-md-12">
      <label for="Observaciones">Observaciones</label>
      <textarea type="text" class="form-control" id="Observaciones" name="Observaciones" placeholder="Observaciones"></textarea>
      </div>
    </div>
  </div>

  <div class="tab">
    <h3>Vivienda</h3>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Número de personas:</label>
        <input type="number" name="numerop" id="numerop" value="" class="form-control" placeholder="Número de personas" minlength="1" maxlength="2"/>
      </div>

      <div class="form-group col-md-4">
        <label>Estatus vivienda:</label>
        <input type="hidden" name="estatusvivienda" id="estatusvivienda" class="form-control">
        <select class="form-control" id="estatusvivienda" name="estatusvivienda">
          <option hidden="">Seleccione el estatus de la vivienda</option>
          <?php
          $sql = "SELECT IdEstadoVivienda, NombreEstadoVivienda FROM EstadoVivienda WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Situación legal del terreno:</label>
        <input type="hidden" name="situacionterreno" id="situacionterreno" class="form-control">
        <select class="form-control" id="situacionterreno" name="situacionterreno">
          <option hidden="">Seleccione la situacion legal del terreno</option>
          <?php
          $sql = "SELECT IdSituacionLegal, NombreSituacionLegal FROM SituacionLegalVivienda WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>
      
      <div class="form-group col-md-4">
        <label>Condiciones de vivienda:</label>
        <input type="hidden" name="condicionvivienda" id="condicionvivienda" class="form-control">
        <select class="form-control" id="condicionvivienda" name="condicionvivienda">
          <option hidden="">Seleccione la condicion de la vivienda</option>
          <?php
          $sql = "SELECT IdCondicionVivienda, CondicionVivienda FROM CondicionVivienda WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Material paredes:</label>
        <input type="hidden" name="materialesparedes" id="materialesparedes" class="form-control">
        <select class="form-control" id="materialesparedes" name="materialesparedes">
          <option hidden="">Seleccione el material de las paredes</option>
          <?php
          $sql = "SELECT IdMaterialParedes, NombreMaterialParedes FROM MaterialParedes WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Material techo:</label>
        <input type="hidden" name="materialtecho" id="materialtecho" class="form-control">
        <select class="form-control" id="materialtecho" name="materialtecho">
          <option hidden="">Seleccione el material techo</option>
          <?php
          $sql = "SELECT IdMaterialTecho, MaterialTecho FROM MaterialTecho WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Material piso:</label>
        <input type="hidden" name="materialpiso" id="materialpiso" class="form-control">
        <select class="form-control" id="materialpiso" name="materialpiso">
        <option hidden="">Seleccione el material del piso</option>
          <?php
          $sql = "SELECT IdMaterialPiso, MaterialPisoVivienda FROM MaterialPisoVivienda WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Forma de obtención del agua:</label>
        <input type="hidden" name="obtencionagua" id="obtencionagua" class="form-control">
        <select class="form-control" id="obtencionagua" name="obtencionagua">
          <option hidden="">Seleccione la forma de obtencion del agua</option>
          <?php
          $sql = "SELECT IdObtencionAgua, ObtencionAgua FROM ObtencionAgua WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Posee electricidad:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Dispositivo para desechos sólidos:</label>
        <input type="hidden" name="dispoDesecho" id="dispoDesecho" class="form-control">
        <select class="form-control" id="dispoDesecho" name="dispoDesecho">
          <option hidden="">Seleccione un Tipo</option>
          <?php
          $sql = "SELECT IdDesechosSolidos, DesechosSolidos FROM DesechosSolidosVivienda WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>   
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Cantidad de dormitorios:</label>
        <input type="number" name="dormitorios" id="dormitorios" value="" class="form-control" placeholder="cantidad de dormitorio" minlength="1" maxlength="2"/>
      </div>

      <div class="form-group col-md-4">
        <label>Posee Sala:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Posee Cocina:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Tipo de cocina:</label>
        <input type="hidden" name="tipococina" id="tipococina" class="form-control">
        <select class="form-control" id="tipococina" name="tipococina">
          <option hidden="">Seleccione el tipo de cocina</option>
          <?php
          $sql = "SELECT IdTipoCocina, TipoCocina FROM TipoCocina WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>                
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Posee Comedor:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Otros espacios:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-8">
        <label>Describa otros espacios:</label>
        <input type="text" name="otrosEspa" id="otrosEspa" value="" class="form-control" placeholder="Otros Espacios">
      </div>

      <div class="form-group col-md-4">
      </div>
    </div>
  </div>

  <div class="tab">
    <p><input placeholder="Username..." oninput="this.className = ''"></p>
    <p><input placeholder="Password..." oninput="this.className = ''"></p>
  </div>

  <div class="tab">
    <p><input placeholder="Username..." oninput="this.className = ''"></p>
    <p><input placeholder="Password..." oninput="this.className = ''"></p>
  </div>

  <div class="tab">
    <p><input placeholder="Username..." oninput="this.className = ''"></p>
    <p><input placeholder="Password..." oninput="this.className = ''"></p>
  </div>

  <div class="row py-5">
    <div class="col-12">
      <div class="btn-group float-right" role="group" aria-label="Basic example">
          <button class="btn btn-warning btn btn-secondary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button class="btn btn-success btn btn-secondary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
  </div>



  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>


<script src="js/form.js"></script>


</body>
</html>