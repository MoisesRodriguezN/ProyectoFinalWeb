<?php
require_once 'compruebaDB.php';
session_start(); // Inicio de sesión

include_once '../../Model/Habitacion.php';

$fechaEntrada = $_GET['fechaEntrada'];
$fechaSalida = $_GET['fechaSalida'];
$personas = $_GET['personas'];

$fechaEntradaEsp = "STR_TO_DATE('$fechaEntrada', '%d-%m-%Y')";
$fechaSalidaEsp = "STR_TO_DATE('$fechaSalida', '%d-%m-%Y')";

$data['habitaciones'] = Habitacion::getHabitacionesDisp($fechaEntradaEsp, $fechaSalidaEsp, $personas);

$totalHabsDisp = count($data['habitaciones']);

require_once '../../Model/datosHotel.php';
    $idImgLogo = "logoHotel";
    $logo = datosHotel::getNombreImagen($idImgLogo);
    $nombreHotel = datosHotel::getNombreDelHotel(); 
    $idImagenSocial = array("facebook", "googlePlus", "instagram", "twitter");

    $estadoImg = array(
        'facebook' => datosHotel::getEstadoImagen($idImagenSocial[0]),
        'googlePlus' => datosHotel::getEstadoImagen($idImagenSocial[1]),
        'instagram' => datosHotel::getEstadoImagen($idImagenSocial[2]),
        'twitter' => datosHotel::getEstadoImagen($idImagenSocial[3]), 
    );
    
    $idImagen2 = array("facebook", "googlePlus", "instagram", "twitter");
    
    $urlSociales = array(
        'facebook' => datosHotel::getUrlSocial($idImagen2[0]),
        'googlePlus' => datosHotel::getUrlSocial($idImagen2[1]),
        'instagram' => datosHotel::getUrlSocial($idImagen2[2]),
        'twitter' => datosHotel::getUrlSocial($idImagen2[3]),  
    );

include_once '../../View/usuario/habitacionesView.php';