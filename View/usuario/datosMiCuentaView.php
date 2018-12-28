<?php
if ($numFilas > 0) {
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
        foreach ($data['datos'] as $user) {
            ?>
            <tr>
                <td class="nombre">
                    <?= $user->GetNombre() ?>
                </td>
                <td class="apellido">
                    <?= $user->GetApellido1() ?>
                </td>
                <td class="apellido2">
                    <?= $user->GetApellido2() ?>
                </td>
                <td class="dni">
                    <?= $user->getDni() ?>
                </td>
                <td class="usuario">
                    <?= $user->GetUsuario() ?>
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

