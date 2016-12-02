<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mi cuenta - Actualización de datos</title>
        <link rel="stylesheet" type="text/css" href="../css/Cuerpo.css">
        <link rel="stylesheet" type="text/css" href="../css/Cabecera.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      if($_POST[accion]=="actualizar"){ //Actualiza los datos del cliente
        $modificacion = "UPDATE cliente SET DNI=\"$_POST[DNI]\", "
            . "nombre=\"$_POST[nombre]\", apellido1=\"$_POST[apellido1]\", "
            . "apellido2=\"$_POST[apellido2]\""
            . " WHERE codCliente=\"$_POST[codCliente]\"";
        $conexion->exec($modificacion);
        header('Location: miCuenta.php');
      }
      
      if($_POST[accion]=="actConfirmado"){ //Actualiza la clave del usuario
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
