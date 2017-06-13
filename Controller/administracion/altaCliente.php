<?php
session_start();
if ($_SESSION['logueadoAdmin'] == true) {
require_once 'compruebaDB.php';
require_once '../../Model/Cliente.php';
require_once '../../Model/Login.php';

$dni = $_POST[dni];

$clienteAux = new Cliente("", $dni, $_POST[nombre], 
        $_POST[apellido1], $_POST[apellido2]);

$clienteAux->addCliente();


$data['clientes'] = Cliente::getClienteByDniNoPag($dni);

Login::creaUser($_POST['usuario'], $_POST['clave'], $data['clientes'][0]->getCodCliente());

require_once './obtieneListaClientes.php';
}else {
    header("location:../../Controller/administracion/login.php");
}