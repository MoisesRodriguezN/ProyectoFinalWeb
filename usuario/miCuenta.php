<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mi cuenta</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <style>
          .menu1{
              list-style-type: none;
              margin: 0;
              padding: 0;
              overflow: hidden;
              background: linear-gradient(to bottom, rgba(50,157,200,1) 0%, 
                  rgba(21,144,188,1) 27%,
                  rgba(18,112,140,1) 52%, rgba(50,157,200,1) 100%);
              font-family: 'Francois One', sans-serif;
              font-size: 1.2rem;
              width: 56%;
              border-radius: 10px;
              padding-left: 13%;
              margin: 2% 0 2% 20%;
          }

          .menu2{
              float: left;
          }

          .menu2 a {
              display: block;
              color: white;
              text-align: center;
              padding: 10px;
              text-decoration: none;
          }

          .menu2 a:hover {
              background: linear-gradient(to bottom, rgba(149,206,228,1) 0%,
                  rgba(81,194,236,1) 27%, rgba(27,165,208,1) 52%,
                  rgba(149,206,228,1) 100%);
          }
          
          .esquinaI a:hover {
              
              background: linear-gradient(to bottom, rgba(149,206,228,1) 0%,
                  rgba(81,194,236,1) 27%, rgba(27,165,208,1) 52%,
                  rgba(149,206,228,1) 100%);
               
              margin-left: -12px;
              padding-left: 21px;
              margin-right: 1px;
          }
          
          .esquinaD a:hover {
              
              background: linear-gradient(to bottom, rgba(149,206,228,1) 0%,
                  rgba(81,194,236,1) 27%, rgba(27,165,208,1) 52%,
                  rgba(149,206,228,1) 100%);
               
              padding-right: 20px;
          }
          
          .seleccionadoMenuUsuario{
            background: linear-gradient(to bottom, rgba(149,206,228,1) 0%,
                  rgba(81,194,236,1) 27%, rgba(27,165,208,1) 52%,
                  rgba(149,206,228,1) 100%);
          }
          
        </style>
    </head>
    <body class="fondoCuerpo">
      <?php
      try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
      } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
      }

      $usuario = $_SESSION[nombreUser];
      $sql = "SELECT * FROM login l , cliente c WHERE c.codCliente=l.codCliente AND "
        . "l.usuario = '$usuario' ";
      $consulta = $conexion->query($sql);

      $mensaje = "<div class='mensaje1'>
                  <span>Clave Actualizada. Vuelva a iniciar sesión.</span>
                  </div>";
      ?>
        <div class="cabecera">
            <div class="logoCabecera">
                <img src="../img/logoHotelHeader.png" class="imgLogoResponsive"> 
            </div>
            <div class="flex-container space-between">
              <a href="../index.php" class="flex-item"><p>INICIO <br>Bienvenidos</p></a>
              <a href="servicios.php" class="flex-item"><p>SERVICIOS <br>¿Que ofrecemos?</p></a>
              <a href="tiposHabitaciones.php" class="flex-item"><p>HABITACIONES <br>Tu comodidad</p></a>
              <a href="login.php" class="flex-item seleccionado"><p>MI CUENTA <br>Tus reservas</p></a>
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
           
            <ul class="menu1">
              <li class="menu2 esquinaI"><a href="miCuenta.php">Bienvenid@ <?=$usuario?></a></li>
              <li class="menu2"><a href="index.php">Mis reservas</a></li>
              <li class="menu2 seleccionadoMenuUsuario"><a href="miCuenta.php">Mi cuenta</a></li>
              <li class="menu2 esquinaD"><a href="logout.php">Cerrar sesión</a></li>
            </ul>

            <?php
            if($_GET[estado]=="logOut"){
              echo $mensaje;
              session_destroy();
            }
            if($consulta ->rowCount() > 0){
            ?>
            <table class="tablaHabitaciones">
              <th class="tablahabitacionesTh">Nombre</th>
              <th class="tablahabitacionesTh">Apellido1</th>
              <th class="tablahabitacionesTh">Apellido2</th>
              <th class="tablahabitacionesTh">DNI</th>
              <th class="tablahabitacionesTh">Usuario</th>
              <th class="tablahabitacionesTh">Modificar Datos</th>
              <th class="tablahabitacionesTh">Cambiar Clave</th>
              <?php
                while ($hab = $consulta->fetchObject()) {
              ?>
              <tr>
                <td>
                  <?= $hab->nombre?>
                </td>
                <td>
                  <?= $hab->apellido1?>
                </td>
                <td>
                  <?= $hab->apellido2?>
                </td>
                <td>
                  <?= $hab->DNI?>
                </td>
                <td>
                  <?= $hab->usuario?>
                </td>
                <td>
                  <form name="actualizarDatosUsuario" action="actualizarDatosUsuario.php" method="POST">
                    <input type="hidden"  name="nombre" value="<?= $hab->nombre?>">
                    <input type="hidden"  name="apellido1" value="<?= $hab->apellido1?>">
                    <input type="hidden"  name="apellido2" value="<?= $hab->apellido2?>">
                    <input type="hidden"  name="DNI" value="<?= $hab->DNI?>">
                    <input type="hidden"  name="usuario" value="<?= $hab->usuario?>">
                    <input type="submit" class="btnEnvio2NoMargin" value="Modificar" />
                  </form>
                </td>
                <td>
                  <form name="actualizarClaveUsuario" action="actualizarDatosUsuario.php" method="POST">
                    <input type="hidden"  name="usuario" value="<?= $hab->usuario?>">
                    <input type="hidden"  name="accion" value="actClave">
                    <input type="submit" class="btnEnvio2NoMargin" value="Cambiar" />
                  </form>
                </td>
              </tr>
              <?php
                }
              ?>
            </table>
            <?php
            }else{
              ?>
              <div class="mensaje1">
                  <span>No hay sesión iniciada</span>
                  <a class="spanTituloTabla2" href="logout.php">Iniciar sesión</a>
              </div>
              <?php
            }
            ?>
        </div>
    </body>
</html>
