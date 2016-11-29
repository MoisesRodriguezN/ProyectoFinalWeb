<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tipos de habitaciones</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body class="fondoCuerpo">
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
            <div class="flex-container space-between">
              <a href="../index.php" class="flex-item"><p>INICIO <br>Bienvenidos</p></a>
              <a href="servicios.php" class="flex-item seleccionado"><p>SERVICIOS <br>¿Que ofrecemos?</p></a>
              <a href="tiposHabitaciones.php" class="flex-item seleccionado"><p>HABITACIONES <br>Tu comodidad</p></a>
              <a href="login.php" class="flex-item"><p>MI CUENTA <br>Tus reservas</p></a>
              <a href="contacto.php" class="flex-item"><p>CONTACTO <br>Escribenos!</p></a>
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
           
            <div class="tituloTabla">
                <span class="spanTituloTabla">Habitaciones Invididuales</span>
            </div>
            
            <div>
              <img class="imgHab"src = "../img/tipoHab1.jpg" alt = "Imagen habotación individual">
              <span class="textoDescripciones">
                  Habitaciones individuales, ideales para viajes de negocios o de relax. 
                  Dispone de todo lo necesario para descansar después de un día intenso. 
                  Capacidad máxima: una persona.
              </span> 
              <span class="textoDescripciones">
                  Descubra estas habitaciones modernas y funcionales, ideales para viajes 
                  de negocios o de relax. Puede elegir si quiere un dormitorio con vistas 
                  a la Rambla de Santa Cruz o bien si lo prefiere con vistas interiores para
                  una mayor tranquilidad. Dispone de todas las comodidades para
                  pasar una estancia inolvidable.
                  </ul>
              </span>
            </div>
            
             <div class="tituloTabla">
                <span class="spanTituloTabla">Habitaciones Dobles</span>
            </div>
            
            <div>
              <img class="imgHab"src = "../img/tipoHab2.jpg" alt = "Imagen habotación individual">
              <span class="textoDescripciones">
                  Disfrute de estas maravillosas habitaciones completamente equipadas 
                  de 20m2 con todo lo necesario para que su estancia sea perfecta. 
                  Todas ellas están totalmente insonorizadas para que pueda disponer 
                  del máximo confort y descanso. 
                  Además, puede solicitar habitaciones comunicadas si lo desea. 
              </span> 
              <span class="textoDescripciones">
                  Disfrute de la magnífica luz de Santa Cruz en nuestras confortables 
                  habitaciones de 20m2 decoradas con un estilo moderno y minimalista.
                  Desde su balcón o terraza, podrá contemplar la Rambla principal
                  o la unión de la ciudad con el mar. 
                  </ul>
              </span>
            </div>
        </div>
    </body>
</html>
