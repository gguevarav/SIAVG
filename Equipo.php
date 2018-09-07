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
            if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
            $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
                    // Guardamos el nombre del usuario en una variable
                    $NombreUsuario =$_SESSION["NombreUsuario"];
                    $idUsuario2 =$_SESSION["idUsuario"];
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
                                                        if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                                           $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                                           $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                                           $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
                                                        ?>
                                                                <li><a href="Equipo.php">Listado Equipos</a></li>
                                                                <li><a href="RegistroEquipo.php">Registrar Equipos</a></li>
                                                <?php
                                                        }
                                                        ?>
                                                </ul>
                                        </li>
                                        <?php
                                        if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
                                                ?>
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Materiales<span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="RegistroMaterial.php">Registrar Material</a></li>
                                                                <li><a href="#">Lista de Materiales</a></li>
                                                        </ul>
                                                </li>
                                                <?php
                                        }
                                        ?>
                                        <?php
                                        if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
                                                ?>
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajuste<span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="Ajuste.php">Ajuste de inventario</a></li>
                                                        </ul>
                                                </li>
                                                <?php
                                        }
                                        ?>
                                        <?php
                                        if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
                                                ?>
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hojas de Reponsabilidad<span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="CrearHojaResponsabilidad.php">Crear hoja de responsabilidad</a></li>
                                                                <li><a href="HojaResponsabilidad.php">Lista hojas de responsabilidad</a></li>
                                                        </ul>
                                                </li>
                                                <?php
                                        }
                                        ?>
                                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bitácoras<span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                        <li><a href="BitacoraEntradas.php">Bitácora de entradas de inventario</a></li>
                                                        <li><a href="BitacoraSalidas.php">Bitácora de salidas de inventario</a></li>
                                                        <li><a href="BitacoraAjustes.php">Bitácora de ajustes de inventario</a></li>
                                                </ul>
                                        </li>
                                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes<span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                        <li><a href="ReporteProductos.php" target="_blank">Reporte de productos</a></li>
                                                        <li><a href="ReporteInventario.php" target="_blank">Reporte de inventario</a></li>
                                                        <li><a href="ReporteInventarioFisico.php" target="_blank">Reporte de inventario fisico</a></li>
                                                        <li><a href="Kardex.php" target="_blank">Kardex</a></li>
                                                </ul>
                                        </li>
                                        <?php
                                        if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
                                           $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
                                                ?>
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de usuarios<span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="CrearUsuario.php">Crear usuario</li>
                                                                <li><a href="Usuario.php">Ver usuarios</a></li>
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
                                        if($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
                                        ?>
                                            <li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo adminstrador</a></li>
                                            <li><a href="JuntaOficiales.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Modificar junta oficiales</a></li>
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
                <div class="form-group">
                    <div class="container">
                        <div class="row text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <h1 class="text-center">Equipos registrados</h1>
                                    </div>
                                    <!-- Contenedor del ícono del Usuario -->
                                    <div class="col-xs-5 Icon">
                                        <!-- Icono de usuario -->
                                        <span class="glyphicon glyphicon-asterisk"></span>
                                    </div>
                                    <div class="form-group">
                                        <!--<form name="Exportar" action="Material.php" method="post">
                                            <div class="col-xs-1">
                                                <div class="input-group input-group-lg">
                                                        <a class="btn btn-success btn-lg" href="ReporteProductos.php" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="input-group input-group-lg">
                                                        <input type="submit" name="Exportar" class="btn btn-success" value="Exportar a excel">
                                                </div>
                                            </div>
                                        </form>-->
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
                                                    <th>#</th>
                                                    <th>Código</th>´
                                                    <th>Nombre</th>´
                                                    <th>Costo por Hora</th>
                                                    <th>Estado del Equipo</th>
                                                    <th>Editar</th>
                                                    <th>Habilitar/Deshabilitar</th>
                                                </tr>
                                            </thead>
                                            <!-- Cuerpo de la tabla -->
                                            <tbody class="buscar">
                                                <!-- Contenido de la tabla -->
                                                    <!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
                                                    <?php
                                                        $VerEquipo = "SELECT * FROM Equipo";
                                                        // Hacemos la consulta
                                                        $resultado = $mysqli->query($VerEquipo);
                                                        while ($row = mysqli_fetch_array($resultado)){
                                                            ?>
                                                            <tr>
                                                                <td><span id="idEquipo<?php echo $row['idEquipo'];?>"><?php echo $row['idEquipo'] ?></span></td>
                                                                <td><span id="CodigoEquipo<?php echo $row['idEquipo'];?>"><?php echo $row['CodigoEquipo'] ?></span></td>
                                                                <td><span id="NombreEquipo<?php echo $row['idEquipo'];?>"><?php echo $row['NombreEquipo'] ?></span></td>
                                                                <td><span id="CostoPorHora<?php echo $row['idEquipo'];?>"><?php echo $row['CostoPorHora'] ?></span></td>
                                                                <td><span id="EstadoEquipo<?php echo $row['idEquipo'];?>"><?php echo $row['EstadoEquipo'] ?></span></td>
                                                                <td>
                                                                <?php
                                                                    if($row['EstadoEquipo'] == 'Habilitado'){
                                                                    ?>
                                                                        <!-- Edición activada-->
                                                                        <div>
                                                                            <div class="input-group input-group-lg">
                                                                                <button type="button" class="btn btn-success EditarEquipo" value="<?php echo $row['idEquipo']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    else if($row['EstadoEquipo'] == 'Deshabilitado'){
                                                                    ?>
                                                                        <!-- Edición desactivada-->
                                                                        <div>
                                                                            <div class="input-group input-group-lg">
                                                                                <button type="button" class="btn btn-success EditarEquipoDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <?php
                                                                    if($row['EstadoEquipo'] == 'Habilitado'){
                                                                    ?>
                                                                        <td>
                                                                            <!-- Deshabilitación -->
                                                                            <div>
                                                                                <div class="input-group input-group-lg">
                                                                                    <button type="button" class="btn btn-warning DeshabilitarEquipo"  value="<?php echo $row['idEquipo']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    <?php
                                                                    }
                                                                    else if($row['EstadoEquipo'] == 'Deshabilitado'){
                                                                    ?>
                                                                        <td>
                                                                            <!-- Habilitación -->
                                                                            <div>
                                                                                <div class="input-group input-group-lg">
                                                                                    <button type="button" class="btn btn-success HabilitarEquipo"  value="<?php echo $row['idEquipo']; ?>"><span class="glyphicon glyphicon-check"></span></button>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    <?php
                                                                    }
                                                                ?>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
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
            <div class="modal fade" id="ModalDeshabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <div class="modal fade" id="ModalHabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    $query = "UPDATE Equipo SET EstadoEquipo = 'Deshabilitado' WHERE idEquipo=".$idEquipo.";";
                    // Ejecutamos la consulta
                    if(!$resultado = $mysqli->query($query)){
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    }
                    else{
                    ?>
                    <div class="form-group">
                        <form name="Alerta">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="alert alert-success">Equipo deshabilitado</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    // Recargamos la página
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=Equipo.php\">"; 
                    }
                }
                // Código que recibe la información del formulario modal (Habilitar)
                if (isset($_POST['HabilitarEquipo'])) {
                    // Guardamos el id en una variable
                    $idEquipo = $_POST['idEquipoHabilitar'];
                    // Preparamos la consulta
                    $query = "UPDATE Equipo SET EstadoEquipo = 'Habilitado' WHERE idEquipo=".$idEquipo.";";
                    // Ejecutamos la consulta
                    if(!$resultado = $mysqli->query($query)){
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    }
                    else{
                    ?>
                    <div class="form-group">
                        <form name="Alerta">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="alert alert-success">Equipo habilitado</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    // Recargamos la página
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=Equipo.php\">"; 
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
                    $query = "UPDATE Equipo SET NombreEquipo = '".$NombreEquipo."',
                                                CodigoEquipo = '".$CodigoEquipo."',
                                                CostoPorHora = '".$CostoPorHora."'
                                            WHERE idEquipo=".$idEquipo.";";
                    // Ejecutamos la consulta
                    if(!$resultado = $mysqli->query($query)){
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    }
                    else{
                    ?>
                    <div class="form-group">
                        <form name="Alerta">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="alert alert-success">Equipo editado correctamente</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    // Recargamos la página
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=Equipo.php\">"; 
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
        } 
        else{
                echo "usuario no valido";
                header("location:login.php");
        }
    ?>
</html>
