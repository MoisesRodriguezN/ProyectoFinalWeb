<?php
include_once '../../Model/datosHotel.php';

$url = $_POST['url'];

$idImagen = $_POST['id'];

datosHotel::setUrlSocial($idImagen, $url);