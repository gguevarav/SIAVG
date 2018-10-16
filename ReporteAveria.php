<!--
    Sistema de Información de Averías Viales de Guatemala
    Reporte de Avería
    Jueves, 20 de Septiembre del 2018
    00:30 PM
    f-Society
    -
    UMG - Morales Izabal
    -
-->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <link rel="shortcut icon" href="imagenes/icono.ico">
        <title>Sistema de Información de Averías Viales de Guatemala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- vinculo a bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Temas-->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <!-- Toast-->
        <link rel="stylesheet" type="text/css" href="css/Toast.css">
        <script src="js/Toast.js"></script>
		<!-- Importamos la API de Google para hacer uso de coordenadas-->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUxltWYaXVQJJB-VZJ1EvyUb75M3yM6qQ&sensor=true"></script>
		<!-- css para el mapa -->
        <style type="text/css">
            #map {
                width: 200px;
                height: 150px;
            }
        </style>
		<script type="text/javascript">
			var marker;          //variable del marcador
			var coords = {};    //coordenadas obtenidas con la geolocalización

			//Funcion principal
			function initMap()
			{
				//usamos la API para geolocalizar el usuario
				//navigator.geolocation.getCurrentPosition(
				//		function (position) {
				//			coords = {
				//				lng: position.coords.longitude,
				//				lat: position.coords.latitude
				//			};
							setMapa();  //pasamos las coordenadas al metodo para crear el mapa
				//		}, function (error) {
				//	console.log(error);
				//}
				//);
			}
			function setMapa() {
				//Se crea una nueva instancia del objeto mapa
				var map = new google.maps.Map(document.getElementById('map'),
						{
							zoom: 25,
							center: new google.maps.LatLng(15.466751985073822,-88.84044371226844),
							// Tipo de Mapa (Tipo Satélite)
							mapTypeId: 'satellite'
						});


				//Creamos el marcador en el mapa con sus propiedades
				//para nuestro obetivo tenemos que poner el atributo draggable en true
				//position pondremos las mismas coordenas que obtuvimos en la geolocalización
				marker = new google.maps.Marker({
					map: map,
					draggable: true,
					animation: google.maps.Animation.DROP,
					position: new google.maps.LatLng(15.466751985073822,-88.84044371226844), }
				);
				//agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
				//cuando el usuario a soltado el marcador
				marker.addListener('click', toggleBounce);
				marker.addListener('dragend', function (event)
				{
					//escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
					document.getElementById("coords").value = this.getPosition().lat() + "," + this.getPosition().lng();
				});
			}
			//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
			function toggleBounce() {
				if (marker.getAnimation() !== null) {
					marker.setAnimation(null);
				} else {
					marker.setAnimation(google.maps.Animation.BOUNCE);
				}
			}
			// Carga de la libreria de google maps              
		</script>
    </head>
    <?php
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
    // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
            $_SESSION["PrivilegioUsuario"] == 'EncMunicipal') {
        // Guardamos el nombre del usuario en una variable
        $NombreUsuario = $_SESSION["NombreUsuario"];
        $idUsuario2 = $_SESSION["idUsuario"];
        ?>
        <body onload="initMap()">
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
                                        <li><a href="Equipo.php">Listado de Equipos</a></li>
                                        <li><a href="RegistroEquipo.php">Registrar equipos</a></li>
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
                                        <li><a href="#">Reportar una Avería</a></li>
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
                                <h1 class="text-center">Reporte de Avería</h1>
                            </div>
                            <!-- Contenedor del ícono del Usuario -->
                            <div class="col-xs-5 Icon">
                                <!-- Icono de usuario -->
                                <span class="glyphicon glyphicon-edit"></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <form name="ReporteAveria" action="ReporteAveria.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input type="text" class="form-control" name="coords" placeholder="Seleccione la ubicación en el mapa" id="coords" aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-xs-offset">
                                        <div id="map"></div>
                                    </div>
                                </div>
                                <br>
                                <!-- Imagenes de la avería -->
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-upload"></i></span>
                                            <input type="file" class="form-control" name="imagen[]" multiple aria-describedby="sizing-addon1" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Prioridad avería -->
                                <div class="row">
                                    <div class="col-xs-9 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                                            <select class="form-control" name="Prioridad" id="Prioridad">
                                                <option value="" disabled selected>Prioridad de la avería</option>
                                                <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                <?php
                                                $ConsultaPrioridad = "SELECT * FROM Prioridad;";
                                                // Hacemos la consulta
                                                $resultado = $mysqli->query($ConsultaPrioridad);
                                                while ($row = mysqli_fetch_array($resultado)) {
                                                    ?>
                                                    <option value="<?php echo $row['idPrioridad']; ?>"><?php echo $row['NombrePrioridad'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <div class="col-xs-1">
                                        <div class="input-group input-group-lg">
                                            <button type="button" class="btn btn-success btn-lg AgregarPrioridad" value="" data-toggle="modal" data-target="#ModalAgregarPrioridad">+</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Urgencia de la avería -->
                                <div class="row">
                                    <div class="col-xs-9 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-bullhorn"></i></span>
                                            <select class="form-control" name="Urgencia" id="Urgencia">
                                                <option value="" disabled selected>Urgencia</option>
                                                <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                <?php
                                                $ConsultaUrgencia = "SELECT * FROM Urgencia;";
                                                // Hacemos la consulta
                                                $resultado = $mysqli->query($ConsultaUrgencia);
                                                while ($row = mysqli_fetch_array($resultado)) {
                                                    ?>
                                                    <option value="<?php echo $row['idUrgencia']; ?>"><?php echo $row['NombreUrgencia'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <div class="col-xs-1">
                                        <div class="input-group input-group-lg">
                                            <button type="button" class="btn btn-success btn-lg AgregarUrgencia" value="" data-toggle="modal" data-target="#ModalAgregarUrgencia">+</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Tamaño de la avería de la avería -->
                                <div class="row">
                                    <div class="col-xs-9 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-scale"></i></span>
                                            <select class="form-control" name="Tamanio" id="Tamanio">
                                                <option value="" disabled selected>Tamaño de la avería</option>
                                                <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                <?php
                                                $ConsultaTamanio = "SELECT * FROM Tamanio;";
                                                // Hacemos la consulta
                                                $resultado = $mysqli->query($ConsultaTamanio);
                                                while ($row = mysqli_fetch_array($resultado)) {
                                                    ?>
                                                    <option value="<?php echo $row['idTamanio']; ?>"><?php echo $row['NombreTamanio'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <div class="col-xs-1">
                                        <div class="input-group input-group-lg">
                                            <button type="button" class="btn btn-success btn-lg AgregarTamanio" value="" data-toggle="modal" data-target="#ModalAgregarTamanio">+</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-1">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <input type="submit" name="ReportarAveria" class="btn btn-primary" value="Reportar">
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
            <div class="modal fade slide left" id="ModalAgregarPrioridad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                            </button>
                            <h1 class="modal-title" id="myModalLabel">Registrar nueva prioridad</h1>

                        </div>
                        <form method="post" id="myForm">
                            <div class="modal-body">
                                <p class="lead">Ingrese los datos</p>
                                <div class="form-group">
                                    <label for="email">Nombre de la prioridad</label>
                                    <input type="text" name="NombrePrioridad" id="NombrePrioridad" class="form-control" placeholder="Nombre" value="" required/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="AgregarPrioridad" class="btn btn-success" value="Registrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Agregar Unidad de medida -->
            <!-- Modal para crear UnidadMedida -->
            <div class="modal fade slide left" id="ModalAgregarTrazabilidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                            </button>
                            <h1 class="modal-title" id="myModalLabel">Registrar nueva trazabilidad</h1>

                        </div>
                        <form method="post" id="myForm">
                            <div class="modal-body">
                                <p class="lead">Ingrese los datos</p>
                                <div class="form-group">
                                    <label for="email">Nombre de la Trazabilidad</label>
                                    <input type="text" name="NombreTrazabilidad" id="NombreTrazabilidad" class="form-control" placeholder="Nombre" value="" required/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="AgregarTrazabilidad" class="btn btn-success" value="Registrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Agregar Unidad de medida -->
            <!-- Modal para crear UnidadMedida -->
            <div class="modal fade slide left" id="ModalAgregarUrgencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                            </button>
                            <h1 class="modal-title" id="myModalLabel">Registrar nueva urgencia</h1>

                        </div>
                        <form method="post" id="myForm">
                            <div class="modal-body">
                                <p class="lead">Ingrese los datos</p>
                                <div class="form-group">
                                    <label for="email">Nombre de la urgencia</label>
                                    <input type="text" name="NombreUrgencia" id="NombreUrgencia" class="form-control" placeholder="Nombre" value="" required/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="AgregarUrgencia" class="btn btn-success" value="Registrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Agregar Unidad de medida -->
            <!-- Modal para crear UnidadMedida -->
            <div class="modal fade slide left" id="ModalAgregarTamanio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                            </button>
                            <h1 class="modal-title" id="myModalLabel">Registrar nueva tamanio</h1>

                        </div>
                        <form method="post" id="myForm">
                            <div class="modal-body">
                                <p class="lead">Ingrese los datos</p>
                                <div class="form-group">
                                    <label for="email">Nombre de la tamanio</label>
                                    <input type="text" name="NombreTamanio" id="NombreTamanio" class="form-control" placeholder="Nombre" value="" required/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="AgregarTamanio" class="btn btn-success" value="Registrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Agregar Unidad de medida -->

            <?php
            require("phpmailer/class.phpmailer.php"); //Importamos la función PHP class.phpmailer
            //
            // Primero obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
            $VerCorreoUsuario = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuario2 . ";";
            // Hacemos la consulta
            $ResultadoConsultaCorreo = $mysqli->query($VerCorreoUsuario);
            $FilaResultadoCorreo = $ResultadoConsultaCorreo->fetch_assoc();
            $CorreoUsuarioReporta = $FilaResultadoCorreo['CorreoUsuario'];
            
            $mail = new PHPMailer();

            $mail->IsSMTP();
            $mail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False

            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;

            //Nuestra cuenta
            $mail->Username = 'noreply.siavg@gmail.com';
            $mail->Password = 'Sudo-aptget2018'; //Su password
            $mail->From = "noreply.siavg@gmail.com";
            $mail->FromName = "SIAVG";
            $mail->Subject = "Seguimiento de averia";
            $mail->AddAddress($CorreoUsuarioReporta, "Seguimiento de Averias");

            $mail->WordWrap = 50;

            // Código que recibe la información para registrar un producto
            if (isset($_POST['ReportarAveria'])) {
                $ImagenAveria;
                if (isset($_FILES['imagen'])) {
                    $cantidad = count($_FILES["imagen"]["tmp_name"]);
                    for ($i = 0; $i < $cantidad; $i++) {
                        //Comprobamos si el fichero es una imagen
                        if ($_FILES['imagen']['type'][$i] == 'image/png' || $_FILES['imagen']['type'][$i] == 'image/jpeg') {
                            // Creamos el directorio a partir de la fecha y hora
                            $FechaHoraActual = date("YmdHis");
                            // Pasamos la dirección a la variable que vamos a almacenar en la base de datos
                            $ImagenAveria = "FotosReportes/" . $FechaHoraActual;
                            // Creamos el directorio
                            if (!is_dir($ImagenAveria)) {
                                mkdir($ImagenAveria);
                            }
                            //Subimos el fichero al servidor
                            move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $ImagenAveria . "/" . $_FILES["imagen"]["name"][$i]);
                            $validar = true;
                        } else
                            $validar = false;
                    }
                }
                // Guardamos la información en variables
                $Ubicacion = $_POST['coords'];
                $Prioridad = $_POST['Prioridad'];
                //$Trazabilidad = $_POST['Trazabilidad'];
                $Urgencia = $_POST['Urgencia'];
                $Tamanio = $_POST['Tamanio'];

                // Obtenemos el id de la municipalidad del usuario que reporta para incluirlo en la tabla de averia
                $VeridMunicipalidad = "SELECT idMunicipalidad FROM Usuario WHERE idUsuario='" . $idUsuario2 . "';";
                // Hacemos la consulta
                $ResultadoConsultaMunicipalidad = $mysqli->query($VeridMunicipalidad);
                $FilaResultadoMunicipalidad = $ResultadoConsultaMunicipalidad->fetch_assoc();
                $idMunicipalidad = $FilaResultadoMunicipalidad['idMunicipalidad'];

                // Preparamos la consulta
                $query = "INSERT INTO Averia(UbicacionAveria, ImagenAveria, idMunicipalidad, idPrioridad, idTrazabilidad, idUrgencia, idTamanio, idUsuario)
											VALUES('" . $Ubicacion . "', '" . $ImagenAveria . "', " . $idMunicipalidad . ", " . $Prioridad . ", 1, " . $Urgencia . ", " . $Tamanio . ", " . $idUsuario2 . ")";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Incidente Reportado\");\n";
                    echo "</script>";
                    // Enviamos el correo
                    $mail->msgHTML("<html>
                                    <head>
                                    <title>Reporte de seguimiento a avería</title>
                                    <style type='text/css'>
                                            #datos {
                                                    position:absolute;
                                                    width:780px;
                                                    left: 164px;
                                                    top: 316px;
                                                    text-align: center;
                                            }
                                            #apDiv1 #form1 table tr td {
                                                    text-align: center;
                                                    font-weight: bold;
                                            }
                                            #apDiv2 {
                                                    position:absolute;
                                                    width:49px;
                                                    height:45px;
                                                    z-index:2;
                                                    left: 12px;
                                                    top: 11px;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: center;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: left;
                                            }
                                            #apDiv1 #notificacion table tr td {
                                                    text-align: center;
                                                    font-family: Arial, Helvetica, sans-serif;
                                            }
                                            #apDiv3 {
                                                    position:absolute;
                                                    width:833px;
                                                    height:115px;
                                                    z-index:1;
                                                    left: 99px;
                                                    text-align: center;
                                                    top: 16px;
                                            }
                                    </style>
                                    </head>
                                    <body>
                                        <div id='apDiv3'>
                                            <h1>Se ha reportado el incidente No. " . mysqli_insert_id($mysqli) . "</h1>
                                        </div>								
                                    </body>
                                    </html>");

                    // Notificamos al usuario del estado del mensaje

                    if (!$mail->Send()) {
                        //echo "No se pudo enviar el Mensaje.";
                    } else {
                        //echo "Mensaje enviado";
                    }
                }
            }
            // Código que recibe la información para agregar nueva prioridad
            if (isset($_POST['AgregarPrioridad'])) {
                // Guardamos la información en variables
                $NombrePrioridad = $_POST['NombrePrioridad'];
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExistePrioridad = "SELECT NombrePrioridad FROM Prioridad WHERE NombrePrioridad='" . $NombrePrioridad . "';";
                $ResultadoExistePrioridad = $mysqli->query($ConsultaExistePrioridad);
                $row = mysqli_fetch_array($ResultadoExistePrioridad);
                if ($row['NombrePrioridad'] != null) {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Este nombre de prioridad ya existe\");\n";
                    echo "</script>";
                } else {
                    // Preparamos la consulta
                    $query = "INSERT INTO Prioridad(NombrePrioridad)
                                                              VALUES('" . $NombrePrioridad . "');";
                    // Ejecutamos la consulta
                    if (!$resultado = $mysqli->query($query)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Prioridad registrada\");\n";
                        echo "</script>";
                    }
                }
            }
            // Termina código para agregar una nueva Prioridad
            // Código que recibe la información para agregar nueva Trazabilidad
            if (isset($_POST['AgregarTrazabilidad'])) {
                // Guardamos la información en variables
                $NombreTrazabilidad = $_POST['NombreTrazabilidad'];
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteTrazabilidad = "SELECT NombreTrazabilidad FROM Trazabilidad WHERE NombreTrazabilidad='" . $NombreTrazabilidad . "';";
                $ResultadoExisteTrazabilidad = $mysqli->query($ConsultaExisteTrazabilidad);
                $row = mysqli_fetch_array($ResultadoExisteTrazabilidad);
                if ($row['NombreTrazabilidad'] != null) {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Este nombre de trazabilidad ya existe\");\n";
                    echo "</script>";
                } else {
                    // Preparamos la consulta
                    $query = "INSERT INTO Trazabilidad(NombreTrazabilidad)
                                                              VALUES('" . $NombreTrazabilidad . "');";
                    // Ejecutamos la consulta
                    if (!$resultado = $mysqli->query($query)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Trazabilidad registrada\");\n";
                        echo "</script>";
                    }
                }
            }
            // Termina código para agregar una nueva Prioridad 
            // Código que recibe la información para agregar una nueva linea
            if (isset($_POST['AgregarUrgencia'])) {
                // Guardamos la información en variables
                $NombreUrgencia = $_POST['NombreUrgencia'];
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteUrgencia = "SELECT NombreUrgencia FROM Urgencia WHERE NombreUrgencia='" . $NombreUrgencia . "';";
                $ResultadoExisteUrgencia = $mysqli->query($ConsultaExisteUrgencia);
                $row = mysqli_fetch_array($ResultadoExisteUrgencia);
                if ($row['NombreLineaProducto'] != null) {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Este nombre de urgencia ya existe\");\n";
                    echo "</script>";
                } else {
                    // Preparamos la consulta
                    $query = "INSERT INTO Urgencia(NombreUrgencia)
                                                              VALUES('" . $NombreUrgencia . "');";
                    // Ejecutamos la consulta
                    if (!$resultado = $mysqli->query($query)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Urgencia registrada\");\n";
                        echo "</script>";
                    }
                }
            }
            // Termina código para agregar la línea
            // Código que recibe la información para agregar una nueva unidad
            if (isset($_POST['AgregarTamanio'])) {
                // Guardamos la información en variables
                $NombreTamanio = $_POST['NombreTamanio'];
                //Primero revisamos que no exista la marca ya en la base de datos
                $ConsultaExisteTamanio = "SELECT NombreTamanio FROM Tamanio WHERE NombreTamanio='" . $NombreTamanio . "';";
                $ResultadoExisteTamanio = $mysqli->query($ConsultaExisteTamanio);
                $row = mysqli_fetch_array($ResultadoExisteTamanio);
                if ($row['NombreUnidadMedida'] != null) {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Este nombre de tamaño ya existe\");\n";
                    echo "</script>";
                } else {
                    // Preparamos la consulta
                    $query = "INSERT INTO Tamanio(NombreTamanio)
                                                              VALUES('" . $NombreTamanio . "');";
                    // Ejecutamos la consulta
                    if (!$resultado = $mysqli->query($query)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Tamaño registrado\");\n";
                        echo "</script>";
                    }
                }
            }
            // Termina código para agregar una nueva unidad
            ?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
            <script src="js/jquery-1.11.3.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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