<!--
    Sistema de Información de Averías Viales de Guatemala
    Martes, 04 de Septiembre del 2018
    23:27 PM
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
        <!-- Toast-->
        <link rel="stylesheet" type="text/css" href="css/Toast.css">
        <script src="js/Toast.js"></script>
        <!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <?php
        // Incluimos el archivo que valida si hay una sesión activa
        include_once "Seguridad/seguro.php";
        // Primero hacemos la consulta en la tabla de persona
        include_once "Seguridad/Conexion.php";
        // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
        if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
            // Guardamos el nombre del usuario en una variable
            $NombreUsuario = $_SESSION["NombreUsuario"];
            $idUsuario2 = $_SESSION["idUsuario"];
            
            // Incluimos el menú para mostrar
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
                            <div class="col-xs-6 ">
                                <h1 class="text-center">Módulo Administrador</h1>
                            </div>
                            <!-- Contenedor del ícono del Usuario -->
                            <div class="col-xs-6 Icon">
                                <!-- Icono de usuario -->
                                <span class="glyphicon glyphicon-dashboard"></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <form name="CambioPassword" action="Administrador.php" method="post">
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <h1 class="text-center">Cambio de contraseña</h1>
                                    </div>
                                </div>
                                <br>
                                <!-- Nombre de usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <select class="form-control" name="NombreUsuario" id="NombreUsuario" required>
                                                <option value="" disabled selected>Usuario</option>
                                                <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                <?php
                                                $VerUsuarios = "SELECT * FROM usuario;";
                                                // Hacemos la consulta
                                                $resultado = $mysqli->query($VerUsuarios);
                                                while ($row = mysqli_fetch_array($resultado)) {
                                                    ?>
                                                    <option value="<?php echo $row['idUsuario']; ?>"><?php echo $row['NombreUsuario'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Contraseña de usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control" name="ContraseniaUsuario" placeholder="Contraseña" id="ContraseniaUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- reContraseña de usuario -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control" name="ReContraseniaUsuario" placeholder="Ingrese nuevamente la contraseña" id="ReContraseniaUsuario" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-12 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary" id="CambiarPassword" name="CambiarPassword">Cambiar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                        <div class="form-group">
                            <form name="CrearPuesto" action="Administrador.php" method="post">
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <h1 class="text-center">Crear puesto de empleado</h1>
                                    </div>
                                </div>
                                <br>
                                <!-- Nombre de puesto de empleado -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-comment"></i></span>
                                            <input type="text" class="form-control" name="NombrePuesto" placeholder="Nombre del puesto" id="NombrePuesto" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-12 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary" id="RegistrarPuesto" name="RegistrarPuesto">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                        <div class="form-group">
                            <form name="UnidadMedida" action="Administrador.php" method="post">
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <h1 class="text-center">Crear unidad de medida</h1>
                                    </div>
                                </div>
                                <br>
                                <!-- Nombre de unidad de medida -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-comment"></i></span>
                                            <input type="text" class="form-control" name="UnidadMedida" placeholder="Nombre de unidad de medida" id="UnidadMedida" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-12 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary" id="RegistrarUnidadMedida" name="RegistrarUnidadMedida">Registrar</button>
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
            if (isset($_POST['CambiarPassword'])) {
                // Obtenemos los valores de todos los campos y los almacenamos en variables
                $idUsuario = $_POST['NombreUsuario'];
                $PasswordUsuario = $_POST['ContraseniaUsuario'];
                $RePasswordUsuario = $_POST['ReContraseniaUsuario'];

                if ($PasswordUsuario != $RePasswordUsuario) {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Las contraseñas no coinciden\");\n";
                    echo "</script>";
                } else {
                    $ContraseniaEncriptada = md5($PasswordUsuario);
                    // Creamos la consulta para la insersión de los datos
                    $CambiarContrasenia = "UPDATE usuario SET PasswordUsuario='" . $ContraseniaEncriptada . "' WHERE idUsuario=" . $idUsuario . ";";

                    if (!$resultado1 = $mysqli->query($CambiarContrasenia)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $CambiarContrasenia . "\n";
                        echo "Error: " . $mysqli->errno . "\n";
                        exit;
                        // Mostrar el mensaje
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Contraseña cambiada\");\n";
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
