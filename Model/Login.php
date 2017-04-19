<?php

/**
 * Clase para operaciones con el login de los administradores y usuarios
 *
 * @author Moisés
 */

require_once 'HotelDB.php';

class Login {
    private $usuario;
    private $clave;
    private $rol;
    private $codCliente;
    
    function __construct($usuario, $clave, $rol, $codCliente) {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->rol = $rol;
        $this->codCliente = $codCliente;
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getRol() {
        return $this->rol;
    }

    function getCodCliente() {
        return $this->codCliente;
    }

    public static function getTotalFilas($usuario, $clave){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM login WHERE usuario='$usuario' and clave='$clave'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $datos = [];
        $datos['filas'] = $consulta->rowCount();
        $datos['rol']= $registro->rol;
        $datos['codCliente']= $registro->codCliente;

        return $datos;
    }

}
