<!--
    Sistema de Información de Averías Viales de Guatemala
    Listado de Materiales
    Miércoles, 06 de septiembre del 2018
    13:18 PM
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
                                        <li><a href="Equipo.php">Listado de Equipos</a></li>
                                        <li><a href="RegistroEquipo.php">Registrar equipos</a></li>
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
                                        <li><a href="#">Lista de Materiales</a></li>
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
                                        <li><a href="CrearOrdenTrabajo.php">Crear Orden de Trabajo</a></li>
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
                                    <h1 class="text-center">Materiales registrados</h1>
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
                                                <th class="text-center">#</th>
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">UM</th>
                                                <th class="text-center">Precio<br>
                                                                        Cifras en Quetzales</th>
                                                <th class="text-center">Estado del Material</th>
                                                <th class="text-center">Editar</th>
                                                <th class="text-center">Habilitar/Deshabilitar</th>
                                            </tr>
                                        </thead>
                                        <!-- Cuerpo de la tabla -->
                                        <tbody class="buscar">
                                            <!-- Contenido de la tabla -->
                                            <!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
                                            <?php
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
        <div class="modal fade" id="ModalDeshabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Deshabilitar Material</h1></center>
                    </div>
                    <form method="post" action="Material.php" id="myForm">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea deshabilitar al siguiente Material?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idMaterialDeshabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idMaterialDeshabilitar">
                                <br>
                                <label id="NombreMaterialDeshabilitar"></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="DeshabilitarMat" class="btn btn-warning" value="Deshabilitar material">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalHabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Habilitar material</h1></center>
                    </div>
                    <form method="post" action="Material.php" id="myForm">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea habilitar al siguiente material?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idMaterialHabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idMaterialHabilitar">
                                <br>
                                <label id="NombreMaterialHabilitar"></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="HabilitarMat" class="btn btn-success" value="Habilitar material">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalEditarMaterial" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Editar Material</h4></center>
                    </div>
                    <form method="post" action="Material.php" id="frmEdit">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">ID</span>
                                    <input type="text" style="width:350px;" class="form-control" name="idEditar" id="idEditar">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Nombre Material</span>
                                    <input type="text" style="width:350px;" class="form-control" name="NombreMaterial" id="NombreMaterial">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Unidad de Medida</span>
                                    <select class="form-control" name="UnidadMedida" id="UnidadMedida">
                                        <option value="" disabled selected>Unidad de Medida</option>
                                        <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                        <?php
                                        $VerUnidadMedida = "SELECT * FROM UnidadMedida;";
                                        // Hacemos la consulta
                                        $ResultadoConsultaUnidadMedida = $mysqli->query($VerUnidadMedida);
                                        while ($row = mysqli_fetch_array($ResultadoConsultaUnidadMedida)) {
                                            ?>
                                            <option value="<?php echo $row['idUnidadMedida']; ?>"><?php echo $row['NombreUnidadMedida'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Precio</span>
                                    <input type="text" style="width:350px;" class="form-control" name="PrecioMaterial" id="PrecioMaterial">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            <input type="submit" name="EditarMaterial" class="btn btn-success" value="Editar material">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <?php
        // Código que recibe la información del formulario modal (Deshabilitar)
        if (isset($_POST['DeshabilitarMat'])) {
            // Guardamos el id en una variable
            $idMaterial = $_POST['idMaterialDeshabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Material SET EstadoMaterial = 'Deshabilitado' WHERE idMaterial=" . $idMaterial . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Material deshabilitado\");\n";
                echo "</script>";
            }
        }
        // Código que recibe la información del formulario modal (Habilitar)
        if (isset($_POST['HabilitarMat'])) {
            // Guardamos el id en una variable
            $idMaterial = $_POST['idMaterialHabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Material SET EstadoMaterial = 'Habilitado' WHERE idMaterial=" . $idMaterial . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Material habilitado\");\n";
                echo "</script>";
            }
        }
        // Código que recibe la información del formulario modal (Editar)
        if (isset($_POST['EditarMaterial'])) {
            // Guardamos la info en variables
            $idMaterial = $_POST['idEditar'];
            $NombreMaterial = $_POST['NombreMaterial'];
            $UnidadMedida = $_POST['UnidadMedida'];
            $PrecioMaterial = $_POST['PrecioMaterial'];

            // Preparamos la consulta
            $query = "UPDATE material SET NombreMaterial = '" . $NombreMaterial . "',
                                                    idUnidadMedida = " . $UnidadMedida . ",
                                                    PrecioxUnidad = " . $PrecioMaterial . "
                                                                    WHERE idMaterial=" . $idMaterial . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Material editado correctamente\");\n";
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
