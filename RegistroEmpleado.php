<!--
    Sistema de Información de Averías Viales de Guatemala
    Registro de Materiales
    Jueves, 06 de Septiembre del 2018
    16:14 PM
    f-Society
    -
    UMG - Morales Izabal
    -
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="imagenes/icono.ico">
        <title>Sistema de Información de Averías Viales de Guatemala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- vinculo a bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
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
                                        <li><a href="CrearOrdenTrabajo.php">Crear Orden de Trabajo</a></li>
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
                                        <li><a href="#">Crear empleado</a></li>
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
            <div class="container">
                <div class="row text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6">
                                <h1 class="text-center">Registro de Persona</h1>
                            </div>
                            <!-- Contenedor del ícono del Usuario -->
                            <div class="col-xs-6 Icon">
                                <!-- Icono de usuario -->
                                <span class="glyphicon glyphicon-edit"></span>
                            </div>
                        </div>
                        <br>
                        <!-- Nombre Persona -->
                        <div class="form-group">
                            <form name="RegistroPersona" action="RegistroPersona.php" method="post">
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                            <input type="text" class="form-control" name="NombrePersona" placeholder="Nombre" id="NombrePersona" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Apellido Persona-->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                            <input type="text" class="form-control" name="ApellidoPersona" placeholder="Apellido" id="ApellidoPersona" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Direccion Persona -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-ok"></i></span>
                                            <input type="text" class="form-control" name="DireccionPersona" placeholder="Direccion" id="DireccionPersona" aria-describedby="sizing-addon1">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Telefono Persona -->
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-ok"></i></span>
                                            <input type="text" class="form-control" name="TelefonoPersona" placeholder="Telefono" id="TelefonoPersona" aria-describedby="sizing-addon1">
                                        </div>
                                    </div>
                                    <!-- Id Empleado -->
                                    <div class="col-xs-5 col-xs-offset">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
                                            <select class="form-control" name="NombreTipoEmpleado" id="NombreTipoEmpleado">
                                                <option value="" disabled selected>Puesto del Empleado</option>
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
                                </br>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <input type="submit" name="RegistrarPersona" class="btn btn-primary" value="Registrar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // Código que recibe la información para registrar un producto
            if (isset($_POST['RegistrarPersona'])) {
                // Guardamos la información en variables
                $NombrePersona = $_POST['NombrePersona'];
                $ApellidoPersona = $_POST['ApellidoPersona'];
                $DireccionPersona = $_POST['DireccionPersona'];
                $TelefonoPersona = $_POST['TelefonoPersona'];
                $NombreTipoEmpleado = $_POST['NombreTipoEmpleado'];
                ?>

                <?php
                // Preparamos la consulta
                $query = "INSERT INTO Persona(NombrePersona, ApellidoPersona, DireccionPersona, TelefonoPersona, idTipoEmpleado)
                                                VALUES('" . $NombrePersona . "', '" . $ApellidoPersona . "', '" . $DireccionPersona . "', '" . $TelefonoPersona . "', " . $NombreTipoEmpleado . ")";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    ?>
                    <div class="form-group">
                        <form name="Alerta">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="alert alert-success">Persona registrada</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            <?php
            // Recargamos la página
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroPersona.php\">";
        }
    }
    // Termina código para agregar una nueva marca
    // Código que recibe la información para agregar una nueva linea
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

