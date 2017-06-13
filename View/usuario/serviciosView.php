<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?= $nombreHotel->nombreHotel ?> - Servicios</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="icon" type="image/png" href="../../View/img/favicon.png">
        <script src="../../View/js/usuario/serviciosView.js"></script>
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }

        </script>

    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../../View/img/uploads/<?= $logo->nombre ?>" class="imgLogoResponsive">
            </div>
            <div class="flex-container space-between">
                <a href="../index.php" class="flex-item"><p>INICIO <br>Bienvenidos</p></a>
                <a href="servicios.php" class="flex-item seleccionado"><p>SERVICIOS <br>¿Que ofrecemos?</p></a>
                <a href="tiposHabitaciones.php" class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></a>
                <a href="login.php" class="flex-item"><p>MI CUENTA <br>Tus reservas</p></a>
                <a href="contacto.php" class="flex-item"><p>CONTACTO <br>Escribenos!</p></a>
            </div>
        </div>
        <ul class="topnav" id="myTopnav">
            <li><a href="../index.php">INICIO</a></li>
            <li><a href="servicios.php">SERVICIOS</a></li>
            <li><a class="active" href="tiposHabitaciones.php">HABITACIONES</a></li>
            <li><a href="login.php">CUENTA</a></li>
            <li><a href="contacto.php">CONTACTO</a></li>
            <li class="icon">
                <a href="javascript:void(0);" class="barrasMenu" onclick="myFunction()"><span class="ion-navicon-round"></span></a>
            </li>
        </ul>
        <div class="contenedor">
            <div class="contenedorTexto">
                <span class="texto3D"><?= $nombreHotel->nombreHotel ?></span>
            </div>
            <div class="redesSociales">
                <ul class="listaSocial">
                    <?php
                    if ($estadoImg['facebook']->estado == "habilitado") {
                        ?><a href="<?= $urlSociales['facebook']->ruta ?>" target="_blank"><li><span id="elemento1"></span></li></a><?php
                    }

                    if ($estadoImg['googlePlus']->estado == "habilitado") {
                        ?><a href="<?= $urlSociales['googlePlus']->ruta ?>" target="_blank"><li><span id="elemento2"></span></li></a><?php
                    }

                    if ($estadoImg['instagram']->estado == "habilitado") {
                        ?><a href="<?= $urlSociales['instagram']->ruta ?>" target="_blank"><li><span id="elemento3"></span></li></a><?php
                            }

                            if ($estadoImg['twitter']->estado == "habilitado") {
                                ?><a href="<?= $urlSociales['twitter']->ruta ?>" target="_blank"><li><span id="elemento4"></span></li></a><?php
                            }
                            ?>
                </ul>
            </div> 

            <div class="tituloTabla">
                <span class="spanTituloTabla">Servicios</span>
            </div>

            <div class="textoDescripciones" id="pag2Texto1">
<?= $texto->servicios ?>
            </div>

            <div class="tituloTabla limpiarFloat">
                <span class="spanTituloTabla">El comedor</span>
            </div>

            <div class="limpiarFloat textoDescripciones textoDescripcionesBottom" id="pag2Texto2">
<?= $texto->comedor ?>          
            </div>
        </div>

        <div id="dialogoTexto1" title="Edición de servicios"></div>

        <div id="dialogoCorrecto" title="Contenido guardado">
            <p>
                El contenido ha sido guardado correctamente.
            </p>
        </div>

        <div id="dialogoCargando" style="position: relative;"title="Procesando contenido">
            <p>El contenido está siendo procesado.
            </p>

            <p>
                Puede tardar unos segundos
            </p>
        </div>
<?= $logued ?>
    </body>
</html>
