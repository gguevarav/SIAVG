<!--Contenido de la tabla -->
<!--Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
<?php
if (isset($_GET['SolicitarTabla'])) {
// Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
// Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'EncCovial') {
        // Guardamos el nombre del usuario en una variable
        $NombreUsuario = $_SESSION["NombreUsuario"];
        $idUsuario2 = $_SESSION["idUsuario"];

        $VerEquipo = "SELECT * FROM Equipo";
        // Hacemos la consulta
        $resultado = $mysqli->query($VerEquipo);
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><span id="idEquipo<?php echo $row['idEquipo']; ?>"><?php echo $row['idEquipo'] ?></span></td>
                <td><span id="CodigoEquipo<?php echo $row['idEquipo']; ?>"><?php echo $row['CodigoEquipo'] ?></span></td>
                <td><span id="NombreEquipo<?php echo $row['idEquipo']; ?>"><?php echo $row['NombreEquipo'] ?></span></td>
                <td><span id="CostoPorHora<?php echo $row['idEquipo']; ?>"><?php echo $row['CostoPorHora'] ?></span></td>
                <td><span id="EstadoEquipo<?php echo $row['idEquipo']; ?>"><?php echo $row['EstadoEquipo'] ?></span></td>
                <td>
                    <?php
                    if ($row['EstadoEquipo'] == 'Habilitado') {
                        ?>
                        <!-- Edición activada-->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success EditarEquipo" value="<?php echo $row['idEquipo']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                            </div>
                        </div>
                        <?php
                    } else if ($row['EstadoEquipo'] == 'Deshabilitado') {
                        ?>
                        <!-- Edición desactivada-->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success EditarEquipoDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </td>
                <?php
                if ($row['EstadoEquipo'] == 'Habilitado') {
                    ?>
                    <td>
                        <!-- Deshabilitación -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-warning DeshabilitarEquipo"  value="<?php echo $row['idEquipo']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($row['EstadoEquipo'] == 'Deshabilitado') {
                    ?>
                    <td>
                        <!-- Habilitación -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success HabilitarEquipo"  value="<?php echo $row['idEquipo']; ?>"><span class="glyphicon glyphicon-check"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }

        // De lo contrario lo redirigimos al inicio de sesión
    } else {
        //echo "usuario no valido";
        header("location:login.php");
    }
} else {
    //echo "usuario no valido";
    header("location:Equipo.php");
}
?>