<?php
session_start(); // Inicio de sesión

include_once '../../Model/Habitacion.php';

$fechaEntrada = $_GET['fechaEntrada'];
$fechaSalida = $_GET['fechaSalida'];
$personas = $_GET['personas'];

$fechaEntradaEsp = "STR_TO_DATE('$fechaEntrada', '%d-%m-%Y')";
$fechaSalidaEsp = "STR_TO_DATE('$fechaSalida', '%d-%m-%Y')";

$data['habitaciones'] = Habitacion::getHabitacionesDisp($fechaEntradaEsp, $fechaSalidaEsp, $personas);

$totalHabsDisp = count($data['habitaciones']);

include_once '../../View/usuario/habitacionesView.php';