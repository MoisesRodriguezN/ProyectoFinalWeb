<?php

include_once '../Model/Cliente.php';

$clienteAux = new Cliente($_POST[codCliente], $_POST[dni], $_POST[nombre], 
        $_POST[apellido], $_POST[apellido2]);

$clienteAux->modCliente();

include_once './obtieneListaClientes.php';

