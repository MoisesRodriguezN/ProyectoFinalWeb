<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($_SESSION['logueadoUser']){
          try {
            $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
          } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
          }

          $cliente = $conexion->query("SELECT * FROM cliente"); 
        
        ?>
        <form action="login.php" method="post">
          <input type="hidden"  name="codCliente" value="<?= $cliente->codCliente ?>">
          <button type="submit">Submit</button>
        </form>
      <?php
       }
      ?>
    </body>
</html>
