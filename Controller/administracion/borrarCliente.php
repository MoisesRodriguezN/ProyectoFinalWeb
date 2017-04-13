<?php
require_once '../../Model/Cliente.php';

$codCliente = $_POST['codCliente'];

Cliente::deteleCliente($codCliente);

require_once './obtieneListaClientes.php';