<?php

require_once '../../Model/Reserva.php';

$reservaAux = new Reserva($_POST[codHabitacion], $_POST[codCliente], $_POST[fechaEntrada], $_POST[fechaSalida], "", "", "", "");

$reservaAux->modReserva($_POST[fechaEntradaHidden]);

require_once '../../Controller/administracion/obtieneListaReservas.php';
