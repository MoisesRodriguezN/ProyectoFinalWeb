<?php

require_once '../../Model/Habitacion.php';

$habitacionAux = new Habitacion($_POST[codHabitacion], $_POST[tipo], $_POST[capacidad], $_POST[planta], $_POST[tarifa]);

$habitacionAux->modHabitacion();

require_once '../../Controller/administracion/obtieneListaHabitaciones.php';
