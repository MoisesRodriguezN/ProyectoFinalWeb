<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio - Hotel Fuente Alegre</title>
        <link rel="stylesheet" type="text/css" href="css/Cuerpo.css">
        <link rel="stylesheet" type="text/css" href="css/Cabecera.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
            <div class="flex-container space-between">
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
                    Fecha Entrada:<br>
                    <input type="date" name="fechaEntrada" autofocus="">
                    <br>
                    Fecha Salida:<br>
                    <input type="date" name="fechaSalida">
                    <br>
                     personas:<br>
                    <select name="personas">
                        <option value="1">1</option>
                        <option value="2" selected="">2</option>
                    </select><br>
                    <input type="submit" class="btnEnvio1" value="Ver Tarifas y Reservar">
                  </form> 
                </div>
            </div>       
            <div class="contenedorCarusel">
                <div id="galeriaAnimada">
                  <img src = "img/hotel1.jpg" alt = "Imagen hotel habitacion">
                  <img src = "img/hotel2.jpg" alt = "Piscina">
                  <img src = "img/hotel3.jpg" alt = "Habitacion superior">
                  <img src = "img/hotel4.jpg" alt = "Pasillos">
                  <img src = "img/hotel5.jpg" alt = "Salon">
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
