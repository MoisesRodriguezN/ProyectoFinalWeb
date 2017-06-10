<?php

include_once '../../Model/datosHotel.php';

$nombreHotel = $_POST['nombre'];

datosHotel::setNombreDelHotel($nombreHotel);

echo "<div id='nuevoNombre'>".$nombreHotel."</div>";