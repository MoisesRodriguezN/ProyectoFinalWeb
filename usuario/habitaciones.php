<?php
  session_start(); // Inicio de sesión
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Habitaciones y tarifas</title>
        <link rel="stylesheet" type="text/css" href="../css/Cuerpo.css">
        <link rel="stylesheet" type="text/css" href="../css/Cabecera.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="fondoCuerpo">
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

      ?>
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
            <div class="ocultar flex-container space-between">
              <a href="index.php" class="flex-item seleccionado"><p>INICIO <br>Bienvenidos</p></a>
              <a href="usuario/servicios.php" class="flex-item"><p>SERVICIOS <br>¿Que ofrecemos?</p></a>
              <a href="usuario/tiposHabitaciones.php" class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></a>
              <a href="usuario/login.php" class="flex-item"><p>MI CUENTA <br>Tus reservas</p></a>
              <a href="usuario/contacto.php" class="flex-item"><p>CONTACTO <br>Escribenos!</p></a>
            </div>
        </div>
        
        <div class="contenedor">
            <div class="contenedorTexto">
                <span class="texto3D">Hotel Fuente Alegre</span>
            </div>
            <div class="redesSociales">
              <ul class="listaSocial">
                <li><span id="elemento1"></span></li>
                <li><span id="elemento2"></span></li>
                <li><span id="elemento3"></span></li>
                <li><span id="elemento4"></span></li>
              </ul>
            </div> 
            
            <div class="tituloTabla">
              <span class="spanTituloTabla">Habitaciones y tarifas</span>
            </div>
            <?php
            if($habsDisponibles ->rowCount() > 0){
            ?>
            <table class="tablaHabitaciones">
              <th class="tablahabitacionesTh">Habitación</th>
              <th class="tablahabitacionesTh">Tipo</th>
              <th class="tablahabitacionesTh">Capacidad</th>
              <th class="tablahabitacionesTh">Planta</th>
              <th class="tablahabitacionesTh">Precio/Noche</th>
              <th class="tablahabitacionesTh">Reservar</th>
              <?php
                while ($hab = $habsDisponibles->fetchObject()) {
              ?>
              <tr>
                <td>
                  Habitación Nº <?= $hab->codHabitacion?>
                </td>
                <td>
                  Habitacion <?= $hab->tipo?>
                </td>
                <td>
                  Capacidad <?= $hab->capacidad?>
                </td>
                <td>
                  Planta <?= $hab->planta?>
                </td>
                <td>
                  Precio <?= $hab->tarifa?>€
                </td>
                <td>
                  <form name="reservar" action="confirmarReserva.php" method="GET">
                    <input type="hidden"  name="codHabitacion" value="<?= $hab->codHabitacion ?>">
                    <input type="hidden"  name="fechaEntrada" value="<?= $fechaEntrada?>">
                    <input type="hidden"  name="fechaSalida" value="<?= $fechaSalida ?>">
                    <input type="submit" class="btnEnvio2NoMargin" value="Reservar" />
                  </form>
                </td>
              </tr>
              <?php
                }
              ?>
            </table>
            <?php
            }else{
              ?>
              <div class="mensaje1">
                  <span>No hay habitaciones disponibles para la fecha seleccionada</span>
              </div>
              <?php
            }
            ?>
        </div>
    </body>
</html>
