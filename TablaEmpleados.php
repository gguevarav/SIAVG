<!-- Contenido de la tabla -->
<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
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

        $VerEmpleado = "SELECT * FROM Persona";
// Hacemos la consulta
        $resultado = $mysqli->query($VerEmpleado);

        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><span id="idPersona<?php echo $row['idPersona']; ?>"><?php echo $row['idPersona'] ?></span></td>
                <td><span id="NombrePersona<?php echo $row['idPersona']; ?>"><?php echo $row['NombrePersona'] ?></span></td>
                <td><span id="ApellidoPersona<?php echo $row['idPersona']; ?>"><?php echo $row['ApellidoPersona'] ?></span></td>
                <td><span id="DireccionPersona<?php echo $row['idPersona']; ?>"><?php echo $row['DireccionPersona'] ?></span></td>
                <td><span id="TelefonoPersona<?php echo $row['idPersona']; ?>"><?php echo $row['TelefonoPersona'] ?></span></td>
                <td><span id="PrecioPorHora<?php echo $row['idPersona']; ?>"><?php echo $row['CostoXHoraPersona'] ?></span></td>
                <td><span id="Puesto<?php echo $row['idPersona']; ?>"><!-- Acá mostraremos el nombre del puesto a partir del id que se tiene en la tabla -->
                        <?php
                        $VerTipoEmpleado = "SELECT NombreTipoEmpleado FROM TipoEmpleado WHERE idTipoEmpleado='" . $row['idTipoEmpleado'] . "';";
                        // Hacemos la consulta
                        $ResultadoConsultaTipoEmpleado = $mysqli->query($VerTipoEmpleado);
                        $FilaResultadoTipoEmpleado = $ResultadoConsultaTipoEmpleado->fetch_assoc();
                        $NombrePuesto = $FilaResultadoTipoEmpleado['NombreTipoEmpleado'];
                        echo $NombrePuesto;
                        ?></span></td>

                <?php
                if ($row['EstadoPersona'] == 'Activo') {
                    ?>
                    <!-- Edición activada-->
                    <td>
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success EditarPersona" value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($row['EstadoPersona'] == 'Inactivo') {
                    ?>
                    <!-- Edición desactivada-->
                    <td>
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success EditarPersonaDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                }
                if ($row['EstadoPersona'] == 'Activo') {
                    ?>
                    <td>
                        <!-- Deshabilitación -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-warning DeshabilitarPersona"  value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($row['EstadoPersona'] == 'Inactivo') {
                    ?>
                    <td>
                        <!-- Habilitación -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success HabilitarPersona"  value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-check"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
    } else {
        echo "usuario no valido";
        header("location:login.php");
    }
} else {
//echo "usuario no valido";
    header("location:Empleado.php");
}
?>