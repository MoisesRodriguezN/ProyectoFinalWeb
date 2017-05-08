<?php

/**
 * Clase para obtener datos de cliente y usuario.
 *
 * @author Moisés
 */
class UsuarioLogin {

    private $usuario;
//    private $clave;
    private $rol;
    private $codCliente;
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;

    function __construct($usuario, /* $clave, */ $rol, $codCliente, $dni, $nombre, $apellido1, $apellido2) {
        $this->usuario = $usuario;
//        $this->clave = $clave;
        $this->rol = $rol;
        $this->codCliente = $codCliente;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
    }

    function getUsuario() {
        return $this->usuario;
    }

//    function getClave() {
//        return $this->clave;
//    }

    function getRol() {
        return $this->rol;
    }

    function getCodCliente() {
        return $this->codCliente;
    }

    function getDni() {
        return $this->dni;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido1() {
        return $this->apellido1;
    }

    function getApellido2() {
        return $this->apellido2;
    }

}
