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
  <title>Registar Participante</title>
  <?php require_once "includes/header.php" ?>
  <link rel="stylesheet" href="styles/admin.css">
  <link rel="stylesheet" href="styles/form.css">
</head>

<body>
<?php require_once "includes/nav-admin.php" ?>
<form id="regForm" action="">
  <ul class="nav flex-column flex-md-row">
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
  <h1>Registrar:</h1>

  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <p><input placeholder="First name..." oninput="this.className = ''" required></p>
    <p><input placeholder="Last name..." oninput="this.className = ''" required></p>
  </div>

  <div class="tab">
    <p><input type="email" placeholder="E-mail..." oninput="this.className = ''"></p>
    <p><input placeholder="Phone..." oninput="this.className = ''"></p>
  </div>

  <div class="tab">
    <p><input placeholder="dd" oninput="this.className = ''"></p>
    <p><input placeholder="mm" oninput="this.className = ''"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''"></p>
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

  <div class="tab">
    <p><input placeholder="Username..." oninput="this.className = ''"></p>
    <p><input placeholder="Password..." oninput="this.className = ''"></p>
  </div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
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
<script>
g = document.getElementsByClassName("custom");
console.log(g);
</script>

</body>
</html>