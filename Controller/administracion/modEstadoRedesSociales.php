<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
include_once '../../Model/datosHotel.php';

$redSelect = $_POST['seleccionado'];
$estado = $_POST['estado'];

datosHotel::setEstadoImagen($redSelect, $estado);

include_once '../../Controller/administracion/configuracionHotel.php';
}else {
    header("location:../../Controller/administracion/login.php");
}