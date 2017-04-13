<?php
require_once '../../Model/Habitacion.php';

$codHabitacion= $_POST['codHabitacion'];

Habitacion::deleteHabitacion($codHabitacion);

require_once './obtieneListaHabitaciones.php';