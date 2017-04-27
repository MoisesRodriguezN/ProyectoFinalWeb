<?php

session_start(); // Inicio de sesión

if (!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
} //Sesión Usuarios

if ($_SESSION['logueadoUser'] == TRUE) {
    header("location:index.php");
}

include_once '../../View/usuario/registroView.php';

