<!--Contenido de la tabla -->
<!--Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
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

        $ListadoAverias = "SELECT * FROM Averia";
        // Hacemos la consulta
        $resultado = $mysqli->query($ListadoAverias);
        $Contador = 1;
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><span id="Correlativo<?php echo $Contador; ?>"><?php echo $Contador ?></span></td>
                <td><span id="Codigo<?php echo $row['idAveria']; ?>"><?php echo $row['idAveria'] ?></span></td>
                <td><span id="FechaReporteAveria<?php echo $row['idAveria']; ?>"><?php echo $row['FechaReporteAveria'] ?></span></td>
                <td><span id="Municipalidad<?php echo $row['idAveria']; ?>">
                        <?php
                        $VerMunicipalidad = "SELECT NombreMunicipalidad FROM Municipalidad WHERE idMunicipalidad=" . $row['idMunicipalidad'] . ";";
                        // Hacemos la consulta
                        $ResultadoConsultaMunicipalidad = $mysqli->query($VerMunicipalidad);
                        $FilaResultadoNombreMunicipalidad = $ResultadoConsultaMunicipalidad->fetch_assoc();
                        $NombreMunicipalidad = $FilaResultadoNombreMunicipalidad['NombreMunicipalidad'];
                        echo $NombreMunicipalidad;
                        ?></span></td>
                <td><span id="UbicacionAveria<?php echo $row['idAveria']; ?>"><a href="https://maps.google.com/?ll=<?php echo $row['UbicacionAveria'] ?>&z=18&t=k" target="_blank">Ver ubicación</a></span></td>
                <td><span id="ImagenAveria<?php echo $row['idAveria']; ?>">
                        <form method="post" action="VerFotos.php">
                            <input type="hidden" name="Path" value="<?php echo $row['ImagenAveria'] ?>" />
                            <input type="submit" name="VerFotos" class="btn" value="Ver fotos">
                        </form>
                    </span></td>
                <td><span id="idPrioridad<?php echo $row['idAveria']; ?>">
                        <?php
                        $VerNombrePrioridad = "SELECT NombrePrioridad FROM Prioridad WHERE idPrioridad='" . $row['idPrioridad'] . "';";
                        // Hacemos la consulta
                        $ResultadoConsultaNombrePrioridad = $mysqli->query($VerNombrePrioridad);
                        $FilaResultadoNombrePrioridad = $ResultadoConsultaNombrePrioridad->fetch_assoc();
                        $NombrePrioridad = $FilaResultadoNombrePrioridad['NombrePrioridad'];
                        echo $NombrePrioridad;
                        ?></span></td>
                <td><span id="idUrgencia<?php echo $row['idAveria']; ?>">
                        <?php
                        $VerNombreUrgencia = "SELECT NombreUrgencia FROM Urgencia WHERE idUrgencia='" . $row['idUrgencia'] . "';";
                        // Hacemos la consulta
                        $ResultadoConsultaNombreUrgencia = $mysqli->query($VerNombreUrgencia);
                        $FilaResultadoNombreUrgencia = $ResultadoConsultaNombreUrgencia->fetch_assoc();
                        $NombreUrgencia = $FilaResultadoNombreUrgencia['NombreUrgencia'];
                        echo $NombreUrgencia;
                        ?></span></td>
                <td><span id="idTamanio<?php echo $row['idAveria']; ?>">
                        <?php
                        $VerNombreTamanio = "SELECT NombreTamanio FROM Tamanio WHERE idTamanio='" . $row['idTamanio'] . "';";
                        // Hacemos la consulta
                        $ResultadoConsultaNombreTamanio = $mysqli->query($VerNombreTamanio);
                        $FilaResultadoNombreTamanio = $ResultadoConsultaNombreTamanio->fetch_assoc();
                        $NombreTamanio = $FilaResultadoNombreTamanio['NombreTamanio'];
                        echo $NombreTamanio;
                        ?></span></td>
                <td><span id="idTrazabilidad<?php echo $row['idAveria']; ?>">
                        <?php
                        $VerNombreTrazabilidad = "SELECT NombreTrazabilidad FROM Trazabilidad WHERE idTrazabilidad='" . $row['idTrazabilidad'] . "';";
                        // Hacemos la consulta
                        $ResultadoConsultaNombreTrazabilidad = $mysqli->query($VerNombreTrazabilidad);
                        $FilaResultadoNombreTrazabilidad = $ResultadoConsultaNombreTrazabilidad->fetch_assoc();
                        $NombreTrazabilidad = $FilaResultadoNombreTrazabilidad['NombreTrazabilidad'];
                        echo $NombreTrazabilidad;
                        ?></span></td>
                <?php
                if ($row['idTrazabilidad'] == 1) {
                    ?>
                    <td>
                        <!-- GenerarOT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <form method="post" action="GenerarOT.php">
                                    <input type="hidden" name="idAveria" value="<?php echo $row['idAveria']; ?>" />
                                    <input type="submit" name="GenerarOT" class="btn btn-success GenerarOT" value="+">
                                </form>
                            </div>
                        </div>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <!-- GenerarOT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <form method="post" action="GenerarOT.php">
                                    <input type="hidden" name="idAveria" value="<?php echo $row['idAveria']; ?>" />
                                    <input type="submit" name="GenerarOT" class="btn btn-success" disabled="true" value="+">
                                </form>
                            </div>
                        </div>
                    </td>
                    <?php
                    ?>
                </tr>
                <?php
                $Contador++;
            }
        }
    } else {
        echo "usuario no valido";
        header("location:login.php");
    }
} else {
    echo "usuario no valido";
    header("location:CrearOrdenTrabajo.php");
}
?>