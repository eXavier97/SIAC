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

<script src="js/registrar-participante.js"></script>

<body>
<?php require_once "includes/nav-admin.php" ?>
<h2 style="text-align: center; color:darkblue; padding:0.5cm; margin-top:70px; margin-bottom:-130px">Registro de Nuevo Participante</h2>
<form id="regForm" action="actions/registrar-participante.php" method="POST">
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
    <input type="number" class="form-control" id="codigoEdu" name="codigoEdu" placeholder="Ingrese el Código del Educador" maxlength="11" onkeypress="return event.charCode >= 48" min="1"/>
  </div>

  <div class="tab">
    <h3>Datos generales del/la Participante</h3>
      <div class="form-row">
        <div class="form-group col-md-4">
          <!--No esta obligatorio por si no tienen foto del participante--> 
          <label for="foto">Foto del participante:</label>
          <input type="file" class="form-control" id="foto" name="foto">
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
          <input type="number" id="CodigoNino" name="CodigoNino" class="form-control" placeholder="Codigo del/la participante" maxlength="11" onkeypress="return event.charCode >= 48" min="1"/>
        </div>

        <div class="form-group col-md-4">
          <label for="IdNino">Identidad:</label>
          <input type="text" name="IdNino" id="IdNino" class="form-control" placeholder="Identidad" pattern="[0-1][0-9][0-3][0-9][1,2][0,9]\d{2}\d{5}" minlength="13" maxlength="13"/>
        </div>

        <div class="form-group col-md-4">
          <label for="NombreNino" >Nombres:</label>
          <input type="text" class="form-control" id="NombreNino" name="NombreNino" placeholder="Nombres del/la participante" onkeypress="return caracterletra(event)" minlength="3" maxlength="40"/>
        </div>

        <div class="form-group col-md-4">
          <label for="ApellidosNino">Apellidos:</label>
          <input type="text" class="form-control" id="ApellidosNino" name="ApellidosNino" placeholder="Apellidos del/la participante" onkeypress="return caracterletra(event)" minlength="3" maxlength="50"/>
        </div>

        <div class="form-group col-md-4">
					<label for="sexo">Sexo</label>
          <select id="sexo" name="sexo" class="form-control">
						<option disabled>Seleccione el sexo:</option>
            <option value="0">Femenino</option>
            <option value="1">Masculino</option>
          </select>
        </div>

        <div class="form-group col-md-4">
					<label for="fechaNac">Fecha de Nacimiento:</label>
          <input type="date" class="form-control" id="fechaNac" name="fechaNac" placeholder="Fecha de nacimiento"/>
        </div>

        <div class="form-group col-md-4">
					<label for="" >Lugar de nacimiento:</label>
					<div >
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
					<div>
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
          <input type="text" class="form-control" id="idMadre" placeholder="Identidad de la Madre" name="IdMadre" pattern="[0-1][0-9][0-3][0-9][1,2][0,9]\d{2}\d{5}" minlength="13" maxlength="13">
        </div>

        <div class="form-group col-md-4">
					<label for="">Nombre de la madre:</label>
         	<input type="text" class="form-control" id="nomMadre" placeholder="Nombre de la Madre" name="NombreMadre" onkeypress="return caracterletra(event)" minlength="4" maxlength="50">
        </div>

        <div class="form-group col-md-4">
					<label for="">Identidad del padre:</label>
          <input type="text" class="form-control" id="idPadre" placeholder="Identidad del padre" name="IdPadre" pattern="[0-1][0-9][0-3][0-9][1,2][0,9]\d{2}\d{5}" minlength="13" maxlength="13">
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
					<select class="form-control" id="abandono" name="abandono" onchange="habilitar(this.value,'abandonoHogar','');">
						<option hidden="">Seleccione una opción</option>
						<option value="mostrar">Si</option>
						<option value="no mostrar">No</option>
					</select>
        </div>

        <div class="form-group col-md-4">
					<label for="">Motivos de riesgo de abandono de hogar:</label>
          <input type="hidden" name="abandono" class="form-control">
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
        <label>Asiste o asistió a primaria:</label>
          <select class="form-control" onchange="des(this.value);">
            <option hidden="">Seleccione una opción</option>
            <option value="mostrar">Si</option>
            <option value="no mostrar">No</option>
          </select>
      </div>

      <div class="form-group col-md-4">
        <label>Asiste o asistió a secundaria:</label>
        <select class="form-control" id="secu">
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
        <select class="form-control" id="Repro" onchange="habilitar(this.value,'GradosRepro','veces','motivosRep');">
          <option hidden="">Seleccione una opción</option>
          <option value="mostrar">Si</option>
          <option value="no mostrar">No</option>
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
        <input type="number" name="veces" id="veces" value="" placeholder="Ingrese el número de veces" class="form-control" minlength="1" maxlength="2" onkeypress="return event.charCode >= 48" min="1"/>
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
        <select class="form-control" id="expul">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Educacion Vocacional</label>
        <select class="form-control" onchange="habilitar(this.value,'nombrecv','Oficio','');">
          <option hidden="">Seleccione una opción</option>
          <option value="mostrar">Si</option>
          <option value="no mostrar">No</option>
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
        <select class="form-control" onchange="habilitar(this.value,'motivosDese')">
          <option hidden="">Seleccione una opción</option>
          <option value="mostrar">Si</option>
          <option value="no mostrar">No</option>
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
        <input type="number" name="numerop" id="numerop" value="" class="form-control" placeholder="Número de personas" minlength="1" maxlength="2" min="0" onkeypress="return event.charCode >= 48" min="1"/>
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
        <input type="number" name="dormitorios" id="dormitorios" value="" class="form-control" placeholder="cantidad de dormitorio" onkeypress="return event.charCode >= 48" min="0" minlength="1" maxlength="2"/>
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
        <select class="form-control" onchange="habilitar(this.value,'tipococ','','');">
          <option hidden="">Seleccione una opción</option>
          <option value="mostrar">Si</option>
          <option value="no mostrar">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Tipo de cocina:</label>
        <input type="hidden" name="tipococina" id="tipococina" class="form-control">
        <select class="form-control" id="tipococ" name="tipococina">
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
        <select class="form-control" onchange="habilitar(this.value,'otrosEspa');">
          <option hidden="">Seleccione una opción</option>
          <option value="mostrar">Si</option>
          <option value="no mostrar">No</option>
        </select>
      </div>

      <div class="form-group col-md-8">
        <label>Describa otros espacios:</label>
        <input type="text" name="otrosEspa" id="otrosEspa" value="" class="form-control" placeholder="Otros Espacios">
      </div>
    </div>
  </div>

  <div class="tab">
    <h3>Relaciones familiares</h3>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Entre padres:</label>
        <input type="hidden" name="entrepadres" id="entrepadres" class="form-control">
        <select class="form-control" id="entrepadres" name="entrepadres">
          <option hidden="">Seleccione la relacion entre padres</option>
          <option value="Muy Buenas">Muy Buenas</option>
          <option value="Buenas">Buenas</option>
          <option value="Regulares">Regulares</option> 
          <option value="En Conflicto">En Conflicto</option> 
          <option value="Ninguna">Ninguna</option>  
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Entre hermanos:</label>
        <input type="hidden" name="entrehermanos" id="entrehermanos" class="form-control">
        <select class="form-control" id="entrehermanos" name="entrehermanos">
          <option hidden="">Seleccione la relacion entre hermanos</option>
          <option value="Muy Buenas">Muy Buenas</option>
          <option value="Buenas">Buenas</option>
          <option value="Regulares">Regulares</option> 
          <option value="En Conflicto">En Conflicto</option> 
          <option value="Ninguna">Ninguna</option>       
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Madre-Hijo/a:</label>
        <input type="hidden" name="madreHijo" id="madreHijo" class="form-control">
        <select class="form-control" id="madreHijo" name="madreHijo">
          <option hidden="">Seleccione la relacion Madre-hijo/a</option>
          <option value="Muy Buenas">Muy Buenas</option>
          <option value="Buenas">Buenas</option>
          <option value="Regulares">Regulares</option> 
          <option value="En Conflicto">En Conflicto</option> 
          <option value="Ninguna">Ninguna</option>       
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Padre-Hijo/a:</label>
        <input type="hidden" name="PadreHijo" id="PadreHijo" class="form-control">
        <select class="form-control" id="PadreHijo" name="PadreHijo">
          <option hidden="">Seleccione la relacion Padre-hijo/a</option>
          <option value="Muy Buenas">Muy Buenas</option>
          <option value="Buenas">Buenas</option>
          <option value="Regulares">Regulares</option> 
          <option value="En Conflicto">En Conflicto</option> 
          <option value="Ninguna">Ninguna</option>       
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Con la familia materna:</label>
        <input type="hidden" name="familiamaterna" id="familiamaterna" class="form-control">
        <select class="form-control" id="familiamaterna" name="familiamaterna">
          <option hidden="">Seleccione la relacion familia materna</option>
          <option value="Muy Buenas">Muy Buenas</option>
          <option value="Buenas">Buenas</option>
          <option value="Regulares">Regulares</option> 
          <option value="En Conflicto">En Conflicto</option> 
          <option value="Ninguna">Ninguna</option>                    
        </select>
      </div>
          
      <div class="form-group col-md-4">
        <label>Con la familia paterna:</label>
        <input type="hidden" name="familiapaterna" id="familiapaterna" class="form-control">
        <select class="form-control" id="familiapaterna" name="familiapaterna">
          <option hidden="">Seleccione la relacion familia paterna</option>
          <option value="Muy Buenas">Muy Buenas</option>
          <option value="Buenas">Buenas</option>
          <option value="Regulares">Regulares</option> 
          <option value="En Conflicto">En Conflicto</option> 
          <option value="Ninguna">Ninguna</option>                     
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Con los vecinos:</label>
        <input type="hidden" name="relavecinos" id="relavecinos" class="form-control">
        <select class="form-control" id="relavecinos" name="relavecinos">
          <option hidden="">Seleccione la relacion con los vecinos</option>
          <option value="Muy Buenas">Muy Buenas</option>
          <option value="Buenas">Buenas</option>
          <option value="Regulares">Regulares</option> 
          <option value="En Conflicto">En Conflicto</option> 
          <option value="Ninguna">Ninguna</option>        
        </select>
      </div>

      <div class="form-group col-md-8">
        <label for="">Observaciones</label>
        <textarea type="textarea" class="form-control" id="Observacionesv" placeholder="Observaciones" name="Observacionesv"></textarea>
      </div>
    </div>
  </div>

  <div class="tab">
    <h3>Estructura familiar</h3>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Nombres:</label>
        <input type="text" name="Nombre" id="Nombre" placeholder="Nombres" class="form-control" onkeypress="return caracterletra(event)" minlength="3"/>
      </div>

      <div class="form-group col-md-4">
        <label>Apellidos:</label>
        <input class="form-control" type="text" name="apellidof" id="apellidof" value="" placeholder="Apellidos"  onkeypress="return caracterletra(event)" minlength="3"/>
      </div>

      <div class="form-group col-md-4">
        <label>Identidad:</label>
        <input type="text" name="id" id="id" value="" class="form-control" placeholder="Numero de Identidad" pattern="[0-1][0-9][1-3][0-9]-?[1,2]{1}[0,9]{1}\d{2}-?\d{4}"/>
      </div>

      <div class="form-group col-md-4">
        <label>Telefono Fijo</label>
        <input type="text" name="TelefonoFi" id="TelefonoFi" value="" placeholder="Telefono Fijo" class="form-control"  onkeypress="return telefono(event)" minlength="8" maxlength="9"/>
      </div>

      <div class="form-group col-md-4">
        <label>Celular:</label>
        <input type="text" name="celularf" id="celularf" value="" placeholder="N° Celular" class="form-control" onkeypress="return telefono(event)" minlength="8" maxlength="9"/>
      </div>

      <div class="form-group col-md-4">
        <label>Correo electrónico: </label>
        <input class="form-control" type="email" id="CorreoF" name="CorreoF" placeholder="Correo electrónico"/>
      </div>

      <div class="form-group col-md-4">
        <label>Facebook:</label>
        <input class="form-control" type="text" id="Facebookf" name="Facebookf" placeholder="Facebook" minlength="4"/>
      </div>

      <div class="form-group col-md-4">
        <label>Parentesco:</label>
        <input type="hidden" class="form-control" id="parentesco" name="Lugar">
        <select class="form-control" id="parentesco" name="parentesco"> 
          <option hidden>Seleccione el Parentesco</option>
          <?php
          $sql = "SELECT IdParentesco, NombreParentesco FROM Parentesco WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>                     
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Fecha de nacimiento:</label>
        <input class="form-control" type="date" name="FechaNacimi" id="FechaNacimi"/>
      </div>

      <div class="form-group col-md-4">
        <label>Lugar de nacimiento:</label>
        <input placeholder="lugar de nacimiento" class="form-control" type="text" name="LugarNacimientof" id="LugarNacimientof" onkeypress="return caracterletra(event)" minlength="4"/>
      </div>

      <div class="form-group col-md-4">
        <label>Estado civil:</label>
        <input type="hidden" class="form-control" id="estadocivil" name="estadocivil">
        <select class="form-control" id="estadocivil" name="estadocivil"> 
          <option hidden>Seleccione el estado civil</option>
          <?php
          $sql = "SELECT IdEstadoCivil, NombreEstadoCivil FROM EstadoCivil WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>       
        </select>
      </div>
      
      <div class="form-group col-md-4">
        <label>Nivel de escolaridad:</label>
        <input type="hidden" class="form-control" id="NivelEscolar" name="NivelEscolar">
        <select class="form-control" id="NivelEscolar" name="NivelEscolar"> 
          <option hidden>Seleccione el nivel de escolaridad</option>
          <?php
          $sql = "SELECT IdNIvelEscolaridad, NombreNivelEscolaridad FROM NivelEscolaridad WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>       
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Ocupación, Profesión u Oficio:</label>
        <input class="form-control" type="hidden" name="ocupacio" id="ocupacio">
        <select class="form-control" id="ocupacion" name="ocupacion">
          <option hidden="">Seleccione el Oficio</option>
          <option value="Sector Construcción">Sector Construcción</option>
          <option value="Sector Servicios">Sector Servicios</option>
          <option value="Sector Industria y manufactura">Sector Industria y manufactura</option> 
          <option value="Comercio Informal">Comercio Informal</option> 
          <option value="Comercio Formal">Comercio Formal</option>
          <option value="Otros">Otros</option>        
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Ingreso económico mensual:</label>
        <input class="form-control" type="hidden" name="ingreso" id="ingreso">
        <select class="form-control" id="ingresom" name="ingresom">
          <option hidden="">Seleccione el Rango de Ingreso</option>
          <option value="Lps. 0000 - 2,000">Lps. 0000 - 2,000</option>
          <option value="Lps. 2,000 - 4,000">Lps. 2,000 - 4,000</option>
          <option value="Lps.4,000 - 6,000">Lps.4,000 - 6,000</option> 
          <option value="Lps. 6,000 - 8,000">Lps. 6,000 - 8,000</option> 
          <option value="Lps. 8,000 – 10,000">Lps. 8,000 – 10,000</option>
          <option value="Lps. 10,000 y más">Lps. 10,000 y más</option>        
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Aporta al presupuesto familiar:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Lugar de trabajo y/o estudio:</label>
        <input class="form-control" placeholder="Lugar de Trabajo" type="text" name="lugarte" id="lugarte" minlength="4"/>
      </div>

      <div class="form-group col-md-4">
        <label>Situación actual de trabajo:</label>
        <input type="hidden" class="form-control" id="Situaciontrabajo" name="Situaciontrabajo">
        <select class="form-control" id="Situaciontrabajo" name="Situaciontrabajo"> 
          <option hidden>Seleccione la situacion del trabajo</option>
          <?php
          $sql = "SELECT IdSituacionTrabajo, NombreSituacionTrabajo FROM SituacionTRabajo WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>                  
        </select>
      </div>

      <div class="form-group col-md-4">
        <label>Vive en casa:</label>
        <select class="form-control">
          <option hidden="">Seleccione una opción</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="form-group col-md-12">
        <label>Observaciones: </label>
        <textarea rows="2" cols="25" class="form-control" placeholder="Observaciones" name="Observacionesf"></textarea>
      </div>

    </div>
  </div>

  <div class="tab">
    <h3>Trabajo Infantil</h3>
    <div class="form-row">
      <!--Esta en la otra página pero me parece que no debe ir-->
      <!--
      <div class="form-group col-md-4">
        <label for="">Código del/la participante </label>
        <input title="Se necesita codigo" type="number" name="idbeneficiario" id="idbeneficiario" class="form-control" placeholder="Codigo del/la participante" onkeypress="return event.charCode >= 48" min="1" maxlength="6"/>
      </div>
      -->

      <div class="form-group col-md-4">
        <label for="">Lugar de trabajo:</label>
        <input type="hidden" name="lugartrabajo" id="lugartrabajo" class="form-control">
        <select class="form-control" id="lugartrabajo" name="lugartrabajo">
          <option hidden="">Seleccione el lugar de trabajo</option>
          <?php
          $sql = "SELECT IdLugarTrabajo, LugarTrabajo FROM LugarTrabajo WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>               
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">Tipo de trabajo:</label>
        <input type="hidden" name="tipotrabajo" id="tipotrabajo" class="form-control">
        <select class="form-control" id="tipotrabajo" name="tipotrabajo">
          <option hidden="">Seleccione el tipo de trabajo</option>
          <?php
          $sql = "SELECT IdTipoTrabajo, TipoTrabajo FROM TipoTrabajo WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>              
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">Horas de trabajo:</label>
        <input class="form-control" type="number"  name="horas" id="horas" placeholder="horas de trabajo" onkeypress="return event.charCode >= 48" min="0"/>
      </div>

      <div class="form-group col-md-4">
        <label for=""> Frecuencia de pago:</label>
        <input type="hidden" name="frecuenciapago" id="frecuenciapago" class="form-control">
        <select class="form-control" id="frecuenciapago" name="frecuenciapago">
          <option hidden="">Seleccione la frecuencia de pago</option>
          <?php
          $sql = "SELECT IdFrecuenciaPagoTrabajo, FrecuenciaPagoTrabajo FROM FrecuenciaPagoTrabajo WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>       
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for=""> Forma de pago:</label>
        <input type="hidden" name="formapago" id="formapago" class="form-control">
        <select class="form-control" id="formapago" name="formapago">
          <option hidden="">Seleccione la Forma de pago</option>
          <?php
          $sql = "SELECT IdFormaPago, FormaPago FROM FormaPago WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">En que gasta el dinero:</label>
        <input type="hidden" name="gastadineroen" id="gastadineroen" class="form-control">
        <select class="form-control" id="gastadineroen" name="gastadineroen">
          <option hidden="">Seleccione en que gasta el dinero</option>
          <?php
          $sql = "SELECT IdGastaDineroEn, GastaDineroEn FROM GastaDineroEn WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>              
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">Condición de trabajo:</label>
        <input type="hidden" name="condiciontrabajo" id="condiciontrabajo" class="form-control">
        <select class="form-control" id="condiciontrabajo" name="condiciontrabajo">
          <option hidden="">Seleccione la condición del trabajo</option>
          <?php
          $sql = "SELECT IdCondicionTrabajo, CondicionTrabajo FROM CondicionTrabajo WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>             
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">Con quien realiza el trabajo:</label>
        <select class="form-control" name="realizaT"  id="realizaT" onchange="habilitar(this.value,'NombreQ');">
          <option hidden="">Seleccione una opción</option>
          <option value="no mostrar">Solo</option>
          <option value="mostrar">Acompañado</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">Con quien:</label>
        <input type="text" class="form-control" name="NombreQ"  id="NombreQ" placeholder="Con quien realiza el trabajo" onkeypress="return caracterletra(event)" minlength="3" >
      </div>

      <div class="form-group col-md-4">
        <label for="">Trabajo infantil:</label>
        <input type="hidden" name="trabajoinfantil" id="trabajoinfantil" class="form-control">
        <select class="form-control" id="trabajoinfantil" name="trabajoinfantil">
          <option hidden="">Seleccione el tipo de trabajo infantil</option>
          <?php
          $sql = "SELECT IdTipoTrabajoInfantil, TipoTrabajoInfantil FROM TipoTrabajoInfantil WHERE 1 = 1";
          $resultado = $pdo -> query($sql);
          while ($row = $resultado-> fetch()) {
          ?>
          <option value="<?php echo $row [0]?>"><?php echo $row[1]?></option>
          <?php
          }?>               
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="">En que trabaja</label>
        <input type="text" class="form-control" id="trabajaEn" placeholder="En que trabaja" name="trabajaEn" onkeypress="return caracterletra(event)" minlength="4"/>
      </div>

      <div class="form-group col-md-4">
        <label for="">Observaciones</label>
        <textarea type="textarea" class="form-control" id="ObservacionesTI" placeholder="Observaciones" name="ObservacionesTI"></textarea>
      </div>
    </div>
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
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>


<script src="js/form.js"></script>


</body>
</html>