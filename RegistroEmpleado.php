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
            <?php
            // incluimos el menú para mostrarlo
            include_once "MenuPrincipal.php";
            ?>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row text-center">
                    <div class="container-fluid">
                        <!-- Snackbar -->
                        <div id="snackbar"></div> 
                        <div class="row">
                            <div class="col-xs-6">
                                <h1 class="text-center">Registro de empleados</h1>
                            </div>
                            <!-- Contenedor del ícono del Usuario -->
                            <div class="col-xs-6 Icon">
                                <!-- Icono de usuario -->
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <form name="RegistroEmpleado" action="RegistroEmpleado.php" method="post">
                                <!-- Nombre del empleado -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                            <input type="text" class="form-control" name="NombrePersona" placeholder="Nombre" id="NombrePersona" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Apellido del empleado-->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                            <input type="text" class="form-control" name="ApellidoPersona" placeholder="Apellido" id="ApellidoPersona" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Direccion del empleado -->
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input type="text" class="form-control" name="DireccionPersona" placeholder="Direccion" id="DireccionPersona" aria-describedby="sizing-addon1">
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-xs-offset">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-earphone"></i></span>
                                            <input type="tel" class="form-control" name="TelefonoPersona" placeholder="Telefono" id="TelefonoPersona" aria-describedby="sizing-addon1">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Telefono Persona -->
                                <div class="row">
                                    <!-- Id Empleado -->
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <select class="form-control" name="NombreTipoEmpleado" id="NombreTipoEmpleado">
                                                <option value="" disabled selected>Puesto del Empleado</option>
                                                <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                <?php
                                                $VerUM = "";
                                                if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
                                                    $VerUM = "SELECT * FROM TipoEmpleado;";
                                                } else {
                                                    $VerUM = "SELECT * FROM TipoEmpleado Where idTipoEmpleado!=1;";
                                                }
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
                                    <div class="col-xs-5 col-xs-offset">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
                                            <input type="number" class="form-control" name="CostoPorHora" min="0" step="0.50" placeholder="Costo por Hora" id="CostoPorHora" aria-describedby="sizing-addon1" required>
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
                $CostoPorHora = $_POST['CostoPorHora'];
                $NombreTipoEmpleado = $_POST['NombreTipoEmpleado'];
                ?>

                <?php
                // Preparamos la consulta
                $query = "INSERT INTO Persona(NombrePersona, ApellidoPersona, DireccionPersona, TelefonoPersona,CostoXHoraPersona, idTipoEmpleado, EstadoPersona)
                                       VALUES('" . $NombrePersona . "', '" . $ApellidoPersona . "', '" . $DireccionPersona . "', '" . $TelefonoPersona . "', " . $CostoPorHora . ", " . $NombreTipoEmpleado . ", 'Activo')";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Empleado registrado\");\n";
                    echo "</script>";
                }
            }
            // Termina código para agregar una nueva marca
            // Código que recibe la información para agregar una nueva linea
            ?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <script src="js/jquery-1.11.3.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed --> 
            <script src="js/bootstrap.js"></script>
            <!-- Incluimos el script que nos dará el nombre de la persona para mostrarlo en el modal -->
            <script src="js/Modal.js"></script>
            <!-- Incluimos el script que nos dará la notificación de que ya se realizó alguna acción -->
            <script src="js/Toast.js"></script>
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

