<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hotel Fuentealegre - Contacto</title>
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
                <a href="servicios.php" class="flex-item"><p>SERVICIOS <br>¿Que ofrecemos?</p></a>
                <a href="tiposHabitaciones.php" class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></a>
                <a href="login.php" class="flex-item"><p>MI CUENTA <br>Tus reservas</p></a>
                <a href="contacto.php" class="flex-item seleccionado"><p>CONTACTO <br>Escribenos!</p></a>
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
                <span class="texto3D3"><?= $nombreHotel->nombreHotel?></span>
            </div>
            <div class="redesSociales">
                <ul class="listaSocial">
                    <a href="https://www.facebook.com/" target="_blank"><li><span id="elemento1"></span></li></a>
                    <a href="https://plus.google.com/?hl=es" target="_blank"><li><span id="elemento2"></span></li></a>
                    <a href="https://www.instagram.com/" target="_blank"><li><span id="elemento3"></span></li></a>
                    <a href="https://twitter.com/?lang=es" target="_blank"><li><span id="elemento4"></span></li></a>
                </ul>
            </div> 

            <div class="login-block marginLogin">
                <h1>Contacto</h1>
                <h2> <?= $estado ?></h2>
                <form action="contacto.php" method="post">
                    <input type="hidden" name="accion" value="enviar"/>
                    <input type="text" name="nombre" required placeholder="Nombre" autofocus/>
                    <input type="text" name="apellido1" required placeholder="Apellido 1"/>
                    <input type="text" name="apellido2" required placeholder="Apellido 2"/>
                    <input type="email" name="email" required placeholder="Email"/>
                    <textarea rows="4" cols="37" name="comentario" placeholder="Comentario" ></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </body>
</html>
