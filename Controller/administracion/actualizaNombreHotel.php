<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
include_once '../../Model/datosHotel.php';

$nombreHotel = $_POST['nombre'];

datosHotel::setNombreDelHotel($nombreHotel);

echo "<div id='nuevoNombre'>".$nombreHotel."</div>";
}else {
    header("location:../../Controller/administracion/login.php");
}