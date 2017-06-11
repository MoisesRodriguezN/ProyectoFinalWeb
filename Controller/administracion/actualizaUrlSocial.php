<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
include_once '../../Model/datosHotel.php';

$url = $_POST['url'];

$idImagen = $_POST['id'];

datosHotel::setUrlSocial($idImagen, $url);
}else {
    header("location:../../Controller/administracion/login.php");
}