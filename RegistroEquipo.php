<!--
    Sistema de Información de Averías Viales de Guatemala
    Registro de equipos
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
                            <div class="col-xs-5 col-xs-offset-1">
                                <h1 class="text-center">Registro de Equipos</h1>
                            </div>
                            <!-- Contenedor del ícono del Usuario -->
                            <div class="col-xs-5 Icon">
                                <!-- Icono de usuario -->
                                <span class="glyphicon glyphicon-plus"></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <form name="RegistroEquipo" action="RegistroEquipo.php" method="post">
                                <!-- Código del equipo -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-qrcode"></i></span>
                                            <input type="text" class="form-control" name="CodigoEquipo" placeholder="Código" id="CodigoEquipo" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Nombre del equipo -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                            <input type="text" class="form-control" name="NombreEquipo" placeholder="Nombre" id="NombreEquipo" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Costo del equipo -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
                                            <input type="number" class="form-control" min="0" step="0.50" name="CostoPorHora" placeholder="Costo por hora" id="CostoPorHora" aria-describedby="sizing-addon1">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-12 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <input type="submit" name="RegistrarEquipo" class="btn btn-primary" value="Registrar">
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
            <!-- Modal para crear UnidadMedida -->
            <div class="modal fade slide left" id="ModalAgregarUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                            </button>
                            <h1 class="modal-title" id="myModalLabel">Registrar nueva unidad de medida</h1>

                        </div>
                        <form method="post" id="myForm">
                            <div class="modal-body">
                                <p class="lead">Ingrese los datos</p>

                                <div class="form-group">
                                    <label for="email">Nombre de la unidad de medida</label>
                                    <input type="text" name="NombreUnidad" id="NombreUnidad" class="form-control" placeholder="Nombre" value="" required/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="AgregarUnidad" class="btn btn-success" value="Registrar unidad de medida">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Agregar Unidad de medida -->
            <?php
            // Código que recibe la información para registrar un producto
            if (isset($_POST['RegistrarEquipo'])) {
                // Guardamos la información en variables
                $CodigoEquipo = $_POST['CodigoEquipo'];
                $NombreEquipo = $_POST['NombreEquipo'];
                $CostoPorHora = $_POST['CostoPorHora'];

                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteEquipo = "SELECT CodigoEquipo FROM Equipo WHERE CodigoEquipo='" . $CodigoEquipo . "';";
                $ResultadoExisteEquipo = $mysqli->query($ConsultaExisteEquipo);
                $row = mysqli_fetch_array($ResultadoExisteEquipo);
                if ($row['CodigoEquipo'] != null) {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Este código ya existe\");\n";
                    echo "</script>";
                } else {
                    // Preparamos la consulta
                    $query = "INSERT INTO Equipo(NombreEquipo, CodigoEquipo, CostoPorHora, EstadoEquipo)
                                                VALUES('" . $NombreEquipo . "', '" . $CodigoEquipo . "', '" . $CostoPorHora . "', 'Habilitado')";
                    // Ejecutamos la consulta
                    if (!$resultado = $mysqli->query($query)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Equipo registrado\");\n";
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

