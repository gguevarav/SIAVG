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
            function MostrarTablaEquipos() {
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
                        setTimeout('MostrarTablaEquipos()',1000);
                    }
                }
                xmlhttp.open("GET", "TablaEquipos.php?SolicitarTabla=si", true);
                xmlhttp.send();
            }
            window.onload = function startrefresh() {
                setTimeout('MostrarTablaEquipos()', 1000);
            }
        </script>
    </head>
    <?php
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
    // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'EncCovial')
        {
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
                                    <h1 class="text-center">Equipos registrados</h1>
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
                                                <th class="text-center">Costo por Hora<br>
                                                    Cifras en Quetzales</th>
                                                <th class="text-center">Estado del Equipo</th>
                                                <th class="text-center">Editar</th>
                                                <th class="text-center">Habilitar/Deshabilitar</th>
                                            </tr>
                                        </thead>
                                        <!-- Cuerpo de la tabla -->
                                        <tbody class="buscar" id="buscar">
                                            <script type="text/javascript">
                                                MostrarTablaEquipos();
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
        <div class="modal fade" id="ModalDeshabilitarEquipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Deshabilitar Equipo</h1></center>
                    </div>
                    <form method="post" action="Equipo.php" id="myForm">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea deshabilitar al siguiente equipo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idEquipoDeshabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idEquipoDeshabilitar">
                                <br>
                                <label id="NombreEquipoDeshabilitar"></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="DeshabilitarEquipo" class="btn btn-warning" value="Deshabilitar equipo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalHabilitarEquipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Habilitar equipo</h1></center>
                    </div>
                    <form method="post" action="Equipo.php" id="myForm">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea habilitar al siguiente equipo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idEquipoHabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idEquipoHabilitar">
                                <br>
                                <label id="NombreEquipoHabilitar"></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="HabilitarEquipo" class="btn btn-success" value="Habilitar equipo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalEditarEquipo" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Editar equipo</h4></center>
                    </div>
                    <form method="post" action="Equipo.php" id="frmEdit">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">ID</span>
                                    <input type="text" style="width:350px;" class="form-control" name="idEditar" id="idEditar">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Nombre equipo</span>
                                    <input type="text" style="width:350px;" class="form-control" name="CodigoEquipo" id="CodigoEquipo">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Codigo equipo</span>
                                    <input type="text" style="width:350px;" class="form-control" name="NombreEquipo" id="NombreEquipo">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon" style="width:150px;">Costo por Hora</span>
                                    <input type="text" style="width:350px;" class="form-control" name="CostoPorHora" id="CostoPorHora">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            <input type="submit" name="EditarEquipo" class="btn btn-success" value="Editar Equipo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <?php
        // Código que recibe la información del formulario modal (Deshabilitar)
        if (isset($_POST['DeshabilitarEquipo'])) {
            // Guardamos el id en una variable
            $idEquipo = $_POST['idEquipoDeshabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Equipo SET EstadoEquipo = 'Deshabilitado' WHERE idEquipo=" . $idEquipo . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Equipo deshabilitado\");\n";
                echo "</script>";
            }
        }
        // Código que recibe la información del formulario modal (Habilitar)
        if (isset($_POST['HabilitarEquipo'])) {
            // Guardamos el id en una variable
            $idEquipo = $_POST['idEquipoHabilitar'];
            // Preparamos la consulta
            $query = "UPDATE Equipo SET EstadoEquipo = 'Habilitado' WHERE idEquipo=" . $idEquipo . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Equipo habilitado\");\n";
                echo "</script>";
            }
        }
        // Código que recibe la información del formulario modal (Editar)
        if (isset($_POST['EditarEquipo'])) {
            // Guardamos la info en variables
            $idEquipo = $_POST['idEditar'];
            $NombreEquipo = $_POST['NombreEquipo'];
            $CodigoEquipo = $_POST['CodigoEquipo'];
            $CostoPorHora = $_POST['CostoPorHora'];

            // Preparamos la consulta
            $query = "UPDATE Equipo SET NombreEquipo = '" . $NombreEquipo . "',
                                                CodigoEquipo = '" . $CodigoEquipo . "',
                                                CostoPorHora = '" . $CostoPorHora . "'
                                            WHERE idEquipo=" . $idEquipo . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "myFunction(\"Equipo editado correctamente\");\n";
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
