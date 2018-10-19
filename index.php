<!--
Módulo Principal
Martes, 05 de septiembre del 2018
21:22 PM
f-Society
UMG - Morales Izabal
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="imagenes/icono.ico">
        <title>Sistema de Información de Averías Viales de Guatemala</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->  
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/Toast.css">
        <script src="js/Toast.js"></script>

    </head>
    <?php
    include_once 'Seguridad/conexion.php';
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
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
            <div class="container-fluid">
                <div class="dashboard">
                    <div class="row">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="input-group input-group-lg">
                            <img src="imagenes/logo.png" class="img-thumbnail">
                        </div>
                    </div>
                </div>
                <!-- Pie de página, se utilizará el mismo para todos. -->
                <footer>
                    <hr>
                    <div class="row">
                        <div class="text-center col-md-6 col-md-offset-3">
                            <h4>Sistema de Información de Averías Viales de Guatemala</h4>
                            <p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="http://www.umg.edu.gt/" >f-Society</a></p>
                        </div>
                    </div>
                    <hr>
                </footer> 
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <script src="js/jquery-1.11.3.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed --> 
            <script src="js/bootstrap.js"></script>
            <script src="jquery/jquery.js"></script>
        </body>
        <?php
        // De lo contrario lo redirigimos al inicio de sesión
    } else {
        echo "usuario no valido";
        header("location:Login.php");
    }
    ?>
</html>
