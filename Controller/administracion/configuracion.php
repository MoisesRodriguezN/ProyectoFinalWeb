<?php

$server = $_POST['server'];
$db = $_POST['db'];
$user = $_POST['user'];
$password = $_POST['password'];

if (!empty($server) && !empty($db) && !empty($user) && isset($password)) {
    if (!file_exists("../../Model/bbdd.php")) {

        $connection = NULL;
        try {
            $connection = new PDO("mysql:host=" . $server . ";dbname=" . $db . ";charset=utf8", $user, $password);
        } catch (PDOException $e) {
            $error = "Los datos de conexión son incorrectos.";
            include_once '../../View/administracion/configuracionView.php';
            exit();
        }

        $fichero = fopen("../../Model/bbdd.php", "w") or die("Unable to open file!");
        fwrite($fichero, "<?php\n");
        fwrite($fichero, "define('SERVER', '" . $server . "');\n");
        fwrite($fichero, "define('DB', '" . $db . "');\n");
        fwrite($fichero, "define('USER', '" . $user . "');\n");
        fwrite($fichero, "define('PASSWORD', '" . $password . "');\n");
        fclose($fichero);

        try {

            $sql = file_get_contents("../../Model/hotel.sql");

            $stmt = $connection->prepare($sql2);
            $stmt->execute();
            
            $file = "../../Model/hotel.sql";
            if (!unlink($file)) {
              die("Error borrando $file");
             }
            
        } catch (PDOException $e) {
            $error = "No se han podido crear las tablas.";
            include_once '../../View/administracion/configuracionView.php';
            exit();
        }
    }
    header("location:../index.php");
} else {
    include_once '../../View/administracion/configuracionView.php';
}



