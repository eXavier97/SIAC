<?php

function flashMessage() {
    if(isset($_SESSION['failure'])) {
        echo '<div class="alert alert-danger">'.$_SESSION['failure'].'</div>';
        unset($_SESSION['failure']);
    }
}

function validarAdmin() {
    if( !isset($_SESSION['user_id'])) {
        header('Location: http://localhost/siac/login.php');
        exit;
    } else if( $_SESSION['admin'] == 0) {
        header('Location: educador.php');
        exit;
    }
}