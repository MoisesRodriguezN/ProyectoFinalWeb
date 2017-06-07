<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hotel Fuente Alegre - Servicios</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }

            //Dialogo de edición
            $(document).ready(function () {

                var idTexto;

                //Muestra un dialogo al comenzar una petición ajax
                $(document).ajaxStart(function () {
                    $("#dialogoCargando").dialog("open");
                    $('body').css('cursor', 'wait');
                });

                //Muestra un dialogo al Finalizar una petición ajax
                $(document).ajaxStop(function () {
                    $("#dialogoCargando").dialog("close");
                    $('body').css('cursor', 'auto');
                });

                //Cambia de color el contenedor al poner el ratón encima
                $("#pag2Texto1").mouseover(function () {
                    $("#pag2Texto1").css("background-color", "lightgray");
                });

                $("#pag2Texto1").mouseout(function () {
                    $("#pag2Texto1").css("background-color", "#ecce86");
                });

                $("#pag2Texto2").mouseover(function () {
                    $("#pag2Texto2").css("background-color", "lightgray");
                });

                $("#pag2Texto2").mouseout(function () {
                    $("#pag2Texto2").css("background-color", "#ecce86");
                });
                //FIN Cambia de color el contenedor al poner el ratón encima

                $('.textoDescripciones').css('cursor', 'pointer');

                //Dialogo con el editor de texto
                $("#dialogoTexto1").dialog({
                    autoOpen: false,
                    resizable: true,
                    closeOnEscape: true,
                    modal: true,
                    show: 'fade',
                    hide: 'fade',
                    width: 'auto',
                    height: 'auto',
                    buttons: {
                        "Guardar": function () {
                            $.post("../../Controller/administracion/editarServicio.php", {
                                idTextoEditar: $('#idTextoMod').text(),
                                servicios: tinymce.activeEditor.getContent() //Obtiene el contenido
                                        // del texArea
                            }, function (data, status) {
                                var response = $('<html />').html(data);

                                if ($('#idTextoMod').text() === "pag2Texto1") {
                                    $("#pag2Texto1").html(response.find('#pag2Texto1 P'));
                                }

                                if ($('#idTextoMod').text() === "pag2Texto2") {
                                    $("#pag2Texto2").html(response.find('#pag2Texto2 P'));
                                }
                                //                                    $("#pag2Texto1").html(response.find('#pag2Texto1 P'));
                                $("#dialogoCorrecto").dialog('open');
                                setTimeout(function () {
                                    $("#dialogoCorrecto").dialog("close");
                                }, 3000);
                            });//post	

                            $(this).dialog("close");

                        },
                        "Cancelar": function () {
                            $(this).dialog("close");
                        }
                    }
                });

                //Modifica el tamaño y posición del dialogo según el tamaño de la ventana
                $(window).resize(function () {
                    $("#dialogoTexto1").dialog("option", "position", {my: "center", at: "center", of: window});
                });

                //Dialogo con mensaje cargando
                $("#dialogoCargando").dialog({
                    autoOpen: false,
                    resizable: false,
                    modal: true,
                    show: 'fade',
                    hide: 'fade',
                    width: 'auto'
                });

                //Dialogo con mensaje correcto
                $("#dialogoCorrecto").dialog({
                    autoOpen: false,
                    resizable: false,
                    modal: true,
                    width: 'auto'
                });

                //Peticiones ajax para la carga del texto clicado en el editor
                $(document).on("click", "#pag2Texto1, #pag2Texto2", function () {
                    idTexto = $(this).attr("id");
                    $.ajax({
                        data: {idTextoEdit: idTexto},
                        url: '../../Controller/administracion/editarServicio.php',
                        type: 'post',
                        timeout: 0,
                        success: function (response) {
                            $("#dialogoTexto1").html(response);
                            setTimeout(function () {
                                $("#dialogoTexto1").dialog("open");
                            }, 200);
                        }
                    });
                });
            });

        </script>

    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../../View/img/logoHotelHeader.png" class="imgLogoResponsive"> 
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
    </body>
</html>
