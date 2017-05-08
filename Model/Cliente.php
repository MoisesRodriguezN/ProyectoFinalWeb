<?php

/**
 * Clase para operaciones sobre el listado de clientes.
 *
 * @author Moisés
 */

require_once 'HotelDB.php';

class Cliente {
    private $codCliente;
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    
    function __construct($codCliente, $dni, $nombre, $apellido1, $apellido2) {
        $this->codCliente = $codCliente;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
    }
    
    public function getCodCliente() {
        return $this->codCliente;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido1() {
        return $this->apellido1;
    }

    public function getApellido2() {
        return $this->apellido2;
    }
    
    /**
     * Método que devuelve el total de filas de la consulta de clientes.
     * @return Int Cantiad de filas.
     * 
     */
    public static function getTotalClientes(){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM cliente";
        $consulta = $conexion->query($seleccion);
        $total = $consulta->rowCount();
        
        return $total;   
    }
    
    /**
    * Método que devuelve el total de filas de la consulta filtrada por DNI.
    * @param String $dni DNI con el que realizar la búsqueda.
    * @return Int Cantiad de filas.
    * 
    */
    public static function getTotalClientesByDni($dni){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM cliente WHERE dni LIKE '%" . $dni . "%'" ;
        $consulta = $conexion->query($seleccion);
        $total = $consulta->rowCount();
        
        return $total;   
    }
    
    /**
    * Método que devuelve una lista de clientes filtrada por DNI y con paginación
    * @param String $dni DNI con el que realizar la búsqueda
    * @param String $orderBy Campo y orden ASC o DESC. EJEMPLO:
     *  ORDER BY apellido1, apellido2, nombre ASC
    * @param Int $inicio Número de fila desde el que se empiezan a mostrar resultados
    * @param Int $tamano_pagina Entero con el tamaño de página. Número de resultados
     *  por página
    * @return Array Array de objetos con el listado de clientes
    * 
    */
    public static function getClientesByDni($dni,$orderBy, $inicio, $tamano_pagina){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM cliente WHERE dni LIKE '%" . $dni . "%' " . $orderBy . " LIMIT " . $inicio . "," . $tamano_pagina;
        $consulta = $conexion->query($seleccion);
        
        $clientes = [];
        
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->codCliente, $registro->DNI, 
                    $registro->nombre, $registro->apellido1, $registro->apellido2);
        }
        
        return $clientes;
    }
    
    /**
    * Método que devuelve una lista de clientes con paginación
    * @param String $orderBy Campo y orden ASC o DESC. EJEMPLO:
     *  ORDER BY apellido1, apellido2, nombre ASC
    * @param Int $inicio Número de fila desde el que se empiezan a mostrar resultados
    * @param Int $tamano_pagina Entero con el tamaño de página. Número de resultados
     *  por página
    * @return Array Array de objetos con el listado de clientes
    * 
    */
    public static function getClientes($orderBy, $inicio, $tamano_pagina) {
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM cliente " . $orderBy . " LIMIT " . $inicio . "," . $tamano_pagina;
        $consulta = $conexion->query($seleccion);

        $clientes = [];

        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->codCliente, $registro->DNI, $registro->nombre, $registro->apellido1, $registro->apellido2);
        }

        return $clientes;
    }

    /**
    * Método que elimina el cliente que tenga el código que se pase por parámetro.
    * @param String $codCliente Código del cliente a eliminar.
    */
    public static function deteleCliente($codCliente){
        $conexion = HotelDB::connectDB();
        $borrado = "DELETE FROM cliente WHERE codCliente=".$codCliente;
        $conexion->query($borrado);
    }
    
    /**
    * Método que modifica los datos del cliente creado (new Cliente()).
    */
   public function modCliente() {
        $conexion = HotelDB::connectDB();
        $modificacion = "UPDATE cliente SET  DNI=\"$this->dni\", "
                . "nombre=\"$this->nombre\", apellido1=\"$this->apellido1\", "
                . "apellido2=\"$this->apellido2\""
                . " WHERE codCliente=\"$this->codCliente\"";
        $conexion->query($modificacion);
    }
    
    /**
    * Método que agrega un nuevo cliente.
    */
    public function addCliente() {
        $conexion = HotelDB::connectDB();
        $insercion = "INSERT INTO cliente (codCliente, DNI, nombre, apellido1, "
                . "apellido2) VALUES ('$this->codCliente',"
                . "'$this->dni','$this->nombre' ,'$this->apellido1' ,"
                . "'$this->apellido2')";
        $conexion->query($insercion);
    }
    
    /**
    * Método que devuelve un cliente filtrada por DNI. No tiene paginación.
    * @param String $dni DNI con el que realizar la búsqueda
    * @return Array Array de objeto con el cliente
    * 
    */
    public static function getClienteByDniNoPag($dni){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT codCliente FROM cliente WHERE DNI=\"$dni\"";
        $consulta = $conexion->query($seleccion);
        
        $clientes = [];
        
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->codCliente, $registro->DNI, 
                    $registro->nombre, $registro->apellido1, $registro->apellido2);
        }
        
        return $clientes;
    }

}