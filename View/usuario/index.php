<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mis reservas</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../../View/img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
            <div class="flex-container space-between">
                <a href="../index.php" class="flex-item"><p>INICIO <br>Bienvenidos</p></a>
                <a href="servicios.php" class="flex-item"><p>SERVICIOS <br>¿Que ofrecemos?</p></a>
                <a href="tiposHabitaciones.php" class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></a>
                <a href="login.php" class="flex-item seleccionado"><p>MI CUENTA <br>Tus reservas</p></a>
                <a href="contacto.php" class="flex-item"><p>CONTACTO <br>Escribenos!</p></a>
            </div>
        </div>

        <div class="contenedor">
            <div class="contenedorTexto">
                <span class="texto3D"><?= $nombreHotel->nombreHotel?></span>
            </div>
            <div class="redesSociales">
                <ul class="listaSocial">
                    <a href="https://www.facebook.com/" target="_blank"><li><span id="elemento1"></span></li></a>
                    <a href="https://plus.google.com/?hl=es" target="_blank"><li><span id="elemento2"></span></li></a>
                    <a href="https://www.instagram.com/" target="_blank"><li><span id="elemento3"></span></li></a>
                    <a href="https://twitter.com/?lang=es" target="_blank"><li><span id="elemento4"></span></li></a>
                </ul>
            </div> 

            <ul class="menu1">
                <li class="menu2 esquinaI"><a href="miCuenta.php">Bienvenid@ <?= $usuario ?></a></li>
                <li class="menu2 seleccionadoMenuUsuario"><a href="index.php">Mis reservas</a></li>
                <li class="menu2"><a href="miCuenta.php">Mi cuenta</a></li>
                <li class="menu2 esquinaD"><a href="logout.php">Cerrar sesión</a></li>
            </ul>
<?php
            if(!empty($data['datos'])){
            ?>
            <table class="tablaHabitaciones">
              <th class="tablahabitacionesTh">Habitación</th>
              <th class="tablahabitacionesTh">Tipo</th>
              <th class="tablahabitacionesTh">Capacidad</th>
              <th class="tablahabitacionesTh">Planta</th>
              <th class="tablahabitacionesTh">Precio/Noche</th>
              <th class="tablahabitacionesTh">Fecha Entrada</th>
              <th class="tablahabitacionesTh">Fecha Salida</th>
              <?php
                foreach ($data['datos'] as $hab) {
              ?>
              <tr>
                <td>
                  Habitación Nº <?= $hab->GetCodHabitacion()?>
                </td>
                <td>
                  Habitacion <?= $hab->GetTipo()?>
                </td>
                <td>
                  Capacidad <?= $hab->GetCapacidad()?>
                </td>
                <td>
                  Planta <?= $hab->GetPlanta()?>
                </td>
                <td>
                  Precio <?= $hab->GetTarifa()?>€
                </td>
                <td>
                  <?= $hab->GetFechaEntrada()?>
                </td>
                <td>
                  <?= $hab->GetFechaSalida()?>
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
                  <span>No hay habitaciones reservadas</span>
                  <a class="spanTituloTabla2" href="logout.php">Cerrar sesión</a>
              </div>
              <?php
            }