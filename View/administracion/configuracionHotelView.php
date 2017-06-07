<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
      
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">

<meta http-equiv="Expires" content="0">
 
<meta http-equiv="Last-Modified" content="0">
 
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 
<meta http-equiv="Pragma" content="no-cache">
        <title>Administración Hotel - Clientes</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="../../View/js/inicioClientes.js"></script>
        <script> 
        $( document ).ready(function() {
            $("input").on("change", function(){
                var formData = new FormData($(this).parent()[0]);
                var idVuelque = $(this).parent().attr('id');
                console.log(idVuelque);
                var ruta = "subidaImgAjax.php";
                $.ajax({
                    url: ruta,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        $("#respuesta" + idVuelque + " img").attr("src",datos + "?cachebuster=" + new Date().getTime());                    
                    }
                });
            });
        });
    </script>
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
        //if ($_SESSION['logueadoAdmin']){
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
  <p>Aquí podrás cambiar las cofiguraciones del hotel, como el nombre, la galería de imagenes, logos...</p>            
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
        <td>Nombre del hotel:</td>
        <td><?= $nombreHotel->nombreHotel?></td>
        <td><button type="button" class="btn btn-info">Editar</button></td>
      </tr>
      <tr>
        <td>Logo Hotel</td>
        <td id="respuestalogoHotelForm">
            <?php
                $id="logoHotel"; 
                $img = datosHotel::getImagenHotel($id);
            ?>
            <img src="<?=$img->ruta?>" alt="Logo hotel" class="imgMiniaturaConfig">
        </td>
        <td>
            <form method="post" id="logoHotelForm" enctype="multipart/form-data">
                <input type="file" name="logoHotel" id="imagen" class="btn btn-info"/>
                <input type="hidden" name="id" id="id" value="logoHotel"/></td>
                
            </form>
      </tr>
      <tr>
        <td>Galería Hotel. Imagen 1</td>
        <td id="respuestaimg1GaleriaForm">
            <?php
                $id="img1Galeria"; 
                $img = datosHotel::getImagenHotel($id);
            ?>
            <img src="<?=$img->ruta?>" alt="Imagen 1 de la galería" class="imgMiniaturaConfig">
        </td>
        <td>
            <form method="post" id="img1GaleriaForm" enctype="multipart/form-data">
                <input type="file" name="img1Galeria" id="imagen1Galeria" class="btn btn-info"/>
                <input type="hidden" name="id" id="id" value="img1Galeria"/></td>
                
            </form>
      </tr>
      
      <tr>
        <td>Galería Hotel. Imagen 2</td>
        <td id="respuestaimg2GaleriaForm">
            <?php
                $id="img2Galeria"; 
                $img = datosHotel::getImagenHotel($id);
            ?>
            <img src="<?=$img->ruta?>" alt="Imagen 2 de la galería" class="imgMiniaturaConfig">
        </td>
        <td>
            <form method="post" id="img2GaleriaForm" enctype="multipart/form-data">
                <input type="file" name="img2Galeria" id="imagen2Galeria" class="btn btn-info"/>
                <input type="hidden" name="id" id="id" value="img2Galeria"/></td>
                
            </form>
      </tr>
      
      <tr>
        <td>Galería Hotel. Imagen 3</td>
        <td id="respuestaimg3GaleriaForm">
            <?php
                $id="img3Galeria"; 
                $img = datosHotel::getImagenHotel($id);
            ?>
            <img src="<?=$img->ruta?>" alt="Imagen 3 de la galería" class="imgMiniaturaConfig">
        </td>
        <td>
            <form method="post" id="img3GaleriaForm" enctype="multipart/form-data">
                <input type="file" name="img3Galeria" id="imagen3Galeria" class="btn btn-info"/>
                <input type="hidden" name="id" id="id" value="img3Galeria"/></td>
                
            </form>
      </tr>
      
      <tr>
        <td>Galería Hotel. Imagen 4</td>
        <td id="respuestaimg2GaleriaForm">
            <?php
                $id="img4Galeria"; 
                $img = datosHotel::getImagenHotel($id);
            ?>
            <img src="<?=$img->ruta?>" alt="Imagen 4 de la galería" class="imgMiniaturaConfig">
        </td>
        <td>
            <form method="post" id="img4GaleriaForm" enctype="multipart/form-data">
                <input type="file" name="img4Galeria" id="imagen4Galeria" class="btn btn-info"/>
                <input type="hidden" name="id" id="id" value="img4Galeria"/></td>
                
            </form>
      </tr>
      
      <tr>
        <td>Galería Hotel. Imagen 5</td>
        <td id="respuestaimg5GaleriaForm">
            <?php
                $id="img5Galeria"; 
                $img = datosHotel::getImagenHotel($id);
            ?>
            <img src="<?=$img->ruta?>" alt="Imagen 5 de la galería" class="imgMiniaturaConfig">
        </td>
        <td>
            <form method="post" id="img5GaleriaForm" enctype="multipart/form-data">
                <input type="file" name="img5Galeria" id="imagen5Galeria" class="btn btn-info"/>
                <input type="hidden" name="id" id="id" value="img5Galeria"/></td>
                
            </form>
      </tr>
    </tbody>
  </table>
        </div>
</body>
</html>

<?php
    }else{
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión"; //Mensaje de prueba
        ?>
            <script>
                window.location.href = "../../Controller/administracion/login.php";
            </script>
         <?php
    }