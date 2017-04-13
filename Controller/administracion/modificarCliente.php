<?php

require_once '../../Model/Cliente.php';

$clienteAux = new Cliente($_POST[codCliente], $_POST[dni], $_POST[nombre], 
        $_POST[apellido], $_POST[apellido2]);

$clienteAux->modCliente();

require_once './obtieneListaClientes.php';

