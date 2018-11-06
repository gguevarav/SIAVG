<!--
    Sistema de Información de Averías Viales de Guatemala
    Averías reportadas
    Viernes, 21 de septiembre del 2018
    01:05 AM
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
            function MostrarTablaListaOT() {
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
                        document.getElementById("buscar").innerHTML = xmlhttp.responseText;
                        setTimeout('MostrarTablaListaOT()', 1000);
                    }
                }
                xmlhttp.open("GET", "TablaListaOT.php?SolicitarTabla=si", true);
                xmlhttp.send();
            }
            window.onload = function startrefresh() {
                setTimeout('MostrarTablaListaOT()', 1000);
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
            //Incluimos el menú
            include_once "MenuPrincipal.php";
            ?>
            <br>
            <br>
            <br>
            <div class="form-group">
                <div class="container">
                    <div class="row text-center">
                        <!-- Snackbar -->
                        <div id="snackbar"></div> 
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-5 col-xs-offset-1">
                                    <h1 class="text-center">Ordenes de trabajo generadas por mi</h1>
                                </div>
                                <!-- Contenedor del ícono del Usuario -->
                                <div class="col-xs-5 Icon">
                                    <!-- Icono de usuario -->
                                    <span class="glyphicon glyphicon-list"></span>
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
                                                <th class="text-center">#</th>
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Código de avería</th>
                                                <th class="text-center">Fecha de creación</th>
                                                <th class="text-center">Costo total por personal</th>
                                                <th class="text-center">Costo total por equipo</th>
                                                <th class="text-center">Costo total por material</th>
                                                <th class="text-center">Costo total de la OT</th>
                                                <th class="text-center">Realizado por</th>
                                                <th class="text-center">Solicitado por</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Acción</th>
                                            </tr>
                                        </thead>
                                        <!-- Cuerpo de la tabla -->
                                        <tbody class="buscar" id="buscar">
                                            <script type="text/javascript">
                                                MostrarTablaListaOT();
                                            </script>
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
        <div class="modal fade" id="ModalCancelarOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cancelar orden de trabajo</h1></center>
                    </div>
                    <form method="post" action="ListarOrdenTrabajo.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea cancelar esta orden de trabajo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idCancelar" style="width:350px; visibility:hidden;" class="form-control" id="idCancelar">
                                <input type="text" name="idAveriaCancelar" style="width:350px; visibility:hidden;" class="form-control" id="idAveriaCancelar">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="CancelarOT" class="btn btn-warning" value="Cancelar orden de trabajo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalEnProcesoOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cambio de estado de orden de trabajo</h1></center>
                    </div>
                    <form method="post" action="ListarOrdenTrabajo.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea cambiar el estado de esta orden de trabajo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idEnProceso" style="width:350px; visibility:hidden;" class="form-control" id="idEnProceso">
                                <input type="text" name="idAveriaEnProceso" style="width:350px; visibility:hidden;" class="form-control" id="idAveriaEnProceso">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="EnProcesoOT" class="btn btn-success" value="Iniciar trabajo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- Edit Modal-->
        <div class="modal fade" id="ModalCerrarOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h1 class="modal-title" id="myModalLabel">Cerrar la orden de trabajo</h1></center>
                    </div>
                    <form method="post" action="ListarOrdenTrabajo.php" id="frmDeshabilitar">
                        <div class="modal-body text-center">
                            <p class="lead">¿Está seguro que desea cerrar esta orden de trabajo?</p>
                            <div class="form-group input-group">
                                <input type="text" name="idCerrar" style="width:350px; visibility:hidden;" class="form-control" id="idCerrar">
                                <input type="text" name="idAveriaCerrar" style="width:350px; visibility:hidden;" class="form-control" id="idAveriaCerrar">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" name="CerrarOT" class="btn btn-success" value="Cerrar OT">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <?php
        require("phpmailer/class.phpmailer.php"); //Importamos la función PHP class.phpmailer

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

        $mail->WordWrap = 50;

        // Código que recibe la información del formulario modal (Deshabilitar)
        if (isset($_POST['CancelarOT'])) {
            // Guardamos el id en una variable
            $idCancelar = $_POST['idCancelar'];
            $idAveriaCambiar = $_POST['idAveriaCancelar'];
            // Preparamos la consulta
            $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 2 WHERE idOrdenTrabajo=" . $idCancelar . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                // Preparamos la consulta, vamos a cambiar el estado de la Avería a solicitada
                $query = "UPDATE Averia SET idTrazabilidad = 1 WHERE idAveria=" . $idAveriaCambiar . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Orden de trabajo cancelada\");\n";
                    echo "</script>";
                }
            }
        }
        // Código que recibe la información del formulario modal (Orden de trabajo en proceso)
        if (isset($_POST['EnProcesoOT'])) {
            // Guardamos el id en una variable
            $idEnProceso = $_POST['idEnProceso'];
            // este es el id de la averia
            $idAveriaEnProceso = $_POST['idAveriaEnProceso'];
            
            // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
            $VeridUsuario = "SELECT EncargadoMunicipal, EncargadoCovial FROM OrdenTrabajo WHERE idAveria=" . $idAveriaEnProceso . ";";
            // Hacemos la consulta
            $ResultadoConsultaID = $mysqli->query($VeridUsuario);
            $FilaResultadoID = $ResultadoConsultaID->fetch_assoc();
            $idUsuarioMunicipal = $FilaResultadoID['EncargadoMunicipal'];
            $idUsuarioCovial = $FilaResultadoID['EncargadoCovial'];

            // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
            $VerCorreoUsuario = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioMunicipal . ";";
            // Hacemos la consulta
            $ResultadoConsultaCorreo = $mysqli->query($VerCorreoUsuario);
            $FilaResultadoCorreo = $ResultadoConsultaCorreo->fetch_assoc();
            $CorreoUsuarioReporta = $FilaResultadoCorreo['CorreoUsuario'];
            
            // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
            $VerCorreoUsuarioCovial = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioCovial . ";";
            // Hacemos la consulta
            $ResultadoConsultaCorreoUsuarioCovial = $mysqli->query($VerCorreoUsuarioCovial);
            $FilaResultadoCorreoUsuarioCovial = $ResultadoConsultaCorreoUsuarioCovial->fetch_assoc();
            $CorreoUsuarioCovial = $FilaResultadoCorreo['CorreoUsuario'];

            // Pasamos la dirección de correo
            $mail->AddAddress($CorreoUsuarioReporta, "Seguimiento de Averias");
            $mail->AddAddress($CorreoUsuarioCovial, "Seguimiento de Averias");

            //$idAveriaEnProceso = $_POST['idAveriaEnProceso'];
            // Preparamos la consulta
            $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 6 WHERE idOrdenTrabajo=" . $idEnProceso . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                // Preparamos la consulta, vamos a cambiar el estado de la Avería a solicitada
                $query = "UPDATE Averia SET idTrazabilidad = 6 WHERE idAveria=" . $idAveriaEnProceso . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Orden de trabajo en proceso\");\n";
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
                                            <h1>Su solicitud No. " . $idAveriaEnProceso . ", con numero de OT No. " . $idEnProceso . " se encuenta en proceso de ejecucion</h2>
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
        // Código que recibe la información del formulario modal (Cerrar OT)
        if (isset($_POST['CerrarOT'])) {
            // Guardamos el id en una variable
            $idCerrar = $_POST['idCerrar'];
            // Guardamos el id pero de la orden de trabajo
            $idAveriaCerrar = $_POST['idAveriaCerrar'];

            // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
            $VeridUsuario = "SELECT EncargadoMunicipal, EncargadoCovial FROM OrdenTrabajo WHERE idAveria=" . $idAveriaCerrar . ";";
            // Hacemos la consulta
            $ResultadoConsultaID = $mysqli->query($VeridUsuario);
            $FilaResultadoID = $ResultadoConsultaID->fetch_assoc();
            $idUsuarioMunicipal = $FilaResultadoID['EncargadoMunicipal'];
            $idUsuarioCovial = $FilaResultadoID['EncargadoCovial'];

            // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
            $VerCorreoUsuario = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioMunicipal . ";";
            // Hacemos la consulta
            $ResultadoConsultaCorreo = $mysqli->query($VerCorreoUsuario);
            $FilaResultadoCorreo = $ResultadoConsultaCorreo->fetch_assoc();
            $CorreoUsuarioReporta = $FilaResultadoCorreo['CorreoUsuario'];
            
            // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
            $VerCorreoUsuarioCovial = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioCovial . ";";
            // Hacemos la consulta
            $ResultadoConsultaCorreoUsuarioCovial = $mysqli->query($VerCorreoUsuarioCovial);
            $FilaResultadoCorreoUsuarioCovial = $ResultadoConsultaCorreoUsuarioCovial->fetch_assoc();
            $CorreoUsuarioCovial = $FilaResultadoCorreo['CorreoUsuario'];

            // Pasamos la dirección de correo
            $mail->AddAddress($CorreoUsuarioReporta, "Seguimiento de Averias");
            $mail->AddAddress($CorreoUsuarioCovial, "Seguimiento de Averias");
            
            // Preparamos la consulta
            $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 7 WHERE idOrdenTrabajo=" . $idCerrar . ";";
            // Ejecutamos la consulta
            if (!$resultado = $mysqli->query($query)) {
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            } else {
                // Preparamos la consulta, vamos a cambiar el estado de la Avería a solicitada
                $query = "UPDATE Averia SET idTrazabilidad = 7 WHERE idAveria=" . $idAveriaCerrar . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Orden de trabajo finalizada\");\n";
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
                                            <h1>Se finalizo su solicitud No. " . $idAveriaCerrar . ", con numero de OT No. " . $idCerrar . ".</h2>
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
