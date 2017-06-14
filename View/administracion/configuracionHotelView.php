<?php
session_start();
if ($_SESSION['logueadoAdmin']) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Administración Hotel - Configuración</title>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
            <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="../../View/js/configuracionHotel.js"></script>
            <link rel="icon" type="image/png" href="../../View/img/favicon.png">
            <style>
                #dialogoborrar{
                    display: none;
                }

                #dialogomodificar{
                    display: none;
                }

                #dialogoreservar{
                    display: none;
                }

                #dialogoNuevoCliente{
                    display: none;
                }
            </style> 
        </head>
        <body>
            <?php
            if ($_SESSION['logueadoAdmin']) {
                ?>
                <div class="container">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php">Administración Hotel</a>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">Clientes</a></li>
                                    <li><a href="../../Controller/administracion/habitaciones.php">Habitaciones</a></li>
                                    <li><a href="reservas.php">Reservas</a></li>
                                    <li class="active"><a href="../../Controller/administracion/configuracionHotel.php">Configuración</a></li>
                                    <!--<li><a href="#">Page 3</a></li>-->
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?= ucfirst($_SESSION['nombreAdmin']) ?></a></li> 
                                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li> 
                                </ul> <!-- ucfirst() Pone en mayúscula la primera letra-->
                            </div>
                        </div>
                    </nav>

                    <h2>Configuración del Hotel</h2>
                    <p>Aquí puedes cambiar las cofiguraciones del hotel, como el nombre, la clave de administrador, la galería de imagenes, logos...</p>            
                    <table class="table table-striped">
                        <thead>
                            <tr class="info">
                                <th>Elemento</th>
                                <th>Valor</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre del hotel
                                </td>
                                <td id="nombreHotel"><?= $nombreHotel->nombreHotel ?></td>
                                <td><button type="button" class="btn btn-info" id="editNombreHotel">Editar</button></td>
                            </tr>
                            <tr>
                                <td>Contraseña administrador
                                </td>
                                <td>**************</td>
                                <td><button type="button" class="btn btn-info" id="cambiarClave">Editar</button></td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Documentación
                                </td>
                                <td>Español</td>
                                <td><a href="../../View/varios/documentacion.pdf" target="_blank"><button type="button" class="btn btn-info">Ver</button></a></td>
                            </tr>
                            <tr>
                                <td>Documentación funcionalidades
                                </td>
                                <td>Ingles</td>
                                <td><a href="../../View/varios/documentacionIngles.pdf" target="_blank"><button type="button" class="btn btn-info">Ver</button></a></td>
                            </tr>
                        <td>Enlaces Redes Sociales
                        </td>
                        <td>
                            <select name="redesSociales" id="redesSocialesSelect">
                                <option value="facebook">Facebook</option>
                                <option value="googlePlus">Google Plus</option>
                                <option value="instagram">Instagram</option>
                                <option value="twitter">Twitter</option>
                            </select>
                            <input type="checkbox" name="estadoCheck" id="estadoCheck" value="estadoHab">Habilitar/Deshabilitar
                        </td>
                        <td><button type="button" class="btn btn-info" id="editSocial">Editar</button></td>
                        </tr>
                        <tr>
                            <td>Logo Hotel</td>
                            <td id="respuestalogoHotelForm">
                                <?php
                                $id = "logoHotel";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Logo hotel" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="logoHotelForm" enctype="multipart/form-data">
                                    <input type="file" name="logoHotel" id="imagen" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="logoHotel"/></td>

                            </form>
                        </tr>
                        <tr>
                            <td>Galería Hotel. Imagen 1</td>
                            <td id="respuestaimg1GaleriaForm">
                                <?php
                                $id = "img1Galeria";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Imagen 1 de la galería" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="img1GaleriaForm" enctype="multipart/form-data">
                                    <input type="file" name="img1Galeria" id="imagen1Galeria" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="img1Galeria"/></td>

                            </form>
                        </tr>

                        <tr>
                            <td>Galería Hotel. Imagen 2</td>
                            <td id="respuestaimg2GaleriaForm">
                                <?php
                                $id = "img2Galeria";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Imagen 2 de la galería" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="img2GaleriaForm" enctype="multipart/form-data">
                                    <input type="file" name="img2Galeria" id="imagen2Galeria" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="img2Galeria"/></td>

                            </form>
                        </tr>

                        <tr>
                            <td>Galería Hotel. Imagen 3</td>
                            <td id="respuestaimg3GaleriaForm">
                                <?php
                                $id = "img3Galeria";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Imagen 3 de la galería" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="img3GaleriaForm" enctype="multipart/form-data">
                                    <input type="file" name="img3Galeria" id="imagen3Galeria" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="img3Galeria"/></td>

                            </form>
                        </tr>

                        <tr>
                            <td>Galería Hotel. Imagen 4</td>
                            <td id="respuestaimg4GaleriaForm">
                                <?php
                                $id = "img4Galeria";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Imagen 4 de la galería" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="img4GaleriaForm" enctype="multipart/form-data">
                                    <input type="file" name="img4Galeria" id="imagen4Galeria" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="img4Galeria"/></td>

                            </form>
                        </tr>

                        <tr>
                            <td>Galería Hotel. Imagen 5</td>
                            <td id="respuestaimg5GaleriaForm">
                                <?php
                                $id = "img5Galeria";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Imagen 5 de la galería" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="img5GaleriaForm" enctype="multipart/form-data">
                                    <input type="file" name="img5Galeria" id="imagen5Galeria" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="img5Galeria"/></td>

                            </form>
                        </tr>

                        <tr>
                            <td>Imagen fondo Login usuarios y administradores</td>
                            <td id="respuestaimgLoginGenForm">
                                <?php
                                $id = "imgLoginGenForm";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Imagen del login usarios y administradores" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="imgLoginGenForm" enctype="multipart/form-data">
                                    <input type="file" name="imgLoginGenForm" id="imgLoginGenForm" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="imgLoginGenForm"/></td>

                            </form>
                        </tr>

                        <tr>
                            <td>Imagen de cabecera de los formularios</td>
                            <td id="respuestaimgCabeceraGenForm">
                                <?php
                                $id = "imgCabeceraGenForm";
                                $img = datosHotel::getImagenHotel($id);
                                ?>
                                <img src="<?= $img->ruta ?>" alt="Imagen de cabecera de los formulario" class="imgMiniaturaConfig">
                            </td>
                            <td>
                                <form method="post" id="imgCabeceraGenForm" enctype="multipart/form-data">
                                    <input type="file" name="imgCabeceraGenForm" id="imgCabeceraGenForm" class="btn btn-info fichero"/>
                                <input type="hidden" name="id" id="id" value="imgCabeceraGenForm"/></td>

                            </form>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div id="dialogoCargando" style="position: relative;"title="Procesando contenido">
                    <p>El contenido está siendo procesado.</p>

                    <p>Puede tardar unos segundos</p>
                </div>

                <div id="dialogoCorrecto" title="Clave Actualizada">
                    <p>
                        La clave ha sido guardada correctamente.
                    </p>

                    <P>
                        Vuelve a iniciar sesión con la nueva clave.
                    </P>
                </div>

                <div id="dialogoCorrecto2" title="Nombre guardado">
                    <p>
                        El nombre ha sido guardado
                    </p>
                </div>

                <div id="dialogoCorrecto3" title="Url Guardada">
                    <p>
                        La url ha sido guardada
                    </p>
                </div>

                <div id="dialogoNuevaClave" title="Modificación clave de admin">
                    <?php include "../../View/administracion/formModificarClaveAdmin.php" ?>
                </div>

                <div id="dialogoNuevoNombre" title="Modificación nombre Hotel">
                    <?php include "../../View/administracion/formModificarNombreHotel.php" ?>
                </div>

                <div id="dialogoNuevaUrlSocial" title="Modificación URL Botón Social">
                    <?php include "../../View/administracion/formModificarURLRedSocial.php" ?>
                </div>

                <div class="estados elementosOcultos">
                    <?php
                    foreach ($estadoImg as $key => $value) {
                        ?>
                        <div id="<?= $key ?>"><?= $value->estado ?></div>    
                        <?php
                    }
                    ?>

                </div>

                <div id="nombreAdmin" class="elementosOcultos">
                    <?= $_SESSION['nombreAdmin']; ?>
                </div>
            </body>
        </html>

        <?php
    } else {
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión";
        ?>
        <script>
            window.location.href = "../../Controller/administracion/login.php";
        </script>
        <?php
    }
}else{
    header("location:../../Controller/administracion/login.php");
}