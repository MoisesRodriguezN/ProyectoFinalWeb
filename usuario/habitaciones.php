<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
        
        $fechaEntrada = $_GET['fechaEntrada'];
        $fechaSalida = $_GET['fechaSalida'];
        $personas = $_GET['personas'];
        
        $sql = "SELECT h.codHabitacion, h.tipo, h.planta, h.tarifa, h.capacidad
          FROM habitacion h
          WHERE EXISTS (SELECT * FROM reserva r WHERE r.codHabitacion = h.codHabitacion AND ((r.fechaEntrada <= DATE('$fechaEntrada') AND r.fechaSalida > DATE('$fechaEntrada')) OR (r.fechaEntrada < DATE('$fechaSalida') AND r.fechaSalida >= DATE('$fechaSalida')))) = FALSE
            AND  h.capacidad='$personas'";

        $sql2 = "SELECT h.codHabitacion, h.tipo, h.planta, h.tarifa, h.capacidad"
          . " FROM habitacion h "
          . "WHERE EXISTS (SELECT * FROM reserva r WHERE r.codHabitacion = h.codHabitacion"
          . " AND (((r.fechaEntrada <= DATE('$fechaEntrada') AND r.fechaSalida > DATE('$fechaEntrada')) "
          . "OR (r.fechaEntrada < DATE('$fechaSalida') AND r.fechaSalida >= DATE('$fechaSalida'))))"
          . " OR EXISTS (SELECT * FROM reserva r WHERE r.codHabitacion = h.codHabitacion "
          . "AND ((r.fechaEntrada > DATE('$fechaEntrada') AND r.fechaSalida < DATE('$fechaSalida'))))) = FALSE "
          . "AND h.capacidad=$personas ";
        
        $habsDisponibles = $conexion->query($sql2);
        if($habsDisponibles ->rowCount() > 0){
          while ($hab = $habsDisponibles->fetchObject()) {
            
          ?>
        <table>
           <tr>
              <td><?= $hab->codHabitacion?></td>
              <td>Habitacion <?= $hab->tipo?></td>
              <td>Capacidad <?= $hab->capacidad?></td>
              <td>Planta <?= $hab->planta?></td>
              <td>Precio <?= $hab->tarifa?>€</td>
               <td>
                   <form name="reservar" action="confirmarReserva.php" method="GET">
                    <input type="hidden"  name="codHabitacion" value="<?= $hab->codHabitacion ?>">
                    <input type="hidden"  name="fechaEntrada" value="<?= $fechaEntrada?>">
                    <input type="hidden"  name="fechaSalida" value="<?= $fechaSalida ?>">
                    <input type="submit" value="Reservar" />
                </form>
              </td>
           </tr>
        </table>
            <?php
          }
        }else{
          echo "No hay habitaciones disponibles para las fecha seleccionada";
        }
        ?>
       
    </body>
</html>
