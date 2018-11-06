
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="defaultNavbar1">
            <ul class="nav navbar-nav">
                <?php
                if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                        $_SESSION["PrivilegioUsuario"] == 'Administrador') {
                    ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Equipos<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="RegistroEquipo.php">Registrar equipos</a></li>
                            <li><a href="Equipo.php">Listado de Equipos</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                        $_SESSION["PrivilegioUsuario"] == 'Administrador') {
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
                if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                        $_SESSION["PrivilegioUsuario"] == 'Administrador') {
                    ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de empleados<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="RegistroEmpleado.php">Crear empleado</a></li>
                            <li><a href="Empleado.php">Listado de empleados</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
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
                if ($_SESSION["PrivilegioUsuario"] == 'EncMunicipal' ||
                        $_SESSION["PrivilegioUsuario"] == 'Administrador') {
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
                <?php
                if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
                        $_SESSION["PrivilegioUsuario"] == 'Administrador') {
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <!-- Acá mostramos el nombre del usuario -->
                    <a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><?php echo $NombreUsuario; ?></a></li>
                        <?php
                        if ($_SESSION["PrivilegioUsuario"] == 'Administrador') {
                            ?>
                            <li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo administrador</a></li>
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