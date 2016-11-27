<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio - Hotel Fuente Alegre</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
            <div class="flex-container space-between">
              <a href="index.php" class="flex-item seleccionado"><p>INICIO <br>Bienvenidos</p></a>
              <div class="flex-item"><p>SERVICIOS <br>¿Que ofrecemos?</p></div>
              <div class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></div>
              <div class="flex-item"><p>RESERVAS <br>Reserva Ahora!</p></div>
              <div class="flex-item"><p>MI CUENTA <br>Tus reservas</p></div>
              <div class="flex-item"><p>CONTACTO <br>Escribenos!</p></div>
            </div>
        </div>
        
        <div class="contenedor">
            <div class="contenedorTexto">
                <span class="texto3D">Hotel Fuente Alegre</span>
            </div>
            <div class="redesSociales">
              <ul class="listaSocial">
                <li><span id="elemento1"></span></li>
                <li><span id="elemento2"></span></li>
                <li><span id="elemento3"></span></li>
                <li><span id="elemento4"></span></li>
              </ul>
            </div> 
            <div class="formularioReserva">
                <div class="cabeceraReservar">
                  <span class="tituloReservar">Reservar Ahora!</span>
                  <form action="usuario/habitaciones2.php" method="get">
                    Fecha Entrada:<br>
                    <input type="date" name="fechaEntrada">
                    <br>
                    Fecha Salida:<br>
                    <input type="date" name="fechaSalida">
                    <br>
                     personas:<br>
                    <select name="personas">
                        <option value="1">1</option>
                        <option value="2">2</option>
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
