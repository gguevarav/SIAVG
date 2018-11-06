<!--
    Sistema de Información de Averías Viales de Guatemala
    Listado de Equipos
    Miércoles, 06 de septiembre del 2018
    20:15 PM
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
        <script type="text/javascript">
            function MostrarTablaUsuarios() {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4)
                    {
                        document.getElementById("buscar").innerHTML = xmlhttp.responseText;
                        setTimeout('MostrarTablaUsuarios()', 1000);
                    }
                }
                xmlhttp.open("GET", "TablaUsuarios.php?SolicitarTabla=si", true);
                xmlhttp.send();
            }
            window.onload = function startrefresh() {
                setTimeout('MostrarTablaUsuarios()', 1000);
            }
        </script>
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
            <?php
            // incluimos el menú para mostrarlo
            include_once "MenuPrincipal.php";
            ?>
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
                                    <h1 class="text-center">Usuarios registrados</h1>
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
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Apellido</th>
                                                <th class="text-center">Nombre usuario</th>
                                                <th class="text-center">Dirección</th>
                                                <th class="text-center">Correo</th>
                                                <th class="text-center">Municipalidad a la que pertenece</th>
                                                <th class="text-center">No. de teléfono</th>
                                                <th class="text-center">Tipo de Empleado</th>
                                                <th class="text-center">Rol</th>
                                                <th class="text-center">Cambiar rol</th>
                                                <th class="text-center">Cambiar correo</th>
                                                <th class="text-center">Habilitar/<br>Deshabilitar</th>
                                            </tr>
                                        </thead>
                                        <tbody class="buscar" id="buscar">
                                        <script type="text/javascript">
                                            MostrarTablaUsuarios();
                                        </script>
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
        <div class="modal fade" id="ModalCambioCorreo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cambio de rol</h1></center>
                    </div>
                    <form method="post" action="Usuario.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <div class="container-fluid">
                                <p class="lead">Ingrese el nuevo correo del usuario</p>
                                <div class="form-group input-group">
                                    <input type="text" name="idUsuarioCambioCorreo" style="width:350px; visibility:hidden;" class="form-control" id="idUsuarioCambioCorreo">
                                    <br>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Nombre del usuario</span>
                                    <label class="form-control" style="width:350px;" id="NombresApellidos" name="NombresApellidos"></label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Correo</span>
                                    <input type="email" style="width:350px;" class="form-control" name="CorreoUsuario" id="CorreoUsuario">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="CambiarCorreo" class="btn btn-success" value="Cambiar correo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalCambioRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cambio de rol</h1></center>
                    </div>
                    <form method="post" action="Usuario.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <div class="container-fluid">
                                <p class="lead">Seleccione el nuevo rol del usuario</p>
                                <div class="form-group input-group">
                                    <input type="text" name="idUsuarioCambioRol" style="width:350px; visibility:hidden;" class="form-control" id="idUsuarioCambioRol">
                                    <br>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Nombre del usuario</span>
                                    <label class="form-control" style="width:350px;" id="NombresApellidosRol" name="NombresApellidosRol"></label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Puesto</span>
                                    <select class="form-control" style="width:350px;" name="idRol" id="idRol">
                                        <option value="" disabled selected>Seleccione el Rol</option>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="CambiarRol" class="btn btn-warning" value="Cambiar Rol">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalDeshabilitarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Deshabilitar empleado</h1></center>
                    </div>
                    <form method="post" action="Usuario.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea deshabilitar el siguiente empleado?</p>
                            <input type="text" name="idEmpleadoDeshabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idEmpleadoDeshabilitar">
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="width:150px;">Nombre del usuario</span>
                                <label class="form-control" style="width:350px;" id="NombreEmpledoDeshabilitar" name="NombreEmpledoDeshabilitar"></label>
                            </div>
                            <input type="text" name="idUsuarioDeshabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idUsuarioDeshabilitar">
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
                    <form method="post" action="Usuario.php" id="myForm">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea habilitar la siguiente empleado?</p>
                            <input type="text" name="idEmpleadoHabilitar" style="width:350px; visibility:hidden;" id="idEmpleadoHabilitar"  class="form-control">
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="width:150px;">Nombre del usuario</span>
                                <label class="form-control" style="width:350px;" id="NombreEmpleadoHabilitar" name="NombreEmpleadoHabilitar"></label>
                            </div>
                            <input type="text" name="idUsuarioHabilitar" style="width:350px; visibility:hidden;" id="idUsuarioHabilitar" class="form-control">
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
        <?php
        // Código que recibe la información del formulario modal (Deshabilitar)
        if (isset($_POST['DeshabilitarEmpleado'])) {
            // Guardamos el id en una variable
            $idPersona = $_POST['idEmpleadoDeshabilitar'];
            $idUsuario = $_POST['idUsuarioDeshabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Usuario SET EstadoUsuario = 'Inactivo' WHERE idUsuario=" . $idUsuario . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
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
                    echo "myFunction(\"Usuario deshabilitado\");\n";
                    echo "</script>";
                }
            }
        }
        // Código que recibe la información del formulario modal para cambiar el rol del usuario
        if (isset($_POST['CambiarRol'])) {
            // Guardamos el id en una variable
            $idUsuario = $_POST['idUsuarioCambioRol'];
            // Guardamos el id del rol en una variable
            $idRol = $_POST['idRol'];
            // Preparamos la consulta
            $query = "UPDATE Usuario SET idRol =" . $idRol . " WHERE idUsuario=" . $idUsuario . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Cambio de rol satisfactiorio\");\n";
                echo "</script>";
            }
        }// Código que recibe la información del formulario modal para cambiar el correo del usuario
        if (isset($_POST['CambiarCorreo'])) {
            // Guardamos el id en una variable
            $idUsuario = $_POST['idUsuarioCambioCorreo'];
            // Guardamos el id del rol en una variable
            $CorreoUsuario = $_POST['CorreoUsuario'];
            // Preparamos la consulta
            $query = "UPDATE Usuario SET CorreoUsuario ='" . $CorreoUsuario . "' WHERE idUsuario=" . $idUsuario . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Cambio de correo satisfactiorio\");\n";
                echo "</script>";
            }
        }
        // Código que recibe la información del formulario modal (Habilitar)
        if (isset($_POST['HabilitarEmpleado'])) {
            // Guardamos el id en una variable
            $idPersona = $_POST['idEmpleadoHabilitar'];
            $idUsuario = $_POST['idUsuarioHabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Usuario SET EstadoUsuario = 'Activo' WHERE idUsuario=" . $idUsuario . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
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
                    echo "myFunction(\"Usuario habilitado\");\n";
                    echo "</script>";
                }
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
        <!-- Incluimos el script que nos dará el nombre de la persona para mostrarlo en el modal -->
        <!-- Pie de página, se utilizará el mismo para todos. -->
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
