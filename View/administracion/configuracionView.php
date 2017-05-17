

<?= !empty($error) ? '<h3>' . $error . '</h3>' : '' ?>
<form action="../../Controller/administracion/configuracion.php" method="post">
  Servidor:<br>
  <input type="text" value="" name="server">
  <br>
  base de datos:<br>
  <input type="text" value="" name="db"><br>
  usuario:<br>
  <input type="text" value="" name="user"><br>
  Clave:<br>
  <input type="text" value="" name="password">
  <br><br>
  <input type="submit" value="Submit">
</form

