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
    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
            $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
            $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
            $_SESSION["PrivilegioUsuario"] == 'Tesorero') {
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
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Equipos<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                            $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                            $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                            $_SESSION["PrivilegioUsuario"] == 'Tesorero') {
                                        ?>
                                        <li><a href="RegistroEquipo.php">Registrar equipos</a></li>
                                        <li><a href="Equipo.php">Listado de Equipos</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Tesorero') {
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
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de OT<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Crear Orden de Trabajo</a></li>
                                        <li><a href="ListarOrdenTrabajo.php">Listar Orden de Trabajo</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
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
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
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
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
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
                                    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
                                        ?>
                                        <li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo adminstrador</a></li>
                                        <li><a href="JuntaOficiales.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Modificar junta oficiales</a></li>
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
                                <div class="col-xs-5">
                                    <h1 class="text-center">Reportes en cola</h1>
                                </div>
                                <!-- Contenedor del ícono del Usuario -->
                                <div class="col-xs-5 Icon">
                                    <!-- Icono de usuario -->
                                    <span class="glyphicon glyphicon-asterisk"></span>
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
                                                <th>#</th>
                                                <th>Código</th>
                                                <th>Fecha de reporte</th>
                                                <th>Ubicación</th>
                                                <th>Fotografías</th>
                                                <th>Prioridad</th>
                                                <th>Urgencia</th>
                                                <th>Tamaño</th>
                                                <th>Estado</th>
                                                <th>Generar OT</th>
                                            </tr>
                                        </thead>
                                        <!-- Cuerpo de la tabla -->
                                        <tbody class="buscar">
                                            <!-- Contenido de la tabla -->
                                            <!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
                                            <?php
                                            $ListadoAverias = "SELECT * FROM Averia";
                                            // Hacemos la consulta
                                            $resultado = $mysqli->query($ListadoAverias);
                                            $Contador = 1;
                                            while ($row = mysqli_fetch_array($resultado)) {
                                                if ($row['idUsuario'] == $idUsuario2) {
                                                    ?>
                                                    <tr>
                                                        <td><span id="Correlativo<?php echo $Contador; ?>"><?php echo $Contador ?></span></td>
                                                        <td><span id="Codigo<?php echo $row['idAveria']; ?>"><?php echo $row['idAveria'] ?></span></td>
                                                        <td><span id="FechaReporteAveria<?php echo $row['idAveria']; ?>"><?php echo $row['FechaReporteAveria'] ?></span></td>
                                                        <td><span id="UbicacionAveria<?php echo $row['idAveria']; ?>"><a href="https://maps.google.com/?ll=<?php echo $row['UbicacionAveria'] ?>&z=18&t=k" >Ir</a></span></td>
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
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                    $Contador++;
                                                }
                                            }
                                            ?>
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
        <div class="modal fade" id="ModalCancelarAveria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cancelar reporte</h1></center>
                    </div>
                    <form method="post" action="Averias.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea cancelar este reporte?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idAEliminar" style="width:350px; visibility:hidden;" class="form-control" id="idAEliminar">
                                <br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="CancelarReporte" class="btn btn-warning" value="Cancelar Reporte">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <?php
        // Código que recibe la información del formulario modal (Deshabilitar)
        if (isset($_POST['CancelarReporte'])) {
            // Guardamos el id en una variable
            $idAEliminar = $_POST['idAEliminar'];
            // Preparamos la consulta
            $query = "UPDATE Averia SET idTrazabilidad = 2 WHERE idAveria=" . $idAEliminar . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Reporte cancelado\");\n";
                echo "</script>";
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