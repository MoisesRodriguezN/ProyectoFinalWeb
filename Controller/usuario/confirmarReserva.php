<?php
require_once 'compruebaDB.php';
session_start(); // Inicio de sesión

include_once '../../Model/Login.php';

$codHabitacion = $_GET['codHabitacion'];
$fechaEntrada = $_GET['fechaEntrada'];
$fechaSalida = $_GET['fechaSalida'];

if ($_SESSION['logueadoUser'] == TRUE) {
    $usuario = $_SESSION[nombreUser];
    $data['datos'] = Login::getDatosUsuario($usuario);

    require_once '../../Model/datosHotel.php';
    
    $idImgLogo = "imgCabeceraGenForm";
 
    $logo = datosHotel::getNombreImagen($idImgLogo);
    include_once '../../View/usuario/confirmarReservaView.php';
}else{
    header("location:login.php?codHabitacion=$codHabitacion&fechaEntrada=$fechaEntrada&fechaSalida=$fechaSalida");
    $_SESSION['reservar'] = TRUE;
}
