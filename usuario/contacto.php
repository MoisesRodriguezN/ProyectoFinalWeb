<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Zona de usuario</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body class="fondoCuerpo">
      <?php
        if($_POST[accion]==enviar){
          $para      = "moises_rodiguez@hotmail.com";
          $titulo    = 'Contacto Hotel';
          $mensaje   = "Nombre: " . $_POST[nombre] . "apellido1: " . $_POST[apellido1] .
            "apellido2: " . $_POST[apellido2]. $_POST[comentario];
          $cabeceras = 'From: ' . $_POST[email] . "\r\n" .
              'Reply-To: ' . $_POST[email] . "\r\n" .
              'X-Mailer: PHP/' . phpversion();

         $bol = mail($para, $titulo, $mensaje, $cabeceras);
         
         if ($bol){
           $estado = "enviado";
         }else{
           $estado = "No enviado";
         }
        }
      ?>
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../img/logoHotelHeader.png" class="imgLogoResponsive"> 
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
           
            <div class="login-block marginLogin">
              <h1>Contacto</h1>
              <h2> <?=$estado?></h2>
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
