<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hotel Fuente Alegre - Servicios</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

        <div class="contenedor">
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
                <img class="imgHab"src = "../../View/img/restaurante1.jpg" alt = "Imagen habitación individual">
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
                <img class="imgHab"src = "../../View/img/comedor2.jpg" alt = "Imagen habitación individual">
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
