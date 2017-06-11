<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
include_once '../../Model/Login.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

Login::cambiaClaveAdmin($usuario, $clave);


session_destroy();
}else {
    header("location:../../Controller/administracion/login.php");
}