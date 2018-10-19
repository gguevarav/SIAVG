<!--
    Sistema de Información de Averías Viales de Guatemala
    Visor de Fotografías
    Viernes, 21 de Septiembre del 2018
    03:23 AM
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
            $_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
            $_SESSION["PrivilegioUsuario"] == 'EncMunicipal') {
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
                        <!-- Regresar -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-group input-group-lg">
                                    <div class="btn-group">
                                        <span id="Regresar"><a href="CrearOrdenTrabajo.php" > <<-Regresar</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h1 class="text-center">Fotografías</h1>
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
                            <form name="VerFotos" action="VerFotos.php" method="post">
                                <?php
                                if (isset($_POST['VerFotos'])) {
                                    $directory = $_POST['Path'];
                                    $dirint = dir($directory);
                                    while (($archivo = $dirint->read()) !== false) {
                                        if (preg_match('/gif/', $archivo) || preg_match('/jpg/', $archivo) || preg_match('/png/', $archivo)) {
                                            ?>
                                            <div class="row">
                                                <div class="col-xs-10 col-xs-offset-1">
                                                    <div class="input-group input-group-lg">
                                                        <?php
                                                        echo '<img src="' . $directory . "/" . $archivo . '"class="img-thumbnail">';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <?php
                                        }
                                    }
                                    $dirint->close();
                                }
                                ?>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

