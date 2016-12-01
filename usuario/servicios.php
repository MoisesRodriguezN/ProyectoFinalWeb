<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hotel Fuente Alegre - Servicios</title>
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
              <a href="tiposHabitaciones.php" class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></a>
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
                <a href="https://www.facebook.com/" target="_blank"><li><span id="elemento1"></span></li></a>
                <a href="https://plus.google.com/?hl=es" target="_blank"><li><span id="elemento2"></span></li></a>
                <a href="https://www.instagram.com/" target="_blank"><li><span id="elemento3"></span></li></a>
                <a href="https://twitter.com/?lang=es" target="_blank"><li><span id="elemento4"></span></li></a>
              </ul>
            </div> 
           
            <div class="tituloTabla">
                <span class="spanTituloTabla">Servicios</span>
            </div>
            
            <div>
              <img class="imgHab"src = "../img/restaurante1.jpg" alt = "Imagen habotación individual">
              <span class="textoDescripciones">
                  Descubre los innumerables detalles que nos diferencian de otros hoteles de lujo de Barcelona.
                  Degusta la alta cocina del Restaurante Barcelonas y tonifícate con los tratamientos de belleza 
                  de nuestro Spa by L'Occitane. Organiza tus eventos especiales en nuestras modernas salas de
                  reunión con la ayuda de nuestros expertos profesionales. 
              </span> 

            </div>
            
             <div class="tituloTabla limpiarFloat">
                <span class="spanTituloTabla">El comedor</span>
            </div>
            
            <div class="limpiarFloat">
              <img class="imgHab"src = "../img/comedor2.jpg" alt = "Imagen habotación individual">
              <span class="textoDescripciones">
              El comedor, con magníficas vistas, ofrece cocina nacional e internacional 
              y una amplia variedad de especialidades canarias que podrás degustar una 
              vez por semana. El hotel dispone de cafetería, restaurante buffet de oferta variada,
              cocina en vivo y dos bares, uno interior y otro en la piscina. Se requiere pantalón 
              largo para cenar en el restaurante.

              </span> 
            </div>
        </div>
    </body>
</html>
