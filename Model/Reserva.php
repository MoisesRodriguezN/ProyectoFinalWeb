<?php


/**
 * Clase para operaciones sobre el listado de reservas.
 *
 * @author Moisés
 */

require_once 'HotelDB.php';

class Reserva {
    private $codHabitacion;
    private $codCliente;
    private $fechaEntrada;
    private $fechaSalida;
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
 
    function __construct($codHabitacion, $codCliente, $fechaEntrada, $fechaSalida, $dni, $nombre, $apellido1, $apellido2) {
        $this->codHabitacion = $codHabitacion;
        $this->codCliente = $codCliente;
        $this->fechaEntrada = $fechaEntrada;
        $this->fechaSalida = $fechaSalida;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
    }
    
    function getCodHabitacion() {
        return $this->codHabitacion;
    }

    function getCodCliente() {
        return $this->codCliente;
    }

    function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    function getFechaSalida() {
        return $this->fechaSalida;
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

    
        /**
     * Método que devuelve el total de filas de la consulta de reservas.
     * @return Int Cantiad de filas.
     * 
     */
    public static function getTotalReservas(){
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM reserva";
        $consulta = $conexion->query($seleccion);
        $total = $consulta->rowCount();
        
        return $total;   
    }
    
    /**
    * Método que devuelve una lista de reservas con paginación
    * @param String $orderBy Campo y orden ASC o DESC. EJEMPLO:
     *  ORDER BY fechaEntrada, r.codHabitacion ASC
    * @param Int $inicio Número de fila desde el que se empiezan a mostrar resultados
    * @param Int $tamano_pagina Entero con el tamaño de página. Número de resultados
     *  por página
    * @return Array Array de objetos con el listado de reservas
    * 
    */
    public static function getReservas($orderBy, $inicio, $tamano_pagina) {
        $conexion = HotelDB::connectDB();
        $seleccion = "SELECT * FROM reserva r "
                . "JOIN habitacion h ON (r.codHabitacion = h.codHabitacion) "
                . "JOIN cliente c ON (c.codCliente = r.codCliente) " 
                . $orderBy . " LIMIT " . $inicio . "," . $tamano_pagina;
        
        $consulta = $conexion->query($seleccion);
        
        $reservas = [];

        while ($registro = $consulta->fetchObject()) {
            $reservas[] = new Reserva($registro->codHabitacion, $registro->codCliente, 
                    $registro->fechaEntrada, $registro->fechaSalida, $registro->DNI,
                    $registro->nombre, $registro->apellido1, $registro->apellido2);
        }
        
        
        return $reservas;

    }
    
     /**
    * Método que elimina la reserva que tenga el código de habitacion, cliente y fechas
      *  que se pasen por parámetro.
    * @param String $codHabitacion Código de la habitacion reservada.
    * @param String $codCliente Código del cliente que ha reservado la habitación.
    * @param String $fecha Fecha de la reserva.
    */
    public static function deleteReserva($codHabitacion,$codCliente,$fecha){
        $conexion = HotelDB::connectDB();
        $borrado = "DELETE FROM reserva WHERE codHabitacion=" . $codHabitacion
                . " AND codCliente=" . $codCliente . " AND " . $fecha;
        $conexion->query($borrado);
    }
    
    /**
    * Método que modifica los datos de la reserva creada (new Reserva()).
    * @param String $fechaOriginal Fecha original en la que se realizó la reserva
    */
    public function modReserva($fechaOriginal) {
        $conexion = HotelDB::connectDB();
        $modificacion = "UPDATE reserva SET  fechaEntrada=\"$this->fechaEntrada\", "
                . "fechaSalida=\"$this->fechaSalida\" "
                . "WHERE codHabitacion=\"$this->codHabitacion\" "
                . "AND codCliente=\"$this->codCliente\" "
                . "AND fechaEntrada=\"$fechaOriginal\"";
        
        $conexion->query($modificacion);
    }
    
    public function reservar(){
        $conexion = HotelDB::connectDB();
        $reserva = "INSERT INTO RESERVA (codCliente, codHabitacion, fechaEntrada, "
                . "fechaSalida) VALUES ('$this->codCliente',"
                . "'$this->codHabitacion','$this->fechaEntrada' ,'$this->fechaSalida')";
        $conexion->query($reserva);
    }

}
