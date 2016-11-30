<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mi cuenta - Modificación de datos</title>
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
      if ( $_SESSION['logueadoUser'] == true){
      try {
          $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
      } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
      }
      $usuario = $_SESSION[nombreUser];
      $mensaje = "<div class='mensaje1'>
                  <span>Clave Actualizada. Vuelva a iniciar sesión.</span>
                  </div>";
      if($_POST[accion]=="actualizar"){
        $modificacion = "UPDATE cliente SET DNI=\"$_POST[DNI]\", "
            . "nombre=\"$_POST[nombre]\", apellido1=\"$_POST[apellido1]\", "
            . "apellido2=\"$_POST[apellido2]\""
            . " WHERE codCliente=\"$_POST[codCliente]\"";
        $conexion->exec($modificacion);
        header('Location: miCuenta.php');
      }
      
      if($_POST[accion]=="actConfirmado"){
        $modificacionClave = "UPDATE login SET clave=\"$_POST[clave]\" "
            . " WHERE usuario=\"$usuario\"";
        $conexion->exec($modificacionClave);
        header('Location: miCuenta.php?estado=logOut');
      }
      
     
      $sql = "SELECT * FROM login l , cliente c WHERE c.codCliente=l.codCliente AND "
        . "l.usuario = '$usuario' ";
      $consulta = $conexion->query($sql);

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
            if($_POST[accion]!="actClave"){
              if($consulta ->rowCount() > 0){
              ?>
              <table class="tablaHabitaciones">
                <th class="tablahabitacionesTh">Nombre</th>
                <th class="tablahabitacionesTh">Apellido1</th>
                <th class="tablahabitacionesTh">Apellido2</th>
                <th class="tablahabitacionesTh">DNI</th>
                <th class="tablahabitacionesTh">Modificar Datos</th>
                <?php
                  while ($hab = $consulta->fetchObject()) {
                ?>
                <tr>
                  <form name="actualizarDatosUsuario" action="actualizarDatosUsuario.php" method="POST">
                  <td>
                    <input type="text"  name="nombre" value="<?= $hab->nombre?>">
                  </td>
                  <td>
                    <input type="text"  name="apellido1" value="<?= $hab->apellido1?>">
                  </td>
                  <td>
                    <input type="text"  name="apellido2" value="<?= $hab->apellido2?>">
                  </td>
                  <td>
                   <input type="text"  name="DNI" value="<?= $hab->DNI?>">
                  </td>
                  <td>
                    <input type="hidden"  name="accion" value="actualizar">
                    <input type="hidden"  name="codCliente" value="<?= $hab->codCliente?>">
                    <input type="submit" class="btnEnvio2NoMargin" value="Modificar" /> 
                  </td>
                 </form>
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
           }else{
             ?>
             <table class="tablaHabitaciones">
                <th class="tablahabitacionesTh">usuario</th>
                <th class="tablahabitacionesTh">Clave</th>
                <th class="tablahabitacionesTh">Aceptar</th>
                <?php
                  while ($hab = $consulta->fetchObject()) {
                ?>
                <tr>
                  <form name="actualizarDatosUsuario" action="actualizarDatosUsuario.php" method="POST">
                  <td>
                    <input type="text"  name="usuario" value="<?= $hab->usuario?>">
                  </td>
                  <td>
                    <input type="password" name="clave" value="" placeholder="Nueva clave"> 
                  </td>
                  <td>
                    <input type="hidden"  name="accion" value="actConfirmado">
                    <input type="hidden"  name="codCliente" value="<?= $hab->codCliente?>">
                    <input type="submit" class="btnEnvio2NoMargin" value="aceptar" /> 
                  </td>
                 </form>
                </tr>
                <?php
                  }
                ?>
              </table>
            <?php
           }
            $conexion->close();
          }else{
            header("location:login.php");
          }
            ?>
        </div>
    </body>
</html>
