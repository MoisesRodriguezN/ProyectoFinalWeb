<?php
require_once 'compruebaDB.php';
session_start(); // Inicio de sesión

if (!isset($_SESSION['logueadoUser'])) {
    $_SESSION['logueadoUser'] = false;
} //Sesión Usuarios

if ($_SESSION['logueadoUser'] == TRUE) {
    header("location:index.php");
}

    require_once '../../Model/datosHotel.php';
    
    $idImgLogo = "imgCabeceraGenForm";
 
    $logo = datosHotel::getNombreImagen($idImgLogo);
include_once '../../View/usuario/registroView.php';

