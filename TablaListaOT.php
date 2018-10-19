<!--Contenido de la tabla -->
<!--Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
<?php
if (isset($_GET['SolicitarTabla'])) {
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
    // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
            $_SESSION["PrivilegioUsuario"] == 'Administrador') {
        // Guardamos el nombre del usuario en una variable
        $NombreUsuario = $_SESSION["NombreUsuario"];
        $idUsuario2 = $_SESSION["idUsuario"];
        
        $ListadoOT = "SELECT * FROM Ordentrabajo";
        // Hacemos la consulta
        $resultado = $mysqli->query($ListadoOT);
        $Contador = 1;
        while ($row = mysqli_fetch_array($resultado)) {
            //if ($row['idUsuario'] == $idUsuario2) {
            ?>
            <tr>
                <td><span id="Correlativo<?php echo $Contador; ?>"><?php echo $Contador ?></span></td>
                <td><span id="Codigo<?php echo $row['idOrdenTrabajo']; ?>"><?php echo $row['idOrdenTrabajo'] ?></span></td>
                <td><span id="CodigoAveria<?php echo $row['idOrdenTrabajo']; ?>"><?php echo $row['idAveria'] ?></span></td>
                <td><span id="FechaCreacion<?php echo $row['idOrdenTrabajo']; ?>"><?php echo $row['FechaOrdenTrabajo'] ?></span></td>
                <td><span id="TotalPersonal<?php echo $row['idOrdenTrabajo']; ?>"><?php echo $row['CostoPersonalOrdenTrabajo'] ?></span></td>
                <td><span id="TotalEquipo<?php echo $row['idOrdenTrabajo']; ?>"><?php echo $row['CostoEquipoOrdenTrabajo'] ?></span></td>
                <td><span id="TotalMaterial<?php echo $row['idOrdenTrabajo']; ?>"><?php echo $row['CostoMaterialOrdenTrabajo'] ?></span></td>
                <td><span id="TotalMaterial<?php echo $row['idOrdenTrabajo']; ?>"><?php echo $row['CostoTotalOrdenTrabajo'] ?></span></td>
                <td><span id="RealizadoPor<?php echo $row['idOrdenTrabajo']; ?>"><?php
                        $VerNombreRealizado = "SELECT NombreUsuario FROM usuario WHERE idUsuario=" . $row['EncargadoCovial'] . ";";
                        // Hacemos la consulta
                        $ResultadoConsultaNombreRealizado = $mysqli->query($VerNombreRealizado);
                        $FilaResultadoNombreRea = $ResultadoConsultaNombreRealizado->fetch_assoc();
                        $NombreUsuarioRealizado = $FilaResultadoNombreRea['NombreUsuario'];
                        echo $NombreUsuarioRealizado;
                        ?></span></td>
                <td><span id="SolicitadoPor<?php echo $row['idOrdenTrabajo']; ?>"><?php
                        $VerNombreSolicitado = "SELECT NombreUsuario FROM usuario WHERE idUsuario=" . $row['EncargadoMunicipal'] . ";";
                        // Hacemos la consulta
                        $ResultadoConsultaNombreSolicitado = $mysqli->query($VerNombreSolicitado);
                        $FilaResultadoNombreSoli = $ResultadoConsultaNombreSolicitado->fetch_assoc();
                        $NombreUsuarioSolicitado = $FilaResultadoNombreSoli['NombreUsuario'];
                        echo $NombreUsuarioSolicitado;
                        ?></span></td>
                <td><span id="idTrazabilidad<?php echo $row['idAveria']; ?>">
                        <?php
                        $VerNombreTrazabilidad = "SELECT NombreTrazabilidad FROM Trazabilidad WHERE idTrazabilidad=" . $row['idTrazabilidad'] . ";";
                        // Hacemos la consulta
                        $ResultadoConsultaNombreTrazabilidad = $mysqli->query($VerNombreTrazabilidad);
                        $FilaResultadoNombreTrazabilidad = $ResultadoConsultaNombreTrazabilidad->fetch_assoc();
                        $NombreTrazabilidad = $FilaResultadoNombreTrazabilidad['NombreTrazabilidad'];
                        echo $NombreTrazabilidad;
                        ?></span></td>
                <?php
                if ($NombreTrazabilidad == "Cotizada") {
                    ?>
                    <td>
                        <!-- Habilitación -->
                        <div>
                            <div class="input-group input-group-lg">
                                <form method="get" action="GenerarOTPDF.php">
                                    <input type="hidden" name="idOrdenTrabajo" value="<?php echo $row['idAveria'] ?>" />
                                    <input type="submit" class="btn btn-primary" class="btn" value="Ver Cotización">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Cancelar OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-danger CancelarOT"  value="<?php echo $row['idOrdenTrabajo']; ?>"><span class="glyphicon glyphicon-remove"></span> Cancelar OT</button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($NombreTrazabilidad == "Cotizada") {
                    ?>
                    <td>
                        <!-- Habilitar OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success HabilitarOT"  value="<?php echo $row['idOrdenTrabajo']; ?>"><span class="glyphicon glyphicon-check"></span></button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($NombreTrazabilidad == "Aprobada") {
                    ?>
                    <td>
                        <!-- Ver OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <form method="get" action="GenerarOTPDF.php">
                                    <input type="hidden" name="idOrdenTrabajo" value="<?php echo $row['idAveria'] ?>" />
                                    <input type="submit" class="btn btn-primary" class="btn" value="Ver Cotización">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- En Proceso OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success CambiarAEnProcesoOT"  value="<?php echo $row['idOrdenTrabajo']; ?>"><span class="glyphicon glyphicon-play"></span>Iniciar trabajo</button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($NombreTrazabilidad == "En Proceso") {
                    ?>
                    <td>
                        <!-- Ver OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <form method="get" action="GenerarOTPDF.php">
                                    <input type="hidden" name="idOrdenTrabajo" value="<?php echo $row['idAveria'] ?>" />
                                    <input type="submit" class="btn btn-primary" class="btn" value="Ver Cotización">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Finalizar OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <button type="button" class="btn btn-success FinalizarOT"  value="<?php echo $row['idOrdenTrabajo']; ?>"><span class="glyphicon glyphicon-thumbs-up"></span>CerrarOT</button>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($NombreTrazabilidad == "Rechazada") {
                    ?>
                    <td>
                        <!-- Ver OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <form method="get" action="GenerarOTPDF.php">
                                    <input type="hidden" name="idOrdenTrabajo" value="<?php echo $row['idAveria'] ?>" />
                                    <input type="submit" class="btn btn-primary" class="btn" value="Ver Cotización">
                                </form>
                            </div>
                        </div>
                    </td>
                    <?php
                } else if ($NombreTrazabilidad == "Finalizada") {
                    ?>
                    <td>
                        <!-- Ver OT -->
                        <div>
                            <div class="input-group input-group-lg">
                                <form method="get" action="GenerarOTPDF.php">
                                    <input type="hidden" name="idOrdenTrabajo" value="<?php echo $row['idAveria'] ?>" />
                                    <input type="submit" class="btn btn-primary" class="btn" value="Ver Cotización">
                                </form>
                            </div>
                        </div>
                    </td>
                    <?php
                }
                $Contador++;
            }
            ?>
        </tr>
        <?php
    } else {
        echo "usuario no valido";
        header("location:login.php");
    }
} else {
    //echo "usuario no valido";
    header("location:ListarOrdenTrabajo.php");
}
?>