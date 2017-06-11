<?php
require_once 'compruebaDB.php';
session_start();

include_once '../../Model/Login.php';

$usuario = $_SESSION[nombreUser];

$data['datos'] = Login::getDatosUsuario($usuario);

$numFilas = count($data);

include_once '../../View/usuario/datosMiCuentaView.php';


