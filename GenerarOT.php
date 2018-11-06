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
        <script type="text/javascript">
            function ObtenerDatos(Opcion) {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4)
                    {
                        if (Opcion == "Equipos") {
                            document.getElementById("Equipo1").innerHTML = xmlhttp.responseText;
                        } else if (Opcion == "Empleados") {
                            document.getElementById("Empleado1").innerHTML = xmlhttp.responseText;
                        } else if (Opcion == "Material") {
                            document.getElementById("Material1").innerHTML = xmlhttp.responseText;
                        }
                    }
                }
                xmlhttp.open("GET", "ObtenerDatos.php?Solicitud=" + Opcion, true);
                xmlhttp.send();
            }
        </script>
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
            <?php
            // incluimos el menú para mostrarlo
            include_once "MenuPrincipal.php";
            ?>
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
                                                                    <!-- Acá mostraremos los equipos que existen en la base de datos -->
                                                                    <script type="text/javascript">
                                                                        ObtenerDatos('Equipos');
                                                                    </script>
                                                                </select>
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
                                                                    <!-- Acá mostraremos el personal que existen en la base de datos -->
                                                                    <script type="text/javascript">
                                                                        ObtenerDatos('Empleados');
                                                                    </script>
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
                                                                    <!-- Acá mostraremos los puestos que existen en la base de datos -->
                                                                    <script type="text/javascript">
                                                                        ObtenerDatos('Material');
                                                                    </script>
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
                // Guardamos el id de la avería
                $idAveria = $_POST['idAveria'];
                // enviaremos un correo para confirmar que ya está creada la OT
                require("phpmailer/class.phpmailer.php"); //Importamos la función PHP class.phpmailer
                // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
                $VeridUsuario = "SELECT idUsuario FROM Averia WHERE idAveria=" . $idAveria . ";";
                // Hacemos la consulta
                $ResultadoConsultaID = $mysqli->query($VeridUsuario);
                $FilaResultadoID = $ResultadoConsultaID->fetch_assoc();
                $idUsuarioObtenerCorreo = $FilaResultadoID['idUsuario'];

                // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
                $VerCorreoUsuario = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioObtenerCorreo . ";";
                // Hacemos la consulta
                $ResultadoConsultaCorreo = $mysqli->query($VerCorreoUsuario);
                $FilaResultadoCorreo = $ResultadoConsultaCorreo->fetch_assoc();
                $CorreoUsuarioReporta = $FilaResultadoCorreo['CorreoUsuario'];

                // Obtendremos el correo del usuario que está creando la OT para enviarle el seguimiento
                // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
                $VerCorreoUsuarioCovial = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuario2 . ";";
                // Hacemos la consulta
                $ResultadoConsultaCorreoUsuarioCovial = $mysqli->query($VerCorreoUsuarioCovial);
                $FilaResultadoCorreoUsuarioCovial = $ResultadoConsultaCorreoUsuarioCovial->fetch_assoc();
                $CorreoUsuarioGenera = $FilaResultadoCorreoUsuarioCovial['CorreoUsuario'];

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
                $mail->AddAddress($CorreoUsuarioGenera, "Seguimiento de Averias");

                $mail->WordWrap = 50;
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
                            $IdEquip = $_POST['Equipo' . $Contador];
                            //echo $IdEquip;
                            //$Cantidad = $_POST['CantidadEquipo' . $Contador];
                            //echo $Cantidad;
                            $HorasLaborad = $_POST['CantidadHorasEquipo' . $Contador];
                            // Vamos a consultar a cuando nos sale cada hora y a multiplicarla por la cantidad necesitada
                            // Primero haremos la consulta
                            $VerCostoHora = "SELECT CostoPorHora FROM Equipo WHERE idEquipo=" . $IdEquip . ";";
                            // Ejecutamos la consulta
                            $ResultadoConsultaCostoHora = $mysqli->query($VerCostoHora);
                            // Guardamos la consulta en un array
                            $ResultadoConsultaCosto = $ResultadoConsultaCostoHora->fetch_assoc();
                            // Privilegio de usuario
                            $CostoPorHoraEquipo = $ResultadoConsultaCosto['CostoPorHora'];
                            // Hacemos el cálculo, multiplicamos el costo por equipo * la cantidad de horas, despues la multiplicamos por la cantidad de equipos necesarios
                            $TotalEnEquipo += $CostoPorHoraEquipo * $HorasLaborad;
                            // Si contiene la palabra inicial producto seguido de un número insertamos e valor en la tabla de datalle de hojas de responsabilidad
                            $ConsultaInsersionlistadoequipo = "INSERT INTO ListadoEquipo (idEquipo, idAveria, HorasLaboradas)
										       VALUES(" . $IdEquip . ", " . $idAveria . ", " . $HorasLaborad . ");";
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
                            $VerCostoHoraPersona = "SELECT CostoXHoraPersona FROM Persona WHERE idPersona=" . $IdEquip . ";";
                            // Ejecutamos la consulta
                            $ResultadoConsultaCostoHoraPersona = $mysqli->query($VerCostoHoraPersona);
                            // Guardamos la consulta en un array
                            $ResultadoConsultaCostoHora = $ResultadoConsultaCostoHoraPersona->fetch_assoc();
                            // Privilegio de usuario
                            $CostoPorHoraPersona = $ResultadoConsultaCostoHora['CostoXHoraPersona'];
                            // Hacemos el cálculo, multiplicamos el costo por equipo * la cantidad de horas, despues la multiplicamos por la cantidad de equipos necesarios
                            $TotalEnPersonal += $CostoPorHoraPersona * $HorasLaborad;
                            // Si contiene la palabra inicial producto seguido de un número insertamos e valor en la tabla de datalle de hojas de responsabilidad
                            $ConsultaInsersionlistadopersonal = "INSERT INTO ListadoPersonal (idAveria, idPersona, HorasLaboradas)
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
                            $VerCostoHoraMaterial = "SELECT PrecioxUnidad FROM Material WHERE idMaterial=" . $IdMaterial . ";";
                            // Ejecutamos la consulta
                            $ResultadoConsultaCostoHoraMaterial = $mysqli->query($VerCostoHoraMaterial);
                            // Guardamos la consulta en un array
                            $ResultadoConsultaCostoHoraMat = $ResultadoConsultaCostoHoraMaterial->fetch_assoc();
                            // Privilegio de usuario
                            $CostoPorHoraMaterial = $ResultadoConsultaCostoHoraMat['PrecioxUnidad'];
                            // Hacemos el cálculo, multiplicamos el costo por equipo * la cantidad de horas, despues la multiplicamos por la cantidad de equipos necesarios
                            $TotalEnMaterial += $CostoPorHoraMaterial * $CantidaMaterial;
                            // Si contiene la palabra inicial producto seguido de un número insertamos e valor en la tabla de datalle de hojas de responsabilidad
                            $ConsultaInsersionlistadomarterial = "INSERT INTO ListadoMaterial (idAveria, idMaterial, CantidadMaterial)
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
                // En esta variable guardaremos el valor de la insersión por la OT
                $idOrdenTrabajoGenerada = 0;
                /////////////////////////////////////////////////////////////
                //
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
                
                // Creamos la fecha y hora actual
                $FechaRegistro = new DateTime('now', new DateTimeZone('America/Guatemala'));
                $FechaRegistroOT = $FechaRegistro->format('Y-m-d H:i:s');
                
                $ConsultaInsersionOT = "INSERT INTO OrdenTrabajo (FechaOrdenTrabajo, CostoPersonalOrdenTrabajo, CostoEquipoOrdenTrabajo, CostoMaterialOrdenTrabajo, CostoTotalOrdenTrabajo, idAveria, EncargadoMunicipal, EncargadoCovial, idTrazabilidad)
                                                           VALUES('". $FechaRegistroOT ."'," . $TotalEnPersonal . ", " . $TotalEnEquipo . ", " . $TotalEnMaterial . ", " . $TotalNeto . ", " . $_POST['idAveria'] . ", " . $idUsuario2 . ", " . $EncargadoMunicipal . ", 3);";
                if (!$ResultadoInsersionOT = $mysqli->query($ConsultaInsersionOT)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $ConsultaInsersionOT . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    $idOrdenTrabajoGenerada = mysqli_insert_id($mysqli);
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
                                            <h1>Se ah generado la orden de trabajo No. <a href='http://www.siavg.ga/GenerarOTPDF.php?idOrdenTrabajo=" . $idAveria . "' target='_blank'>" . $idOrdenTrabajoGenerada ."</a> de la averia No. " . $idAveria . "</h1>
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
