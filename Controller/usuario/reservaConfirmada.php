<?php
require_once 'compruebaDB.php';
session_start(); // Inicio de sesión
include_once '../../Model/Reserva.php';
if ($_SESSION['logueadoUser'] == true) {

    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaSalida = $_POST['fechaSalida'];
    $fechaEntradaEsp = "STR_TO_DATE('$fechaEntrada', '%d-%m-%Y')";
    $fechaSalidaEsp = "STR_TO_DATE('$fechaSalida', '%d-%m-%Y')";
    $reservaAux = new Reserva($_POST[codHabitacion], $_POST[codCliente], $fechaEntradaEsp, $fechaSalidaEsp, "", "", "", "");
    $reservaAux->reservarUsuario();
    header("location:../../Controller/usuario/index.php");
} else {
    header("location:../../Controller/usuario/login.php");
}

