<!--Contenido de la tabla -->
<!--Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
<?php
if (isset($_GET['SolicitarTabla'])) {
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
    // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
        // Guardamos el nombre del usuario en una variable
        $NombreUsuario = $_SESSION["NombreUsuario"];
        $idUsuario2 = $_SESSION["idUsuario"];

        // Primero hacemos la consulta en la tabla de persona
        // Si somos el superadministrador podremos editar nuestro usuario mientras no
        $VerPersonas = "SELECT * FROM persona WHERE NombrePersona!='Gemis Daniel'";
        // Hacemos la consulta
        $resultado = $mysqli->query($VerPersonas);
        // Correlativo para cada fila
        $Contador = 1;
        while ($row = mysqli_fetch_array($resultado)) {
            // Obtenemos el nombre de usuario y privilegio de cada persona
            // Primero haremos la consulta
            $VerUsuario = "SELECT * FROM usuario WHERE idPersona=" . $row['idPersona'] . "";
            // Ejecutamos la consulta
            $ResultadoConsultaUsuario = $mysqli->query($VerUsuario);
            // Guardamos la consulta en un array
            $ResultadoConsulta = $ResultadoConsultaUsuario->fetch_assoc();
            // Nombre de usuario
            $NombreDeUsuario = $ResultadoConsulta['NombreUsuario'];
            // Primero haremos la consulta
            $VerTipoEmpleado = "SELECT NombreTipoEmpleado FROM TipoEmpleado WHERE idTipoEmpleado=" . $row['idTipoEmpleado'] . "";
            // Ejecutamos la consulta
            $ResultadoConsultaTipoEmpleado = $mysqli->query($VerTipoEmpleado);
            // Guardamos la consulta en un array
            $ResultadoConsultaTipo = $ResultadoConsultaTipoEmpleado->fetch_assoc();
            // Privilegio de usuario
            $TipoDeEmpleado = $ResultadoConsultaTipo['NombreTipoEmpleado'];
            if ($NombreDeUsuario != "") {
                // NombreRol
                $idRol = $ResultadoConsulta['idRol'];
                // Primero haremos la consulta
                $VerNombreRol = "SELECT NombreRol FROM rol WHERE idRol=" . $idRol . ";";
                // Ejecutamos la consulta
                $ResultadoConsultaNombreRol = $mysqli->query($VerNombreRol);
                // Guardamos la consulta en un array
                $ResultadoConsultaRol = $ResultadoConsultaNombreRol->fetch_assoc();
                // Privilegio de usuario
                $NombreRol = $ResultadoConsultaRol['NombreRol'];
                ?>
                <tr>
                    <td><span id="idPersonaEliminar<?php echo $row['idPersona']; ?>"><?php echo $Contador ?></span></td>
                    <td><span id="idUsuario<?php echo $row['idPersona']; ?>"><?php echo $ResultadoConsulta['idUsuario'] ?></span></td>
                    <td><span id="NombrePersona<?php echo $row['idPersona']; ?>"><?php echo $row['NombrePersona'] ?></span></td>
                    <td><span id="ApellidoUsuario<?php echo $row['idPersona']; ?>"><?php echo $row['ApellidoPersona'] ?></span></td>
                    <td><span id="NombreUsuario<?php echo $row['idPersona']; ?>"><?php echo $NombreDeUsuario ?></span></td>
                    <td><span id="DireccionUsuario<?php echo $row['idPersona']; ?>"><?php echo $row['DireccionPersona'] ?></span></td>
                    <td><span id="Correo<?php echo $row['idPersona']; ?>"><?php echo $ResultadoConsulta['CorreoUsuario'] ?></span></td>
                    <td><span id="Municipalidad<?php echo $row['idPersona']; ?>">
                            <?php
                            $VerMunicipalidad = "SELECT NombreMunicipalidad FROM Municipalidad WHERE idMunicipalidad='" . $ResultadoConsulta['idMunicipalidad'] . "';";
                            // Hacemos la consulta
                            $ResultadoConsultaMunicipalidad = $mysqli->query($VerMunicipalidad);
                            $FilaResultadoMunicipalidad = $ResultadoConsultaMunicipalidad->fetch_assoc();
                            $NombreMunicipalidad = $FilaResultadoMunicipalidad['NombreMunicipalidad'];
                            echo $NombreMunicipalidad;
                            ?></span></td>
                    <td><span id="TelefonoUsuario<?php echo $row['idPersona']; ?>"><?php echo $row['TelefonoPersona'] ?></span></td>
                    <td><span id="TipoEmpleadoUsuario<?php echo $row['idPersona']; ?>"><?php echo $TipoDeEmpleado ?></span></td>
                    <td><span id="NombreRol<?php echo $row['idPersona']; ?>"><?php echo $NombreRol ?></span></td>
                    <td>
                        <?php
                        if ($row['EstadoPersona'] == 'Activo') {
                            ?>
                            <!-- Edición activada-->
                            <div>
                                <div class="input-group input-group-lg">
                                    <button type="button" class="btn btn-success CambiarRol" value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                                </div>
                            </div>
                            <?php
                        } else if ($row['EstadoPersona'] == 'Inactivo') {
                            ?>
                            <!-- Edición desactivada-->
                            <div>
                                <div class="input-group input-group-lg">
                                    <button type="button" class="btn btn-success CambiarRolDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($row['EstadoPersona'] == 'Activo') {
                            ?>
                            <!-- Edición activada-->
                            <div>
                                <div class="input-group input-group-lg">
                                    <button type="button" class="btn btn-success CambiarCorreo" value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                                </div>
                            </div>
                            <?php
                        } else if ($row['EstadoPersona'] == 'Inactivo') {
                            ?>
                            <!-- Edición desactivada-->
                            <div>
                                <div class="input-group input-group-lg">
                                    <button type="button" class="btn btn-success CambiarCorreoDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </td>
                    <?php
                    if ($row['EstadoPersona'] == 'Activo') {
                        ?>
                        <td>
                            <!-- Deshabilitación -->
                            <div>
                                <div class="input-group input-group-lg">
                                    <button type="button" class="btn btn-warning DeshabilitarUsuario"  value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
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
                                    <button type="button" class="btn btn-success HabilitarUsuario"  value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-check"></span></button>
                                </div>
                            </div>
                        </td>
                        <?php
                    }
                    $Contador++;
                    ?>
                </tr>
                <?php
            }
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