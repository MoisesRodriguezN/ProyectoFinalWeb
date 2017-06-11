<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
require_once '../../Model/Cliente.php';

$clienteAux = new Cliente("", $_POST[dni], $_POST[nombre], 
        $_POST[apellido1], $_POST[apellido2]);

$clienteAux->addCliente();

require_once './obtieneListaClientes.php';
}else {
    header("location:../../Controller/administracion/login.php");
}