<!-- Contenido de la tabla -->
<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
<?php
if (isset($_GET['SolicitarTabla'])) {
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
    // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
        $_SESSION["PrivilegioUsuario"] == 'EncCovial') {
        // Guardamos el nombre del usuario en una variable
        $NombreUsuario = $_SESSION["NombreUsuario"];
        $idUsuario2 = $_SESSION["idUsuario"];

        $VerMateriales = "SELECT * FROM Material";
        // Hacemos la consulta
        $resultado = $mysqli->query($VerMateriales);
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><span id="idMaterial<?php echo $row['idMaterial']; ?>"><?php echo $row['idMaterial'] ?></span></td>
                <td><span id="CodigoMaterial<?php echo $row['idMaterial']; ?>"><?php echo $row['CodigoMaterial'] ?></span></td>
                <td><span id="NombreMaterial<?php echo $row['idMaterial']; ?>"><?php echo $row['NombreMaterial'] ?></span></td>
                <td><span id="UnidadMedida<?php echo $row['idMaterial']; ?>"><!-- Acá mostraremos el nombre de la persona a partir del id que se tiene en la tabla -->
                        <?php
                        $VerUM = "SELECT NombreUnidadMedida FROM UnidadMedida WHERE idUnidadMedida='" . $row['idUnidadMedida'] . "';";
                        // Hacemos la consulta
                        $ResultadoConsultaUM = $mysqli->query($VerUM);
                        $FilaResultadoUM = $ResultadoConsultaUM->fetch_assoc();
                        $NombreUM = $FilaResultadoUM['NombreUnidadMedida'];
                        echo $NombreUM;
                        ?></span></td>
                <td><span id="PrecioMaterial<?php echo $row['idMaterial']; ?>"><?php echo $row['PrecioxUnidad'] ?></span></td>
                <td><span id="EstadoMaterial<?php echo $row['idMaterial']; ?>"><?php echo $row['EstadoMaterial'] ?></span></td>
                <td>
                    <?php
                    if ($row['EstadoMaterial'] == 'Habilitado') {
                        ?>
                        <!-- Edición activada-->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success EditarMaterial" value="<?php echo $row['idMaterial']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                            </div>
                        </div>
                        <?php
                    } else if ($row['EstadoMaterial'] == 'Deshabilitado') {
                        ?>
                        <!-- Edición desactivada-->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success EditarMaterialDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </td>
                <?php
                if ($row['EstadoMaterial'] == 'Habilitado') {
                    ?>
                    <td>
                        <!-- Deshabilitación -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-warning DeshabilitarMaterial"  value="<?php echo $row['idMaterial']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($row['EstadoMaterial'] == 'Deshabilitado') {
                    ?>
                    <td>
                        <!-- Habilitación -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success HabilitarMaterial"  value="<?php echo $row['idMaterial']; ?>"><span class="glyphicon glyphicon-check"></span></button>
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
        //echo "usuario no valido";
        header("location:login.php");
    }
} else {
    //echo "usuario no valido";
    header("location:Material.php");
}
?>