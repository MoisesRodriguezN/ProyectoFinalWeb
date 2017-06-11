<?php
require_once 'compruebaDB.php';
session_start(); // Inicio de sesión

if ($_SESSION['logueadoUser'] == TRUE) {
    header("location:index.php");
}

include_once '../../Model/Login.php';

Login::registrarUsuario($_POST[nombre], $_POST[dni], $_POST[apellido1],
        $_POST[apellido2], $_POST[usuario], $_POST[clave]);

header("location:login.php");
