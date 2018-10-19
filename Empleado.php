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
        <script type="text/javascript">
            function MostrarTablaEmpleados() {
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
                        setTimeout('MostrarTablaEmpleados()', 1000);
                    }
                }
                xmlhttp.open("GET", "TablaEmpleados.php?SolicitarTabla=si", true);
                xmlhttp.send();
            }
            window.onload = function startrefresh() {
                setTimeout('MostrarTablaEmpleados()', 1000);
            }
        </script>
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
                                        <tbody class="buscar" id="buscar">
                                            <script type="text/javascript">
                                                MostrarTablaEmpleados();
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
