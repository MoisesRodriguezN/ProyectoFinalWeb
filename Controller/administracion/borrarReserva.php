<?php

require_once '../../Model/Reserva.php';

$fecha = "fechaEntrada= '$_POST[fechaEntrada]'";

Reserva::deleteReserva($_POST['codHabitacion'], $_POST['codCliente'], $fecha);

require_once './obtieneListaReservas.php';