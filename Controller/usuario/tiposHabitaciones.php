<?php
require_once 'compruebaDB.php';
session_start();
include_once '../../Model/HotelDB.php';


$conexion = HotelDB::connectDB();
$seleccion = "SELECT habIndividual, habDoble FROM texto";
$consulta = $conexion->query($seleccion);
$texto = $consulta->fetchObject();

require_once '../../Model/datosHotel.php';
  
$nombreHotel = datosHotel::getNombreDelHotel();
$idImgLogo = "logoHotel";
$logo = datosHotel::getNombreImagen($idImgLogo);

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
       
    if($_SESSION['logueadoAdmin']){
        $logued = "<div class='elementosOcultos' id='admLog'>true</div>";
    }

require_once '../../View/usuario/tiposHabitacionesView.php';