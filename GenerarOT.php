<!--
    Sistema de Información de Averías Viales de Guatemala
    Generar OT
    Viernes, 21 de septiembre del 2018
    16:56 PM
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
    </head>
    <?php
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
    // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_SESSION["PrivilegioUsuario"] == 'EncCovial' ||
            $_SESSION["PrivilegioUsuario"] == 'Administrador') {
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
            <div class="form-group">
                <form name="GenerarOT" action="GenerarOT.php" method="post">
                    <input type="hidden" name="idAveria" value="<?php echo $_POST['idAveria']; ?>" />
                    <div class="container">
                        <!-- Snackbar -->
                        <div id="snackbar"></div> 
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
                                        <h1 class="text-center">Generar orden de trabajo</h1>
                                    </div>
                                    <!-- Contenedor del ícono del Usuario -->
                                    <div class="col-xs-6 Icon">
                                        <!-- Icono de usuario -->
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <h3 class="text-center">Seleccione el equipo que se utilizará</h3>
                                <br>
                                <fieldset id="field">
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Equipo</th>
                                                        <th scope="col">Cantidad</th>
                                                        <th scope="col">Horas a laborar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="CuerpoTabla">
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <div class="input-group input-group-lg">
                                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
                                                                <select class="form-control" name="Equipo1" id="Equipo1" required>
                                                                    <option value="" disabled selected>Seleccione el equipo</option>
                                                                    <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                                    <?php
                                                                    $VerEquipos = "SELECT idEquipo, NombreEquipo FROM Equipo;";
                                                                    // Hacemos la consulta
                                                                    $resultado = $mysqli->query($VerEquipos);
                                                                    while ($row = mysqli_fetch_array($resultado)) {
                                                                        ?>
                                                                        <option value="<?php echo $row['idEquipo']; ?>"><?php echo $row['NombreEquipo'] ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-lg">
                                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign"></i></span>
                                                                <input type="number" class="form-control" name="CantidadEquipo1" placeholder="Cantidad" id="CantidadEquipo1" aria-describedby="sizing-addon1" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-lg">
                                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign"></i></span>
                                                                <input type="number" class="form-control" name="CantidadHorasEquipo1" placeholder="Horas" id="CantidadHorasEquipo1" aria-describedby="sizing-addon1" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xs-1">
                                            <!-- Button trigger modal -->
                                            <div class="input-group input-group-lg">
                                                <button type="button" class="btn btn-success btn-lg AgregarFilaEquipo" value="" data-toggle="modal" data-target="#AgregarFilaEquipo" onclick="crear(this)">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <hr>
                                <h3 class="text-center">Seleccione el personal a cargo</h3>
                                <br>
                                <fieldset id="field">
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Empleado</th>
                                                        <th scope="col">Cantidad horas a laborar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="CuerpoTablaPersonal">
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <div class="input-group input-group-lg">
                                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
                                                                <select class="form-control" name="Empleado1" id="Empleado1" required>
                                                                    <option value="" disabled selected>Seleccione el empleado</option>
                                                                    <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                                    <?php
                                                                    $VerEmpleado = "SELECT idPersona, NombrePersona, ApellidoPersona FROM Persona;";
                                                                    // Hacemos la consulta
                                                                    $resultado = $mysqli->query($VerEmpleado);
                                                                    while ($row = mysqli_fetch_array($resultado)) {
                                                                        ?>
                                                                        <option value="<?php echo $row['idPersona']; ?>"><?php echo $row['NombrePersona'] . " " . $row['ApellidoPersona'] ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-lg">
                                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign"></i></span>
                                                                <input type="number" class="form-control" name="CantidadHorasPersonal1" placeholder="Horas" id="CantidadHorasPersonal1" aria-describedby="sizing-addon1" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xs-1">
                                            <!-- Button trigger modal -->
                                            <div class="input-group input-group-lg">
                                                <button type="button" class="btn btn-success btn-lg AgregarFilaPersona" value="" data-toggle="modal" data-target="#AgregarFilaPersona" onclick="crearPersonal(this)">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <hr>
                                <h3 class="text-center">Seleccione el material a utilizar</h3>
                                <br>
                                <fieldset id="field">
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Material</th>
                                                        <th scope="col">Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="CuerpoTablaMaterial">
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <div class="input-group input-group-lg">
                                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
                                                                <select class="form-control" name="Material1" id="Material1" required>
                                                                    <option value="" disabled selected>Seleccione el material</option>
                                                                    <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                                    <?php
                                                                    $VerMaterial = "SELECT idMaterial, NombreMaterial FROM Material;";
                                                                    // Hacemos la consulta
                                                                    $resultado = $mysqli->query($VerMaterial);
                                                                    while ($row = mysqli_fetch_array($resultado)) {
                                                                        ?>
                                                                        <option value="<?php echo $row['idMaterial']; ?>"><?php echo $row['NombreMaterial'] ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-lg">
                                                                <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign"></i></span>
                                                                <input type="number" class="form-control" name="CantidadMaterial1" placeholder="Cantidad de Material" id="CantidadMaterial1" aria-describedby="sizing-addon1" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xs-1">
                                            <!-- Button trigger modal -->
                                            <div class="input-group input-group-lg">
                                                <button type="button" class="btn btn-success btn-lg AgregarFilaMaterial" value="" data-toggle="modal" data-target="#AgregarFilaMaterial" onclick="crearMaterial(this)">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- Resgistrar -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group input-group-lg">
                                            <div class="btn-group">
                                                <input type="submit" name="CrearOT" class="btn btn-primary" value="Generar orden de trabajo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['CrearOT'])) {
                // Creamos variables que nos sume el total por cada suministro (Personal, equipo, material)
                $TotalEnEquipo = 0;
                $TotalEnPersonal = 0;
                $TotalEnMaterial = 0;
                // Contadores para acceder a cada array u para darle un nombre por cada array que encuentre
                $Contador = 1;
                $Contador2 = 0;
                while ($post = each($_POST)) {
                    //echo $post[$Contador2];
                    // Para registrar todas las filas del equipo
                    if ($post[$Contador2] = "Equipo" . $Contador) {
                        if (isset($_POST['Equipo' . $Contador])) {
                            $idAveria = $_POST['idAveria'];
                            $IdEquip = $_POST['Equipo' . $Contador];
                            //echo $IdEquip;
                            $Cantidad = $_POST['CantidadEquipo' . $Contador];
                            //echo $Cantidad;
                            $HorasLaborad = $_POST['CantidadHorasEquipo' . $Contador];
                            // Vamos a consultar a cuando nos sale cada hora y a multiplicarla por la cantidad necesitada
                            // Primero haremos la consulta
                            $VerCostoHora = "SELECT CostoPorHora FROM equipo WHERE idEquipo=" . $IdEquip . ";";
                            // Ejecutamos la consulta
                            $ResultadoConsultaCostoHora = $mysqli->query($VerCostoHora);
                            // Guardamos la consulta en un array
                            $ResultadoConsultaCosto = $ResultadoConsultaCostoHora->fetch_assoc();
                            // Privilegio de usuario
                            $CostoPorHoraEquipo = $ResultadoConsultaCosto['CostoPorHora'];
                            // Hacemos el cálculo, multiplicamos el costo por equipo * la cantidad de horas, despues la multiplicamos por la cantidad de equipos necesarios
                            $TotalEnEquipo += ($CostoPorHoraEquipo * $HorasLaborad) * $Cantidad;
                            // Si contiene la palabra inicial producto seguido de un número insertamos e valor en la tabla de datalle de hojas de responsabilidad
                            $ConsultaInsersionlistadoequipo = "INSERT INTO listadoequipo (idEquipo, idAveria, CantidadEquipo, HorasLaboradas)
										       VALUES(" . $IdEquip . ", " . $idAveria . ", " . $Cantidad . ", " . $HorasLaborad . ");";
                            if (!$ResultadoInsersionlistadoequipo = $mysqli->query($ConsultaInsersionlistadoequipo)) {
                                echo "Error: La ejecución de la consulta falló debido a: \n";
                                echo "Query: " . $ConsultaInsersionlistadoequipo . "\n";
                                echo "Errno: " . $mysqli->errno . "\n";
                                echo "Error: " . $mysqli->error . "\n";
                                exit;
                            }
                        }
                    }
                    // Para registrar todas las filas del personal
                    if ($post[$Contador2] = "Empleado" . $Contador) {
                        if (isset($_POST['Empleado' . $Contador])) {
                            $idAveria = $_POST['idAveria'];
                            $IdEquip = $_POST['Empleado' . $Contador];
                            $HorasLaborad = $_POST['CantidadHorasPersonal' . $Contador];
                            // Vamos a consultar a cuando nos sale cada hora y a multiplicarla por la cantidad necesitada
                            // Primero haremos la consulta
                            $VerCostoHoraPersona = "SELECT CostoXHoraPersona FROM persona WHERE idPersona=" . $IdEquip . ";";
                            // Ejecutamos la consulta
                            $ResultadoConsultaCostoHoraPersona = $mysqli->query($VerCostoHoraPersona);
                            // Guardamos la consulta en un array
                            $ResultadoConsultaCostoHora = $ResultadoConsultaCostoHoraPersona->fetch_assoc();
                            // Privilegio de usuario
                            $CostoPorHoraPersona = $ResultadoConsultaCostoHora['CostoXHoraPersona'];
                            // Hacemos el cálculo, multiplicamos el costo por equipo * la cantidad de horas, despues la multiplicamos por la cantidad de equipos necesarios
                            $TotalEnPersonal += $CostoPorHoraPersona * $HorasLaborad;
                            // Si contiene la palabra inicial producto seguido de un número insertamos e valor en la tabla de datalle de hojas de responsabilidad
                            $ConsultaInsersionlistadopersonal = "INSERT INTO listadopersonal (idAveria, idPersona, HorasLaboradas)
										       VALUES(" . $idAveria . ", " . $IdEquip . ", " . $HorasLaborad . ");";
                            if (!$ResultadoInsersionlistadopersonal = $mysqli->query($ConsultaInsersionlistadopersonal)) {
                                echo "Error: La ejecución de la consulta falló debido a: \n";
                                echo "Query: " . $ConsultaInsersionlistadopersonal . "\n";
                                echo "Errno: " . $mysqli->errno . "\n";
                                echo "Error: " . $mysqli->error . "\n";
                                exit;
                            }
                        }
                    }
                    // Para registrar todas las filas del material
                    if ($post[$Contador2] = "Material" . $Contador) {
                        if (isset($_POST['Material' . $Contador])) {
                            $idAveria = $_POST['idAveria'];
                            $IdMaterial = $_POST['Material' . $Contador];
                            $CantidaMaterial = $_POST['CantidadMaterial' . $Contador];
                            // Primero haremos la consulta
                            $VerCostoHoraMaterial = "SELECT PrecioxUnidad FROM material WHERE idMaterial=" . $IdMaterial . ";";
                            // Ejecutamos la consulta
                            $ResultadoConsultaCostoHoraMaterial = $mysqli->query($VerCostoHoraMaterial);
                            // Guardamos la consulta en un array
                            $ResultadoConsultaCostoHoraMat = $ResultadoConsultaCostoHoraMaterial->fetch_assoc();
                            // Privilegio de usuario
                            $CostoPorHoraMaterial = $ResultadoConsultaCostoHoraMat['PrecioxUnidad'];
                            // Hacemos el cálculo, multiplicamos el costo por equipo * la cantidad de horas, despues la multiplicamos por la cantidad de equipos necesarios
                            $TotalEnMaterial += $CostoPorHoraMaterial * $CantidaMaterial;
                            // Si contiene la palabra inicial producto seguido de un número insertamos e valor en la tabla de datalle de hojas de responsabilidad
                            $ConsultaInsersionlistadomarterial = "INSERT INTO listadomaterial (idAveria, idMaterial, CantidadMaterial)
										       VALUES(" . $idAveria . ", " . $IdMaterial . ", " . $CantidaMaterial . ");";
                            if (!$ResultadoInsersionlistadomaterial = $mysqli->query($ConsultaInsersionlistadomarterial)) {
                                echo "Error: La ejecución de la consulta falló debido a: \n";
                                echo "Query: " . $ConsultaInsersionlistadomarterial . "\n";
                                echo "Errno: " . $mysqli->errno . "\n";
                                echo "Error: " . $mysqli->error . "\n";
                                exit;
                            }
                        }
                    }
                    // Sumamos uno al contador
                    $Contador++;
                    $Contador2;
                }
                // Vamos a insertar toda la información de la orden de trabajo
                // Obtenemos el total de la reparación a partir de la suma de todos los totales
                $TotalNeto = $TotalEnEquipo + $TotalEnPersonal + $TotalEnMaterial;
                // Debemos obtener el id del encargado de covial que nos solicitó el trabajo
                // Primero haremos la consulta
                $VerEncargadoMunicipal = "SELECT idUsuario FROM Averia WHERE idAveria=" . $idAveria . ";";
                // Ejecutamos la consulta
                $ResultadoConsultaEncargadoMunicipal = $mysqli->query($VerEncargadoMunicipal);
                // Guardamos la consulta en un array
                $ResultadoConsultaEncargado = $ResultadoConsultaEncargadoMunicipal->fetch_assoc();
                // Privilegio de usuario
                $EncargadoMunicipal = $ResultadoConsultaEncargado['idUsuario'];
                // Hacemos el cálculo, multiplicamos el costo por equipo * la cantidad de horas, despues la multiplicamos por la cantidad de equipos necesarios
                $TotalEnMaterial += $CostoPorHoraMaterial * $CantidaMaterial;
                $ConsultaInsersionOT = "INSERT INTO ordentrabajo (CostoPersonalOrdenTrabajo, CostoEquipoOrdenTrabajo, CostoMaterialOrdenTrabajo, CostoTotalOrdenTrabajo, idAveria, EncargadoMunicipal, EncargadoCovial, idTrazabilidad)
                                                           VALUES(" . $TotalEnPersonal . ", " . $TotalEnEquipo . ", " . $TotalEnMaterial . ", " . $TotalNeto . ", " . $_POST['idAveria'] . ", " . $idUsuario2 . ", " . $EncargadoMunicipal . ", 3);";
                if (!$ResultadoInsersionOT = $mysqli->query($ConsultaInsersionOT)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $ConsultaInsersionOT . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    // Actualizaremos la Avería para que cambie a estado de cotizada
                    $ConsultaCambiarEstadoAveria = "UPDATE Averia SET idTrazabilidad=3
                                                           WHERE idAveria=" . $idAveria . ";";
                    if (!$ResultadoCambioEstado = $mysqli->query($ConsultaCambiarEstadoAveria)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $ConsultaCambiarEstadoAveria . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Orden de trabajo generada\");\n";
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
            <!-- Para copiar elementos -->
            <script src="js/CopiaElementos.js"></script>
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
