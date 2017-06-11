<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
include_once '../../Model/Reserva.php';

$reservaAux = new Reserva($_POST[codHabitacion], $_POST[codCliente], 
        $_POST[fechaEntrada], $_POST[fechaSalida], "", "", "", "");

$reservaAux->reservar();

}else {
    header("location:../../Controller/administracion/login.php");
}