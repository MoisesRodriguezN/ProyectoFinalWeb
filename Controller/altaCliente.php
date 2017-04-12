<?php

include_once '../Model/Cliente.php';

$clienteAux = new Cliente("", $_POST[dni], $_POST[nombre], 
        $_POST[apellido1], $_POST[apellido2]);

$clienteAux->addCliente();

include_once './obtieneListaClientes.php';