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
        <!-- Toast-->
        <link rel="stylesheet" type="text/css" href="css/Toast.css">
        <script src="js/Toast.js"></script>
        <!-- Para validar la contraseña -->
        <script src="js/ValidarPassword.js"></script>
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
    if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
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
                                        <li><a href="#">Crear usuario</a></li>
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
                <form name="CrearUsuario" onSubmit="return validarPassword()" action="CrearUsuario.php" method="post">
                    <div class="container">
                        <!-- Snackbar -->
                        <div id="snackbar"></div> 
                        <div class="row text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <h1 class="text-center">Registro de Usuario</h1>
                                    </div>
                                    <!-- Contenedor del ícono del Usuario -->
                                    <div class="col-xs-5 Icon">
                                        <!-- Icono de usuario -->
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                </div>
                                <br>
                                <!-- Nombre del usuario -->
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                            <input type="text" class="form-control" name="NombreUsuario" placeholder="Nombre" id="NombreUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                    <!-- Apellido del usuario -->
                                    <div class="col-xs-5">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                            <input type="text" class="form-control" name="ApellidoUsuario" placeholder="Apellido" id="ApellidoUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Dirección del usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input type="text" class="form-control" name="DireccionUsuario" placeholder="Dirección" id="DireccionUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <!-- Municipalidad del usuario -->
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <select class="form-control" name="idMunicipalidad" id="idMunicipalidad">
                                                <option value="" disabled selected>Municipalidad a la que pertenece el usuario</option>
                                                <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                <?php
                                                $VerMuni = "SELECT * FROM Municipalidad;";
                                                // Hacemos la consulta
                                                $resultadoMuni = $mysqli->query($VerMuni);
                                                while ($row = mysqli_fetch_array($resultadoMuni)) {
                                                    ?>
                                                    <option value="<?php echo $row['idMunicipalidad']; ?>"><?php echo $row['NombreMunicipalidad'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Teléfono del usuario -->
                                    <div class="col-xs-5">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-earphone"></i></span>
                                            <input type="tel" class="form-control" name="TelefonoUsuario" placeholder="Teléfono" id="TelefonoUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Id Empleado -->
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <select class="form-control" name="NombreTipoEmpleado" id="NombreTipoEmpleado">
                                                <option value="" disabled selected>Puesto del Usuario</option>
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
                                    <!-- Id Rol -->
                                    <div class="col-xs-5">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <select class="form-control" name="NombreRol" id="NombreRol">
                                                <option value="" disabled selected>Rol del usuario</option>
                                                <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                <?php
                                                $VerUM = "SELECT * FROM Rol;";
                                                // Hacemos la consulta
                                                $resultado = $mysqli->query($VerUM);
                                                while ($row = mysqli_fetch_array($resultado)) {
                                                    ?>
                                                    <option value="<?php echo $row['idRol']; ?>"><?php echo $row['NombreRol'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Correo de usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input type="email" class="form-control" name="Correo" placeholder="Correo del usuario" id="Correo" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Nombre de usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" id="username" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Contraseña del usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control" name="PasswordUsuario" placeholder="Contraseña" id="PasswordUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Repetición de contraseña del usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control" name="RePasswordUsuario" placeholder="Ingrese nuevamente la contraseña" id="RePaswordUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <input type="submit" name="CrearUsuario" class="btn btn-primary" value="Registrar">
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
            if (isset($_POST['CrearUsuario'])) {
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteUsuario = "SELECT NombreUsuario FROM usuario WHERE NombreUsuario='" . $_POST['username'] . "';";
                $ResultadoExisteUsuario = $mysqli->query($ConsultaExisteUsuario);
                $row = mysqli_fetch_array($ResultadoExisteUsuario);
                if ($row['NombreUsuario'] != null) {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Este usuario ya existe\");\n";
                    echo "</script>";
                } else {

                    // Guardamos la información en variables
                    $NombreUsuario = $_POST['NombreUsuario'];
                    $ApellidoUsuario = $_POST['ApellidoUsuario'];
                    $DireccionUsuario = $_POST['DireccionUsuario'];
                    $TelefonoUsuario = $_POST['TelefonoUsuario'];
                    $NombreTipoEmpleadoUsuario = $_POST['NombreTipoEmpleado'];
                    $Nombrerolusuario = $_POST['NombreRol'];
                    $idMunicipalidad = $_POST['idMunicipalidad'];
                    $username = $_POST['username'];
                    $PasswordUsuario = $_POST['PasswordUsuario'];
                    $RePasswordUsuario = $_POST['RePasswordUsuario'];
                    $Correo = $_POST['Correo'];
                    if ($PasswordUsuario != $RePasswordUsuario) {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Las contraseñas no coinciden\");\n";
                        echo "</script>";
                    } else {
                        $ContraseniaEncriptada = md5($PasswordUsuario);
                        $InsertarPersona = "INSERT INTO Persona(NombrePersona, ApellidoPersona, DireccionPersona, TelefonoPersona, CostoXHoraPersona, EstadoPersona, idTipoEmpleado)
						     Values('" . $NombreUsuario . "', '" . $ApellidoUsuario . "', '" . $DireccionUsuario . "', '" . $TelefonoUsuario . "', 0.00, 'Activo', " . $NombreTipoEmpleadoUsuario . ")";

                        if (!$resultado = $mysqli->query($InsertarPersona)) {
                            echo "Error: La ejecución de la consulta falló debido a: \n";
                            echo "Query: " . $InsertarPersona . "\n";
                            echo "Error: " . $mysqli->errno . "\n";
                            exit;
                        }
                        // Preparamos la consulta
                        $InsertarUsuario = "INSERT INTO Usuario (NombreUsuario, PasswordUsuario, CorreoUsuario, idMunicipalidad, idPersona, idRol)
						      VALUES('" . $username . "', '" . $ContraseniaEncriptada . "', '" . $Correo . "', " . $idMunicipalidad . ", " . mysqli_insert_id($mysqli) . ", " . $Nombrerolusuario . ");";

                        if (!$resultado2 = $mysqli->query($InsertarUsuario)) {
                            echo "Error: La ejecución de la consulta falló debido a: \n";
                            echo "Query: " . $InsertarUsuario . "\n";
                            echo "Error: " . $mysqli->errno . "\n";
                            exit;
                        }
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Usuario registrado\");\n";
                        echo "</script>";
                    }
                }
            }
            ?>			
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <script src="js/jquery-1.11.3.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed --> 
            <script src="js/bootstrap.js"></script>
            <!-- Pie de página, se utilizará el mismo para todos. -->
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

