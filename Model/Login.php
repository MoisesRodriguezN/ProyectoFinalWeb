<?php

/**
 * Clase para operaciones con el login y registro de los administradores y usuarios
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
    
    /**
    * Método que devuelve el total de filas de la consulta además del rol y el.
    * Este método se usa para el login de Administrador.
    * codigo del cliente.
    * @param String $usuario Usuario del inicio de sesión.
    * @param String $clave clave del usuario de inicio de sesión.
    * @return Array asociativo con el número de filas, el rol y el código de cliente.
    * 
    */
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
    
    /**
    * Método que devuelve el total de filas de la consulta además del rol y el.
    * Este método se usa para el login de Usuario.
    * codigo del cliente.
    * @param String $usuario Usuario del inicio de sesión.
    * @param String $clave clave del usuario de inicio de sesión.
    * @return Array asociativo con el número de filas, el rol y el código de cliente.
    * 
    */
    public static function getTotalFilasUsuario($usuario, $clave){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM login WHERE usuario='$usuario' and clave='$clave' and rol='usuario'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $datos = [];
        $datos['filas'] = $consulta->rowCount();
        $datos['rol']= $registro->rol;
        $datos['codCliente']= $registro->codCliente;

        return $datos;
    }
    
    public static function registrarUsuario($nombre, $dni, $apellido1, $apellido2,
            $usuario, $clave){
        $conexion = HotelDB::connectDB();
        
        //Inserta el cliente
        $insercion = "INSERT INTO cliente (codCliente, DNI, nombre, apellido1, "
            . "apellido2) VALUES ('NULL',"
            . "'$dni','$nombre' ,'$apellido1' ,"
            . "'$apellido2')";
        $conexion->exec($insercion);
        
        //Obtiene el código del cliente
        $seleccion = "SELECT codCliente FROM cliente WHERE DNI='$dni' and nombre='$nombre'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $codClienteRegistro = $registro->codCliente;
        
        //Inserta el usuario
        $insercion2 = "INSERT INTO login (usuario, clave, rol, codCliente)"
            . "  VALUES ('$_POST[usuario]',"
            . "'$_POST[clave]','usuario' ,'$codClienteRegistro')";
        $conexion->exec($insercion2);
    }

}
