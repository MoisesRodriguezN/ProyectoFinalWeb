<?php

include_once '../../Model/Reserva.php';

$reservaAux = new Reserva($_POST[codHabitacion], $_POST[codCliente], 
        $_POST[fechaEntrada], $_POST[fechaSalida], "", "", "", "");

$reservaAux->reservar();
