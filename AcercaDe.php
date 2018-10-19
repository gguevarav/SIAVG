<!--
    Sistema de Información de Averías Viales de Guatemala
    Acerca de...
    Domingo, 09 de septiembre del 2018
    11:20 pM
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
        <!-- Temas-->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <?php
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    //include_once "Seguridad/conexion.php";
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
            // Incluimos el menú
            include_once "MenuPrincipal.php";
            ?>
            <br>
            <br>
            <br>
            <!-- Contenedor del ícono del Usuario -->
            <div id="ContenedorAcerca">
                <div class="IconoInicio">
                    <div class="row TextoInicioP">
                        <div class="col-xs-7 TextoInicio">
                            <h2 class="text-center">Acerca de...</h2>
                        </div>
                        <!-- Contenedor del ícono del Usuario -->
                        <div class="col-xs-4">
                            <!-- Icono de usuario -->
                            <span class="glyphicon glyphicon-question-sign"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <form name="Acercade" action="acercade.php" method="post">
                        <div class="input-group input-group-lg">
                            <h1 class="text-center">COVIAL</h1>
                            <h3 class="text-center">Sistema de Información de Averías Viales de Guatemala</h3>
                            <h4 class="text-center">Universidad Mariano Gálvez</h4>
                            <h4 class="text-center">Morales Izabal</h4>
                            <h4 class="text-center">Copyright &copy; 2018 &middot; All Rights Reserved</h4>
                            <!-- <h5 class="text-center"><a href="Documentos/Manual.pdf" target="_blank">Manual de usuario</a></h5> -->
                            <h5 class="text-center"><a href="https://www.umg.edu.gt/" >f-Society</a></h5>
                        </div>
                    </form>
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
