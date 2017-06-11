<?php
require_once 'compruebaDB.php';
session_start();

include_once '../../Model/Cliente.php';

if ($_SESSION['logueadoUser'] == true) {

    $data['codCliente'] = Cliente::getClienteByDniNoPag($_POST[dni2]);

    foreach ($data['codCliente'] as $user) {

        $clienteAux = new Cliente($user->getCodCliente(), $_POST[DNI],
                $_POST[nombre], $_POST[apellido1], $_POST[apellido2]);

        $clienteAux->modCliente();
    }

    include "../../Controller/usuario/datosMiCuenta.php";
} else {
    header("location:../../Controller/usuario/login.php");
}
