<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?= $nombreHotel->nombreHotel?> - Confirmar reserva</title>
        <link rel="stylesheet" type="text/css" href="../../View/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="fondoCuerpo">

        <div class="logo"><img class="logo" src="../../View/img/uploads/<?=$logo->nombre?>"></div>
        <div class="login-block">
            <h1>Confirmar reserva</h1>
            <?= $error ?>

            <?php
            foreach ($data['datos'] as $datosUser) {
                ?>
                <form action="reservaConfirmada.php" name="confirmarReserva" method="POST">
                    <input type="hidden"  name="codHabitacion" value="<?= $codHabitacion ?>">
                    <input type="hidden"  name="codCliente" value="<?= $datosUser->GetCodCliente() ?>">
                    <input type="hidden"  name="probando2" value="test2">
                    <input type="text"  name="dni" value="<?= $datosUser->GetDNI() ?>" readonly>
                    <input type="text"  name="nombre" value="<?= $datosUser->GetNombre() ?>" readonly>
                    <input type="text"  name="apellido1" value="<?= $datosUser->GetApellido1() ?>" readonly>
                    <input type="text"  name="apellido2" value="<?= $datosUser->GetApellido2() ?>" readonly>
                    <input type="text"  name="fechaEntrada"  value="<?= $fechaEntrada ?>" readonly>
                    <input type="text"  name="fechaSalida" value="<?= $fechaSalida ?>" readonly>
                    <button type="submit">Confirmar</button>
                </form>
                <?php
            }
            ?>
        </div>

    </body>
</html>