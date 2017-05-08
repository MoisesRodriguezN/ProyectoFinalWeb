<?php

/**
 * Clase para operaciones con el login y registro de los administradores y usuarios
 *
 * @author Moisés
 */
require_once 'HotelDB.php';

require_once 'UsuarioLogin.php';

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
    public static function getTotalFilas($usuario, $clave) {
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM login WHERE usuario='$usuario' and clave='$clave'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $datos = [];
        $datos['filas'] = $consulta->rowCount();
        $datos['rol'] = $registro->rol;
        $datos['codCliente'] = $registro->codCliente;

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
    public static function getTotalFilasUsuario($usuario, $clave) {
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM login WHERE usuario='$usuario' and clave='$clave' and rol='usuario'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $datos = [];
        $datos['filas'] = $consulta->rowCount();
        $datos['rol'] = $registro->rol;
        $datos['codCliente'] = $registro->codCliente;

        return $datos;
    }

    public static function registrarUsuario($nombre, $dni, $apellido1, $apellido2, $usuario, $clave) {
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

    /**
     * Método que devuelve los datos del cliente y usuario.
     * Este método se usa a la hora de hacer una reserva, para mostrar los datos
     * del usuario logueado en la sesión. 
     * codigo del cliente.
     * @param String $usuario Usuario que está reservando.
     * @return Array de objeto con los datos del cliente y el usuario.
     * 
     */
    public static function getDatosUsuario($usuario) {
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM cliente c, login lo "
                . "WHERE c.codCliente = lo.codCliente AND lo.usuario ='$usuario' ";
        $consulta = $conexion->query($seleccion);
        $datos = [];

        while ($registro = $consulta->fetchObject()) {
            $datos[] = new UsuarioLogin($registro->usuario, $registro->rol, $registro->codCliente, $registro->DNI, $registro->nombre, $registro->apellido1, $registro->apellido2);
        }

        return $datos;
    }
    
    public static function cambiaClaveUsuario($usuario, $clave){
        $conexion = HotelDB::connectDB();
        $modificacionClave = "UPDATE login SET clave=\"$clave\" "
            . " WHERE usuario=\"$usuario\"";
        $conexion->query($modificacionClave);
    }

}
