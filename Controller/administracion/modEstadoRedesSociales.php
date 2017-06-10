<?php

include_once '../../Model/datosHotel.php';

$redSelect = $_POST['seleccionado'];
$estado = $_POST['estado'];

datosHotel::setEstadoImagen($redSelect, $estado);

include_once '../../Controller/administracion/configuracionHotel.php';
