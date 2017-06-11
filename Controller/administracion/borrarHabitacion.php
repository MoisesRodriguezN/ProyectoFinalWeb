<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
require_once '../../Model/Habitacion.php';

$codHabitacion= $_POST['codHabitacion'];

Habitacion::deleteHabitacion($codHabitacion);

require_once './obtieneListaHabitaciones.php';
}else {
    header("location:../../Controller/administracion/login.php");
}