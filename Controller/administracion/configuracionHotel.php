<?php

include_once '../../Model/datosHotel.php';

$nombreHotel = datosHotel::getNombreDelHotel();

include_once '../../View/administracion/configuracionHotelView.php';
