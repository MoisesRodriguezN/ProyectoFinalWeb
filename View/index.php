<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?= $nombreHotel->nombreHotel?> - Inicio</title>
        <link rel="stylesheet" type="text/css" href="../View/css/main.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../View/img/favicon.png">
        <script>
           function myFunction() {
              var x = document.getElementById("myTopnav");
              if (x.className === "topnav") {
                  x.className += " responsive";
              } else {
                  x.className = "topnav";
              }
          }
          
          $(document).ready(function(){
            $( ".inputFecha" ).datepicker({
              dateFormat: "dd-mm-yy",
              minDate: 0
            });
            var salida = new Date();
            salida.setDate(salida.getDate() + 2);
            
            $(".fechaEntradaPicker").datepicker("setDate",new Date());
            $(".fechaSalidaPicker").datepicker("setDate",salida);
          });
        </script>    
    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../View/img/uploads/<?=$logo->nombre?>" class="imgLogoResponsive"> 
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
            <ul class="topnav" id="myTopnav">
              <li><a class="active" href="index.php">INICIO</a></li>
              <li><a href="usuario/servicios.php">SERVICIOS</a></li>
              <li><a href="usuario/tiposHabitaciones.php">HABITACIONES</a></li>
              <li><a href="usuario/login.php">CUENTA</a></li>
              <li><a href="usuario/contacto.php">CONTACTO</a></li>
              <li class="icon">
                  <a href="javascript:void(0);" class="barrasMenu" onclick="myFunction()"><span class="ion-navicon-round"></span></a>
              </li>
            </ul>
            
            
            <div class="contenedorTexto">
                <span class="texto3D2"><?= $nombreHotel->nombreHotel?></span>
            </div>
            <div class="bienvenidaSpan2">
                
              <span class="bienvenidaInicio">Reserva una habitación para el día de entrada y salida que desees.</span>
              <span class="bienvenidaInicio">Puedes ver mas información en las secciones servicios y habitaciones.</span>
            </div>
<!--            <div class="bienvenidaSpan">
                <span class="bienvenidaInicio">Bienvenido al hotel Fuente Alegre</span><br>
              <span class="bienvenidaInicio">Reserva una habitación para el día de entrada y salida que desees.</span>
              <span class="bienvenidaInicio">Puedes ver mas información sobre nuestras habitaciones y servicios en las 
                  secciones servicios y habitaciones.</span>
            </div>-->
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
            <div class="formularioReserva">
                <div class="cabeceraReservar">
                  <span class="tituloReservar">Reservar Ahora!</span>
                  <form action="usuario/habitaciones.php" method="get">
                      <span class="labelFecha">Fecha Entrada:</span><br>
                    <input type="text" class="inputFecha fechaEntradaPicker" name="fechaEntrada" autocomplete="off">
                    <br>
                      <span>Fecha Salida:</span><br>
                    <input type="text" class="inputFecha fechaSalidaPicker" name="fechaSalida" autocomplete="off">
                    <br>
                    <span class="labelFecha">personas:</span><br>
                    <select class="inputPersonas" name="personas">
                        <option value="1">1</option>
                        <option value="2" selected="">2</option>
                    </select><br>
                    <input type="submit" class="btnEnvio1" value="Ver Tarifas y Reservar">
                  </form> 
                </div>
            </div>       
            <div class="contenedorCarusel">
                <div id="galeriaAnimada">
                  <img src = "../View/img/uploads/<?=$imagenesGaleria[img1]->nombre?>" alt = "Imagen hotel habitacion">
                  <img src = "../View/img/uploads/<?=$imagenesGaleria[img2]->nombre?>" alt = "Piscina">
                  <img src = "../View/img/uploads/<?=$imagenesGaleria[img3]->nombre?>" alt = "Habitacion superior">
                  <img src = "../View/img/uploads/<?=$imagenesGaleria[img4]->nombre?>" alt = "Pasillos">
                  <img src = "../View/img/uploads/<?=$imagenesGaleria[img5]->nombre?>" alt = "Salon">
                </div>
                <div class="footerCarousel">
                  <div class="bienvenidacarouselDiv">
                    <span class="BienvenidoCarousel">Bienvenidos a Nuestro Hotel</span> 
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>


