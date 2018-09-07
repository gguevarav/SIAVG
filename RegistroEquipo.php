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
            <title>SIAVG</title>
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
                                                        <li><a href="Equipo.php">Listado de Equipos</a></li>
                                                        <li><a href="#">Registrar equipos</a></li>
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
                                                          <li><a href="Material.php">Lista de Materiales</a></li>
                                                      </ul>
                                                  </li>
                                                  <?php
                                          }
                                          ?>
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
                <div class="container">
                    <div class="row text-center">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h1 class="text-center">Registro de Equipos</h1>
                                </div>
                                <!-- Contenedor del ícono del Usuario -->
                                <div class="col-xs-6 Icon">
                                    <!-- Icono de usuario -->
                                    <span class="glyphicon glyphicon-edit"></span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <form name="RegistroEquipo" action="RegistroEquipo.php" method="post">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-qrcode"></i></span>
                                                <input type="text" class="form-control" name="CodigoEquipo" placeholder="Código" id="CodigoEquipo" aria-describedby="sizing-addon1" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Nombre del producto -->
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
                                                <input type="text" class="form-control" name="NombreEquipo" placeholder="Nombre" id="NombreEquipo" aria-describedby="sizing-addon1" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Modelo producto -->
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-ok"></i></span>
                                                <input type="text" class="form-control" name="CostoPorHora" placeholder="Costo por hora" id="CostoPorHora" aria-describedby="sizing-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Resgistrar -->
                                    <div class="row">
                                        <div class="col-xs-12 col-xs-offset-1">
                                            <div class="input-group input-group-lg">
                                                <div clss="btn-group">
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
                          <div class="modal-body">
                                <p class="lead">Ingrese los datos</p>
                                <form method="post" id="myForm">
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
                    $ConsultaExisteEquipo = "SELECT CodigoEquipo FROM Equipo WHERE CodigoEquipo='".$CodigoEquipo."';";
                    $ResultadoExisteEquipo = $mysqli->query($ConsultaExisteEquipo);			
                    $row = mysqli_fetch_array($ResultadoExisteEquipo);
                    if($row['CodigoEquipo'] != null){
                        ?>
                        <div class="form-group">
                            <form name="Alerta">
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-10 col-xs-offset-1">
                                                    <div class="alert alert-success">Este código ya existe</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                    else{
                        // Preparamos la consulta
                        $query = "INSERT INTO Equipo(NombreEquipo, CodigoEquipo, CostoPorHora, EstadoEquipo)
                                                VALUES('".$NombreEquipo."', '".$CodigoEquipo."', '".$CostoPorHora."', 'Habilitado')";
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
                                                        <div class="alert alert-success">Equipo registrado</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            // Recargamos la página
                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroEquipo.php\">"; 
                        }
                    }
                }
            // Código que recibe la información para agregar nueva marca
            if (isset($_POST['AgregarMarca'])) {
                // Guardamos la información en variables
                $NombreMarca = $_POST['NombreMarca'];
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteMarca = "SELECT NombreMarca FROM marca WHERE NombreMarca='".$NombreMarca."';";
                $ResultadoExisteMarca = $mysqli->query($ConsultaExisteMarca);
                $row = mysqli_fetch_array($ResultadoExisteMarca);
                if($row['NombreMarca'] != null){
                    ?>
                    <div class="form-group">
                        <form name="Alerta">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="alert alert-success">La marca ya existe</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                else{
                    // Preparamos la consulta
                    $query = "INSERT INTO marca(NombreMarca)
                                                              VALUES('".$NombreMarca."');";
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
                                                    <div class="alert alert-success">Marca registrada</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        // Recargamos la página
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
                    }
                }
            }
            // Termina código para agregar una nueva marca
            // Código que recibe la información para agregar una nueva linea
            if (isset($_POST['AgregarLinea'])) {
                // Guardamos la información en variables
                $NombreLinea = $_POST['NombreLinea'];
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteLinea = "SELECT NombreLineaProducto FROM lineaproducto WHERE NombreLineaProducto='".$NombreLinea."';";
                $ResultadoExisteLinea = $mysqli->query($ConsultaExisteLinea);
                $row = mysqli_fetch_array($ResultadoExisteLinea);
                if($row['NombreLineaProducto'] != null){
                    ?>
                    <div class="form-group">
                        <form name="Alerta">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="alert alert-success">La línea ya existe</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                else{
                    // Preparamos la consulta
                    $query = "INSERT INTO lineaproducto(NombreLineaProducto)
                                                              VALUES('".$NombreLinea."');";
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
                                                    <div class="alert alert-success">Línea registrada</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        // Recargamos la página
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
                    }
                }
            }
            // Termina código para agregar la línea
            // Código que recibe la información para agregar una nueva unidad
            if (isset($_POST['AgregarUnidad'])) {
                // Guardamos la información en variables
                $NombreUnidad = $_POST['NombreUnidad'];
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteUnidad = "SELECT NombreUnidadMedida FROM unidadmedida WHERE NombreUnidadMedida='".$NombreUnidad."';";
                $ResultadoExisteUnidad = $mysqli->query($ConsultaExisteUnidad);
                $row = mysqli_fetch_array($ResultadoExisteUnidad);
                if($row['NombreUnidadMedida'] != null){
                    ?>
                    <div class="form-group">
                        <form name="Alerta">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="alert alert-success">La unidad de medida ya existe</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                else{
                    // Preparamos la consulta
                    $query = "INSERT INTO unidadmedida(NombreUnidadMedida)
                                                              VALUES('".$NombreUnidad."');";
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
                                                    <div class="alert alert-success">Unidad de medida registrada</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        // Recargamos la página
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroEquipo.php\">"; 
                    }
                }
            }
            // Termina código para agregar una nueva unidad
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
