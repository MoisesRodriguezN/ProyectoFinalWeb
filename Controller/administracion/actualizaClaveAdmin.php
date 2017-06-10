<?php

include_once '../../Model/Login.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

Login::cambiaClaveAdmin($usuario, $clave);

session_start();
session_destroy();