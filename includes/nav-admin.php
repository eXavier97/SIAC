<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a href="admin.php" class="navbar-brand">
        <img src="images/logoOficial.jpeg" style="width: 70px; height: 70px; border-radius: 20%" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registrar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="registrar-participante.php">Nuevo Participante</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Padrinazgo
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="correspondencia.php">Correspondencia</a>
                <a class="dropdown-item" href="donacionesColect.php">Donaciones colectivas</a>
                <a class="dropdown-item" href="fichasIngreso.php">Fichas de ingreso</a>
                <a class="dropdown-item" href="padrinazgoLocal.php">Padrinazgo Local</a>


            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="navbar-item active">
                <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Salir</a>
            </li>
        </ul>
    </div>
</nav>