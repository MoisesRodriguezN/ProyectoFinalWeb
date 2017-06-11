<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?= $nombreHotel->nombreHotel?> - Mi cuenta</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <script src="../../View/js/usuario/miCuentaView.js"></script>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="icon" type="image/png" href="../../View/img/favicon.png">
        <script>
//            $(document).ready(function () {
//                var usuario;
//                var dni2;
//
//                //-----------------Modificacion datos usuario-------------------------
//                $("#formModificar").validate({
//                    rules: {
//                        DNI: {required: true, minlength: 9, maxlength: 9},
//                        nombre: {required: true},
//                        apellido1: {required: true},
//                        apellido2: {required: true}
//                    },
//                    messages: {
//                        DNI: "Debe introducir un dni Válido.",
//                        nombre: "Debe introducir un Nombre.",
//                        apellido1: "Debe introducir un apellido.",
//                        apellido2: "Debe introducir un apellido.",
//                    }
//                });
//
//                $("#dialogoNuevoCliente").dialog({
//                    autoOpen: false,
//                    resizable: false,
//                    minWidth: 200,
//                    modal: true,
//                    buttons: {
//                        "Guardar": function () {
//                            if ($('#formModificar').valid()) {
//                                $.post("actualizaDatosUsuario.php", {
//                                    nombre: $("#inputNombre").val(),
//                                    apellido1: $("#inputApellido").val(),
//                                    apellido2: $("#inputApellido2").val(),
//                                    DNI: $("#inputDni").val(),
//                                    dni2: dni2,
//                                    usuario: usuario
//                                }, function (data, status) {
//                                    $("#datosUsuario").html(data);
//                                });//get			
//
//                                $(this).dialog("close");
//                            }
//                        },
//                        "Cancelar": function () {
//                            $(this).dialog("close");
//                        }
//                    }//buttons
//                });
//
//                //Boton Nuevo Cliente	
//                $(document).on("click", "#cambiarDatos", function () {
//                    $("#dialogoNuevoCliente").dialog("open");
//                    $("#inputNombre").val($.trim($(this).parent().siblings("td.nombre").text()));
//                    $("#inputApellido").val($.trim($(this).parent().siblings("td.apellido").text()));
//                    $("#inputApellido2").val($.trim($(this).parent().siblings("td.apellido2").text()));
//                    $("#inputDni").val($.trim($(this).parent().siblings("td.dni").text()));
//                    usuario = $(this).parent().siblings("td.usuario").text().trim();
//                    dni2 = $(this).parent().siblings("td.dni").text().trim();
//
//                });
//
//                //-----------------FIN modificación datos usuario---------------------
//                //-----------------Modificacion clave usuario-------------------------
//                $("#formModificarClave").validate({
//                    rules: {
//                        clave: {required: true, minlength: 6, maxlength: 20},
//                        claveComprueba: {
//                            equalTo: "#inputClave"
//                        }
//                    },
//                    messages: {
//                        clave: "Mínimo 6 carácteres",
//                        claveComprueba: "Las claves deben ser iguales"
//                    }
//                });
//
//                $("#dialogoNuevaClave").dialog({
//                    autoOpen: false,
//                    resizable: false,
//                    minWidth: 200,
//                    modal: true,
//                    buttons: {
//                        "Guardar": function () {
//                            if ($('#formModificarClave').valid()) {
//                                $.post("actualizaClaveUsuario.php", {
//                                    usuario: usuario,
//                                    clave: $("#inputClave").val()
//                                }, function (data, status) {
//                                    $("#datosUsuario").html(data);
//                                });//get			
//
//                                $(this).dialog("close");
//                            }
//                        },
//                        "Cancelar": function () {
//                            $(this).dialog("close");
//                        }
//                    }//buttons
//                });
//
//                //Boton Nuevo Cliente	
//                $(document).on("click", "#cambiarClave", function () {
//                    $("#dialogoNuevaClave").dialog("open");
//                    usuario = $(this).parent().siblings("td.usuario").text().trim();
//                });
//                //-----------------FIN Modificacion clave usuario---------------------
//            });
        </script>
        <style>
            #dialogoNuevoCliente{
                display: none;
            }

            #dialogoNuevaClave{
                display: none;
            }
        </style>
    </head>
    <body class="fondoCuerpo">

        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../../View/img/uploads/<?=$logo->nombre?>" class="imgLogoResponsive">
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

            <ul class="menu1">
                <li class="menu2 esquinaI"><a href="miCuenta.php">Bienvenid@ <?= $usuario ?></a></li>
                <li class="menu2"><a href="index.php">Mis reservas</a></li>
                <li class="menu2 seleccionadoMenuUsuario"><a href="miCuenta.php">Mi cuenta</a></li>
                <li class="menu2 esquinaD"><a href="logout.php">Cerrar sesión</a></li>
            </ul>


            <div id="datosUsuario">
                <?php include "../../Controller/usuario/datosMiCuenta.php" ?>
            </div>
            <!-- <form name="actualizarDatosUsuario" action="actualizarDatosUsuario.php" method="POST">
               <input type="hidden"  name="nombre" value="<?= $hab->nombre ?>">
               <input type="hidden"  name="apellido1" value="<?= $hab->apellido1 ?>">
               <input type="hidden"  name="apellido2" value="<?= $hab->apellido2 ?>">
               <input type="hidden"  name="DNI" value="<?= $hab->DNI ?>">
               <input type="hidden"  name="usuario" value="<?= $hab->usuario ?>">
               <input type="submit" class="btnEnvio2NoMargin" value="Modificar" />
             </form>
            
           </td>
           <td>
             <form name="actualizarClaveUsuario" action="actualizarDatosUsuario.php" method="POST">
               <input type="hidden"  name="usuario" value="<?= $hab->usuario ?>">
               <input type="hidden"  name="accion" value="actClave">
               <input type="submit" class="btnEnvio2NoMargin" value="Cambiar" />
             </form>
           </td>-->
        </div>
        <div id="dialogoNuevoCliente" title="Modificación datos de usuario">
            <?php include "../../Controller/usuario/formModificarDatosUsuario.php" ?>
        </div>

        <div id="dialogoNuevaClave" title="Modificación clave de usuario">
            <?php include "../../Controller/usuario/formModificarClaveUsuario.php" ?>
        </div>
    </body>
</html>