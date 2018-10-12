<!--
    Sistema de Información de Averías Viales de Guatemala
    Averías reportadas
    Viernes, 21 de septiembre del 2018
    01:05 AM
    f-Society
    -
    UMG - Morales Izabal
    -
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="imagenes/icono.ico">
        <title>Sistema de Información de Averías Viales de Guatemala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- vinculo a bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Toast-->
        <link rel="stylesheet" type="text/css" href="css/Toast.css">
        <script src="js/Toast.js"></script>
        <!-- Temas-->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <?php
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
        ?>
        <body>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid"> 
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="defaultNavbar1">
                        <ul class="nav navbar-nav">
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Equipos<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="Equipo.php">Listado de Equipos</a></li>
                                        <li><a href="RegistroEquipo.php">Registrar equipos</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Materiales<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="RegistroMaterial.php">Registrar Material</a></li>
                                        <li><a href="Material.php">Lista de Materiales</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de OT<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="CrearOrdenTrabajo.php">Crear Orden de Trabajo</a></li>
                                        <li><a href="#">Listar Orden de Trabajo</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de empleados<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="RegistroEmpleado.php">Crear empleado</a></li>
                                        <li><a href="Empleado.php">Listado de empleados</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de usuarios<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="CrearUsuario.php">Crear usuario</a></li>
                                        <li><a href="Usuario.php">Ver usuarios</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'EncMunicipal' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Solicitudes<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="ReporteAveria.php">Reportar una Avería</a></li>
                                        <li><a href="Averias.php">Ver averías reportadas por mí</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <!-- Acá mostramos el nombre del usuario -->
                                <a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><?php echo $NombreUsuario; ?></a></li>
                                    <?php
                                    if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                        ?>
                                        <li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo administrador</a></li>
                                        <?php
                                    }
                                    ?>
                                    <li><a href="AcercaDe.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Acerca de...</a></li>
                                    <li><a href="Seguridad/logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse --> 
                </div>
                <!-- /.container-fluid --> 
            </nav>
            <br>
            <br>
            <br>
            <div class="form-group">
                <div class="container">
                    <div class="row text-center">
                        <!-- Snackbar -->
                        <div id="snackbar"></div> 
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-5 col-xs-offset-1">
                                    <h1 class="text-center">Ordenes de trabajo generadas por mi</h1>
                                </div>
                                <!-- Contenedor del ícono del Usuario -->
                                <div class="col-xs-5 Icon">
                                    <!-- Icono de usuario -->
                                    <span class="glyphicon glyphicon-list"></span>
                                </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Buscar</span>
                                <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
                            </div>									
                            <br>
                            <br>
                            <div class="panel panel-primary">
                                <div class="table-responsive">          
                                    <table class="table table-hover table-striped">
                                        <!-- Título -->
                                        <thead>
                                            <!-- Contenido -->
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Código de avería</th>
                                                <th class="text-center">Fecha de creación</th>
                                                <th class="text-center">Costo total por personal</th>
                                                <th class="text-center">Costo total por equipo</th>
                                                <th class="text-center">Costo total por material</th>
                                                <th class="text-center">Costo total de la OT</th>
                                                <th class="text-center">Realizado por</th>
                                                <th class="text-center">Solicitado por</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Acción</th>
                                            </tr>
                                        </thead>
                                        <!-- Cuerpo de la tabla -->
                                        <tbody class="buscar">
                                            <!-- Contenido de la tabla -->
                                            <!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
                                            <?php
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>								
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalCancelarOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cancelar orden de trabajo</h1></center>
                    </div>
                    <form method="post" action="ListarOrdenTrabajo.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea cancelar esta orden de trabajo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idCancelar" style="width:350px; visibility:hidden;" class="form-control" id="idCancelar">
                                <input type="text" name="idAveriaCancelar" style="width:350px; visibility:hidden;" class="form-control" id="idAveriaCancelar">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="CancelarOT" class="btn btn-warning" value="Cancelar orden de trabajo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalEnProcesoOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cambio de estado de orden de trabajo</h1></center>
                    </div>
                    <form method="post" action="ListarOrdenTrabajo.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea cambiar el estado de esta orden de trabajo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idEnProceso" style="width:350px; visibility:hidden;" class="form-control" id="idEnProceso">
                                <input type="text" name="idAveriaEnProceso" style="width:350px; visibility:hidden;" class="form-control" id="idAveriaEnProceso">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="EnProcesoOT" class="btn btn-success" value="Iniciar trabajo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalCerrarOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cerrar la orden de trabajo</h1></center>
                    </div>
                    <form method="post" action="ListarOrdenTrabajo.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea cerrar esta orden de trabajo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idCerrar" style="width:350px; visibility:hidden;" class="form-control" id="idCerrar">
                                <input type="text" name="idAveriaCerrar" style="width:350px; visibility:hidden;" class="form-control" id="idAveriaCerrar">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="CerrarOT" class="btn btn-success" value="Cerrar OT">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <?php
        require("phpmailer/class.phpmailer.php"); //Importamos la función PHP class.phpmailer

        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False

        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;

        //Nuestra cuenta
        $mail->Username = 'noreply.siavg@gmail.com';
        $mail->Password = 'Sudo-aptget2018'; //Su password
        $mail->From = "noreply.siavg@gmail.com";
        $mail->FromName = "SIAVG";
        $mail->Subject = "Seguimiento de averia";

        $mail->WordWrap = 50;

        // Código que recibe la información del formulario modal (Deshabilitar)
        if (isset($_POST['CancelarOT'])) {            
            // Guardamos el id en una variable
            $idCancelar = $_POST['idCancelar'];
            $idAveriaCambiar = $_POST['idAveriaCancelar'];
            // Preparamos la consulta
            $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 2 WHERE idOrdenTrabajo=" . $idCancelar . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                // Preparamos la consulta, vamos a cambiar el estado de la Avería a solicitada
                $query = "UPDATE Averia SET idTrazabilidad = 1 WHERE idAveria=" . $idAveriaCambiar . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Orden de trabajo cancelada\");\n";
                    echo "</script>";
                }
            }
        }
        // Código que recibe la información del formulario modal (Orden de trabajo en proceso)
        if (isset($_POST['EnProcesoOT'])) {
            // Guardamos el id en una variable
            $idEnProceso = $_POST['idEnProceso'];
            
            // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
            $VeridUsuario = "SELECT idUsuario FROM Averia WHERE idAveria=" . $idEnProceso . ";";
            // Hacemos la consulta
            $ResultadoConsultaID = $mysqli->query($VeridUsuario);
            $FilaResultadoID = $ResultadoConsultaID->fetch_assoc();
            $idUsuarioObtenerCorreo = $FilaResultadoID['idUsuario'];

            // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
            $VerCorreoUsuario = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioObtenerCorreo . ";";
            // Hacemos la consulta
            $ResultadoConsultaCorreo = $mysqli->query($VerCorreoUsuario);
            $FilaResultadoCorreo = $ResultadoConsultaCorreo->fetch_assoc();
            $CorreoUsuarioReporta = $FilaResultadoCorreo['CorreoUsuario'];
            
            // Pasamos la dirección de correo
            $mail->AddAddress($CorreoUsuarioReporta, "Seguimiento de Averias");
            
            $idAveriaEnProceso = $_POST['idAveriaEnProceso'];
            // Preparamos la consulta
            $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 6 WHERE idOrdenTrabajo=" . $idEnProceso . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                // Preparamos la consulta, vamos a cambiar el estado de la Avería a solicitada
                $query = "UPDATE Averia SET idTrazabilidad = 6 WHERE idAveria=" . $idAveriaEnProceso . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Orden de trabajo en proceso\");\n";
                    echo "</script>";
                    // Enviamos el correo
                    $mail->msgHTML("<html>
                                    <head>
                                    <title>Reporte de seguimiento a avería</title>
                                    <style type='text/css'>
                                            #datos {
                                                    position:absolute;
                                                    width:780px;
                                                    left: 164px;
                                                    top: 316px;
                                                    text-align: center;
                                            }
                                            #apDiv1 #form1 table tr td {
                                                    text-align: center;
                                                    font-weight: bold;
                                            }
                                            #apDiv2 {
                                                    position:absolute;
                                                    width:49px;
                                                    height:45px;
                                                    z-index:2;
                                                    left: 12px;
                                                    top: 11px;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: center;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: left;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: center;
                                                    font-family: Arial, Helvetica, sans-serif;
                                            }
                                            #apDiv3 {
                                                    position:absolute;
                                                    width:833px;
                                                    height:115px;
                                                    z-index:1;
                                                    left: 99px;
                                                    text-align: center;
                                                    top: 16px;
                                            }
                                    </style>
                                    </head>
                                    <body>
                                        <div id='apDiv3'>
                                            <h1>Su solicitud No. " . $idAveriaEnProceso . ", con numero de OT No. " . $idEnProceso . " se encuenta en proceso de ejecucion</h2>
                                        </div>								
                                    </body>
                                    </html>");

                    // Notificamos al usuario del estado del mensaje

                    if (!$mail->Send()) {
                        //echo "No se pudo enviar el Mensaje.";
                    } else {
                        //echo "Mensaje enviado";
                    }
                }
            }
        }
        // Código que recibe la información del formulario modal (Cerrar OT)
        if (isset($_POST['CerrarOT'])) {
            // Guardamos el id en una variable
            $idCerrar = $_POST['idCerrar'];
            
            // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
            $VeridUsuario = "SELECT idUsuario FROM Averia WHERE idAveria=" . $idCerrar . ";";
            // Hacemos la consulta
            $ResultadoConsultaID = $mysqli->query($VeridUsuario);
            $FilaResultadoID = $ResultadoConsultaID->fetch_assoc();
            $idUsuarioObtenerCorreo = $FilaResultadoID['idUsuario'];

            // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
            $VerCorreoUsuario = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioObtenerCorreo . ";";
            // Hacemos la consulta
            $ResultadoConsultaCorreo = $mysqli->query($VerCorreoUsuario);
            $FilaResultadoCorreo = $ResultadoConsultaCorreo->fetch_assoc();
            $CorreoUsuarioReporta = $FilaResultadoCorreo['CorreoUsuario'];
            
            // Pasamos la dirección de correo
            $mail->AddAddress($CorreoUsuarioReporta, "Seguimiento de Averias");
            
            $idAveriaCerrar = $_POST['idAveriaCerrar'];
            // Preparamos la consulta
            $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 7 WHERE idOrdenTrabajo=" . $idCerrar . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                // Preparamos la consulta, vamos a cambiar el estado de la Avería a solicitada
                $query = "UPDATE Averia SET idTrazabilidad = 7 WHERE idAveria=" . $idAveriaCerrar . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Orden de trabajo finalizada\");\n";
                    echo "</script>";
                    // Enviamos el correo
                    $mail->msgHTML("<html>
                                    <head>
                                    <title>Reporte de seguimiento a avería</title>
                                    <style type='text/css'>
                                            #datos {
                                                    position:absolute;
                                                    width:780px;
                                                    left: 164px;
                                                    top: 316px;
                                                    text-align: center;
                                            }
                                            #apDiv1 #form1 table tr td {
                                                    text-align: center;
                                                    font-weight: bold;
                                            }
                                            #apDiv2 {
                                                    position:absolute;
                                                    width:49px;
                                                    height:45px;
                                                    z-index:2;
                                                    left: 12px;
                                                    top: 11px;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: center;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: left;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: center;
                                                    font-family: Arial, Helvetica, sans-serif;
                                            }
                                            #apDiv3 {
                                                    position:absolute;
                                                    width:833px;
                                                    height:115px;
                                                    z-index:1;
                                                    left: 99px;
                                                    text-align: center;
                                                    top: 16px;
                                            }
                                    </style>
                                    </head>
                                    <body>
                                        <div id='apDiv3'>
                                            <h1>Se finalizo su solicitud No. " . $idAveriaCerrar . ", con numero de OT No. " . $idCerrar . ".</h2>
                                        </div>								
                                    </body>
                                    </html>");

                    // Notificamos al usuario del estado del mensaje

                    if (!$mail->Send()) {
                        //echo "No se pudo enviar el Mensaje.";
                    } else {
                        //echo "Mensaje enviado";
                    }
                }
            }
        }
        ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery-1.11.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="js/bootstrap.js"></script>
        <!-- Pie de página, se utilizará el mismo para todos. -->
        <!-- Incluimos el script que nos dará el nombre de la persona para mostrarlo en el modal -->
        <script src="js/Modal.js"></script>
        <footer>
            <hr>
            <div class="row">
                <div class="text-center col-md-6 col-md-offset-3">
                    <h4>Sistema de Información de Averías Viales de Guatemala</h4>
                    <p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="https://www.umg.edu.gt/" >f-Society</a></p>
                </div>
            </div>
            <hr>
        </footer> 
    </body>
    <?php
    // De lo contrario lo redirigimos al inicio de sesión
} else {
    echo "usuario no valido";
    header("location:login.php");
}
?>
</html>
