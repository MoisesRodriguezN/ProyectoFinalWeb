<?php
  session_start(); // Inicio de sesión
?>
<?php
  if ( $_SESSION['logueadoAdmin'] == true){
    try {
      $conexion = new PDO("mysql:host=localhost;dbname=hotel;charset=utf8", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
    }
    $insercion = "INSERT INTO cliente (codCliente, DNI, nombre, apellido1, "
      . "apellido2) VALUES ('$_POST[codCliente]',"
      . "'$_POST[dni]','$_POST[nombre]' ,'$_POST[apellido1]' ,"
      . "'$_POST[apellido2]')";
    
    $dni = $_POST[dni];
    $conexion->exec($insercion);
    
    $consulta3  = $conexion->query("SELECT codCliente FROM cliente WHERE dni = '$dni'");
    $cliente = $consulta3->fetchObject();
   
    $insercion2 = "INSERT INTO login (usuario, clave, rol, codCliente) VALUES ('$_POST[usuario]',"
      . "'$_POST[clave]','usuario' ,'$cliente->codCliente')";
    $conexion->exec($insercion2);
    include "./listaClientes.php";

  }else{
    echo "Debes iniciar sesión para poder entrar en esta zona";
    header("location:login.php");
  }
    ?>