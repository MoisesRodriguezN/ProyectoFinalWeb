<?php

session_start();
include_once '../../Model/HotelDB.php';


$conexion = HotelDB::connectDB();
$seleccion = "SELECT habIndividual, habDoble FROM texto";
$consulta = $conexion->query($seleccion);
$texto = $consulta->fetchObject();

require_once '../../View/usuario/tiposHabitacionesView.php';