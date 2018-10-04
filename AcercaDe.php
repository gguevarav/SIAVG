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
            $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
            $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
            $_SESSION["PrivilegioUsuario"] == 'Tesorero') {
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
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Equipos<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                            $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                            $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                            $_SESSION["PrivilegioUsuario"] == 'Tesorero') {
                                        ?>
                                        <li><a href="RegistroEquipo.php">Registrar equipos</a></li>
                                        <li><a href="Equipo.php">Listado de Equipos</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Tesorero') {
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
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
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
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de empleados<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="RegistroEmpleado.php">Crear empleado</a></li>
                                        <li><a href="#">Listado de empleados</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
                                ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de usuarios<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="CrearUsuario.php">Crear usuario</a></li>
                                        <li><a href="Usuario.php">Ver usuarios</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                    $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
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
                                    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'Superadmin') {
                                        ?>
                                        <li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo adminstrador</a></li>
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
