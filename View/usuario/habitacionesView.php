<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?= $nombreHotel->nombreHotel?> - Habitaciones y tarifas</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../View/img/favicon.png">
    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../../View/img/uploads/<?=$logo->nombre?>" class="imgLogoResponsive"> 
            </div>
            <div class="ocultar flex-container space-between">
                <a href="../index.php" class="flex-item seleccionado"><p>INICIO <br>Bienvenidos</p></a>
                <a href="servicios.php" class="flex-item"><p>SERVICIOS <br>¿Que ofrecemos?</p></a>
                <a href="tiposHabitaciones.php" class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></a>
                <a href="login.php" class="flex-item"><p>MI CUENTA <br>Tus reservas</p></a>
                <a href="contacto.php" class="flex-item"><p>CONTACTO <br>Escribenos!</p></a>
            </div>
        </div>

        <div class="contenedor">
            <div class="contenedorTexto">
                <span class="texto3D2"><?= $nombreHotel->nombreHotel?></span>
            </div>
            <div class="redesSociales">
                <ul class="listaSocial">
                <?php 
                
                    if($estadoImg['facebook']->estado == "habilitado"){
                         
                        ?><a href="<?=$urlSociales['facebook']->ruta?>" target="_blank"><li><span id="elemento1"></span></li></a><?php
                    } 
                    
                    if($estadoImg['googlePlus']->estado == "habilitado"){
                        ?><a href="<?=$urlSociales['googlePlus']->ruta?>" target="_blank"><li><span id="elemento2"></span></li></a><?php
                    }
                    
                    if($estadoImg['instagram']->estado == "habilitado"){
                        ?><a href="<?=$urlSociales['instagram']->ruta?>" target="_blank"><li><span id="elemento3"></span></li></a><?php
                    }
                    
                    if($estadoImg['twitter']->estado == "habilitado"){
                        ?><a href="<?=$urlSociales['twitter']->ruta?>" target="_blank"><li><span id="elemento4"></span></li></a><?php
                    }
                ?>
              </ul>
            </div> 

            <div class="tituloTabla">
                <span class="spanTituloTabla">Habitaciones y tarifas</span>
            </div>
            <?php
            if ($totalHabsDisp > 0) {
                ?>
                <div class="wrap">
                    <table class="tablaHabitaciones">
                        <th class="tablahabitacionesTh">Habitación</th>
                        <th class="tablahabitacionesTh">Tipo</th>
                        <th class="tablahabitacionesTh">Capacidad</th>
                        <th class="tablahabitacionesTh">Planta</th>
                        <th class="tablahabitacionesTh">Precio/Noche</th>
                        <th class="tablahabitacionesTh">Reservar</th>
                        <?php
                        foreach ($data['habitaciones'] as $hab) {
                            ?>
                            <tr>
                                <td>
                                    Habitación Nº <?= $hab->GetCodHabitacion() ?>
                                </td>
                                <td>
                                    Habitacion <?= $hab->GetTipo() ?>
                                </td>
                                <td>
                                    Capacidad <?= $hab->GetCapacidad() ?>
                                </td>
                                <td>
                                    Planta <?= $hab->GetPlanta() ?>
                                </td>
                                <td>
                                    Precio <?= $hab->GetTarifa() ?>€
                                </td>
                                <td>
                                    <form name="reservar" action="confirmarReserva.php" method="GET">
                                        <input type="hidden"  name="codHabitacion" value="<?= $hab->GetCodHabitacion() ?>">
                                        <input type="hidden"  name="fechaEntrada" value="<?= $fechaEntrada ?>">
                                        <input type="hidden"  name="fechaSalida" value="<?= $fechaSalida ?>">
                                        <input type="submit" class="btnEnvio2NoMargin" value="Reservar" />
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            } else {
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