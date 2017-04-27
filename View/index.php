<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio - Hotel Fuente Alegre</title>
        <link rel="stylesheet" type="text/css" href="../View/css/main.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              dateFormat: "dd-mm-yy"
            });
          });
        </script>    
    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../View/img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
        <div class="contenedorTexto2">
             <span class="texto3D2">Hotel Fuente Alegre</span>
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
                <span class="texto3D">Hotel Fuente Alegre</span>
            </div>
            <div class="bienvenidaSpan">
                <span class="bienvenidaInicio">Bienvenido al hotel Fuente Alegre</span><br>
              <span class="bienvenidaInicio">Reserva una habitación para el día de entrada y salida que desees.</span>
              <span class="bienvenidaInicio">Puedes ver mas información sobre nuestras habitaciones y servicios en las 
                  secciones servicios y habitaciones.</span>
            </div>
            <div class="redesSociales">
              <ul class="listaSocial">
                <a href="https://www.facebook.com/" target="_blank"><li><span id="elemento1"></span></li></a>
                <a href="https://plus.google.com/?hl=es" target="_blank"><li><span id="elemento2"></span></li></a>
                <a href="https://www.instagram.com/" target="_blank"><li><span id="elemento3"></span></li></a>
                <a href="https://twitter.com/?lang=es" target="_blank"><li><span id="elemento4"></span></li></a>
              </ul>
            </div> 
            <div class="formularioReserva">
                <div class="cabeceraReservar">
                  <span class="tituloReservar">Reservar Ahora!</span>
                  <form action="usuario/habitaciones.php" method="get">
                      <span class="labelFecha">Fecha Entrada:</span><br>
                    <input type="date" class="inputFecha" name="fechaEntrada">
                    <br>
                      <span>Fecha Salida:</span><br>
                    <input type="date" class="inputFecha" name="fechaSalida">
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
                    <img src = "../View/img/hotel1.jpg" alt = "Imagen hotel habitacion">
                  <img src = "../View/img/hotel2.jpg" alt = "Piscina">
                  <img src = "../View/img/hotel3.jpg" alt = "Habitacion superior">
                  <img src = "../View/img/hotel4.jpg" alt = "Pasillos">
                  <img src = "../View/img/hotel5.jpg" alt = "Salon">
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


