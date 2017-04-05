<?php
session_start();
try {
  $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
} catch (PDOException $e) {
  echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
  die("Error: " . $e->getMessage());
}

$usuario = $_SESSION[nombreUser];

$sql = "SELECT * FROM login l , cliente c WHERE c.codCliente=l.codCliente AND "
  . "l.usuario = '$usuario' ";
$consulta = $conexion->query($sql);

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
          <td class="nombre">
            <?= $hab->nombre?>
          </td>
          <td class="apellido">
            <?= $hab->apellido1?>
          </td>
          <td class="apellido2">
            <?= $hab->apellido2?>
          </td>
          <td class="dni">
            <?= $hab->DNI?>
          </td>
          <td class="usuario">
            <?= $hab->usuario?>
          </td>
          <td>
            <input type="submit" class="btnEnvio2NoMargin" id="cambiarDatos" value="Modificar" />
          </td>
          <td>
            <input type="submit" class="btnEnvio2NoMargin" id="cambiarClave" value="Cambiar" />
          </td>
    </tr>
  <?php
    }
  }
  ?>
</table>
       