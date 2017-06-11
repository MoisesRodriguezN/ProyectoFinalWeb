<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
include_once '../../Model/datosHotel.php';

$nombreHotel = datosHotel::getNombreDelHotel();

$idImagen = array("facebook", "googlePlus", "instagram", "twitter");

$estadoImg = array(
    'facebook' => datosHotel::getEstadoImagen($idImagen[0]),
    'googlePlus' => datosHotel::getEstadoImagen($idImagen[1]),
    'instagram' => datosHotel::getEstadoImagen($idImagen[2]),
    'twitter' => datosHotel::getEstadoImagen($idImagen[3]), 
);

include_once '../../View/administracion/configuracionHotelView.php';
}else {
    header("location:../../Controller/administracion/login.php");
}