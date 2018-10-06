<!--
    Sistema de Información de Averías Viales de Guatemala
    Listado de Empleados
    Sábado, 22 de septiembre del 2018
    2:20 AM
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
            $_SESSION["PrivilegioUsuario"] == 'EncCovial') {
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
                                        <li><a href="ListarOrdenTrabajo.php">Listar Orden de Trabajo</a></li>
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
                                        <li><a href="#">Listado de empleados</a></li>
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
                                    <h1 class="text-center">Empleados registrados</h1>
                                </div>
                                <!-- Contenedor del ícono del Usuario -->
                                <div class="col-xs-5 Icon">
                                    <!-- Icono de usuario -->
                                    <span class="glyphicon glyphicon-user"></span>
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
                                                <th class="text-center">Nombres</th>
                                                <th class="text-center">Apellidos</th>
                                                <th class="text-center">Dirección</th>
                                                <th class="text-center">Teléfono</th>
                                                <th class="text-center">Precio por hora <br>
                                                    (Cifras en Quetzales)</th>
                                                <th class="text-center">Puesto</th>
                                                <th class="text-center">Editar</th>
                                                <th class="text-center">Habilitar/Deshabilitar</th>
                                            </tr>
                                        </thead>
                                        <!-- Cuerpo de la tabla -->
                                        <tbody class="buscar">
                                            <!-- Contenido de la tabla -->
                                            <!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
                                            <?php
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
                                                    <td>
                                                        <?php
                                                        if ($row['EstadoPersona'] == 'Activo') {
                                                            ?>
                                                            <!-- Edición activada-->
                                                            <div>
                                                                <div class="input-group input-group-lg">
                                                                    <button type="button" class="btn btn-success EditarPersona" value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else if ($row['EstadoPersona'] == 'Inactivo') {
                                                            ?>
                                                            <!-- Edición desactivada-->
                                                            <div>
                                                                <div class="input-group input-group-lg">
                                                                    <button type="button" class="btn btn-success EditarPersonaDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
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
        <div class="modal fade" id="ModalDeshabilitarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Deshabilitar empleado</h1></center>
                    </div>
                    <form method="post" action="Empleado.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea deshabilitar el siguiente empleado?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idEmpleadoDeshabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idEmpleadoDeshabilitar">
                                <br>
                                <label id="NombreEmpledoDeshabilitar" name="NombreEmpledoDeshabilitar"></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="DeshabilitarEmpleado" class="btn btn-warning" value="Deshabilitar empleado">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalHabilitarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Habilitar empleado</h1></center>
                    </div>
                    <form method="post" action="Empleado.php" id="myForm">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea habilitar la siguiente empleado?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idEmpleadoHabilitar" id="idEmpleadoHabilitar" style="width:350px; visibility:hidden;" class="form-control">
                                <br>
                                <label id="NombreEmpleadoHabilitar" name="NombreEmpleadoHabilitar"></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="HabilitarEmpleado" class="btn btn-success" value="Habilitar empleado">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalEditarEmpleado" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Editar empleado</h4></center>
                    </div>
                    <form method="post" action="Empleado.php" id="frmEdit">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">ID</span>
                                    <input type="text" style="width:350px;" class="form-control" name="idEditar" id="idEditar">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Nombre</span>
                                    <input type="text" style="width:350px;" class="form-control" name="NombrePersona" id="NombrePersona">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Apellido</span>
                                    <input type="text" style="width:350px;" class="form-control" name="ApellidoPersona" id="ApellidoPersona">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Direccion</span>
                                    <input type="text" style="width:350px;" class="form-control" name="DireccionPersona" id="DireccionPersona">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Teléfono</span>
                                    <input type="text" style="width:350px;" class="form-control" name="TelefonoPersona" id="TelefonoPersona">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Precio por hora</span>
                                    <input type="number" style="width:350px;" min="0" step="0.50" class="form-control" name="PrecioPorHora" id="PrecioPorHora">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Puesto</span>
                                    <select class="form-control" style="width:350px;" name="NombreTipoEmpleado" id="NombreTipoEmpleado">
                                        <option value="" disabled selected>Tipo de Empleado</option>
                                        <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                        <?php
                                        $VerUM = "SELECT * FROM TipoEmpleado;";
                                        // Hacemos la consulta
                                        $resultado = $mysqli->query($VerUM);
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            ?>
                                            <option value="<?php echo $row['idTipoEmpleado']; ?>"><?php echo $row['NombreTipoEmpleado'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            <input type="submit" name="EditarEmpleado" class="btn btn-success" value="Editar empleado">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <?php
        // Código que recibe la información del formulario modal (Deshabilitar)
        if (isset($_POST['DeshabilitarEmpleado'])) {
            // Guardamos el id en una variable
            $idPersona = $_POST['idEmpleadoDeshabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Persona SET EstadoPersona = 'Inactivo' WHERE idPersona=" . $idPersona . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Empleado deshabilitado\");\n";
                echo "</script>";
            }
        }
        // Código que recibe la información del formulario modal (Habilitar)
        if (isset($_POST['HabilitarEmpleado'])) {
            // Guardamos el id en una variable
            $idPersona = $_POST['idEmpleadoHabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Persona SET EstadoPersona = 'Activo' WHERE idPersona=" . $idPersona . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Empleado habilitado\");\n";
                echo "</script>";
            }
        }
        // Código que recibe la información del formulario modal (Editar)
        if (isset($_POST['EditarEmpleado'])) {
            // Guardamos la info en variables
            $idPersona = $_POST['idEditar'];
            $NombrePersona = $_POST['NombrePersona'];
            $ApellidoPersona = $_POST['ApellidoPersona'];
            $DireccionPersona = $_POST['DireccionPersona'];
            $TelefonoPersona = $_POST['TelefonoPersona'];
            $PrecioPorHora = $_POST['PrecioPorHora'];
            $idTipoEmpleado = $_POST['NombreTipoEmpleado'];

            if ($idTipoEmpleado == "") {
                $idTipoEmpleado = 1;
            }

            // Preparamos la consulta
            $query = "UPDATE Persona SET NombrePersona = '" . $NombrePersona . "',
                                                ApellidoPersona = '" . $ApellidoPersona . "',
                                                DireccionPersona = '" . $DireccionPersona . "',
                                                TelefonoPersona = '" . $TelefonoPersona . "',
                                                CostoXHoraPersona = " . $PrecioPorHora . ",
                                                idTipoEmpleado = " . $idTipoEmpleado . "
                                            WHERE idPersona=" . $idPersona . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Empleado editado correctamente\");\n";
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
