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
            function MuestraTablaAverias() {
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
                        setTimeout('MuestraTablaAverias()', 1000);
                    }
                }
                xmlhttp.open("GET", "TablaAverias.php?SolicitarTabla=si", true);
                xmlhttp.send();
            }
            window.onload = function startrefresh() {
                setTimeout('MuestraTablaAverias()', 1000);
            }
        </script>
    </head>
    <?php
    try {
        // Incluimos el archivo que valida si hay una sesión activa
        include_once "Seguridad/seguro.php";
        // Primero hacemos la consulta en la tabla de persona
        include_once "Seguridad/conexion.php";
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
                <div class="form-group">
                    <div class="container">
                        <div class="row text-center">
                            <!-- Snackbar -->
                            <div id="snackbar"></div> 
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-5 col-xs-offset-1">
                                        <h1 class="text-center">Averías reportadas por mí</h1>
                                    </div>
                                    <!-- Contenedor del ícono del Usuario -->
                                    <div class="col-xs-5 Icon">
                                        <!-- Icono de usuario -->
                                        <span class="glyphicon glyphicon-asterisk"></span>
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
                                                    <th class="text-center">Fecha de reporte</th>
                                                    <th class="text-center">Ubicación</th>
                                                    <th class="text-center">Fotografías</th>
                                                    <th class="text-center">Prioridad</th>
                                                    <th class="text-center">Urgencia</th>
                                                    <th class="text-center">Tamaño</th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Acción</th>
                                                </tr>
                                            </thead>
                                            <!-- Cuerpo de la tabla -->
                                            <tbody class="buscar" id="buscar">
                                                <script type="text/javascript">
                                                    MuestraTablaAverias();
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
            <div class="modal fade" id="ModalCancelarAveria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <center><h1 class="modal-title" id="myModalLabel">Cancelar reporte</h1></center>
                        </div>
                        <form method="post" action="Averias.php" id="frmDeshabilitar">
                            <div class="modal-body text-center">
                                <p class="lead">¿Está seguro que desea cancelar este reporte?</p>
                                <div class="form-group input-group">
                                    <input type="text" name="idAEliminar" style="width:350px; visibility:hidden;" class="form-control" id="idAEliminar">
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="CancelarReporte" class="btn btn-danger" value="Cancelar Reporte">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
            <!-- Edit Modal-->
            <div class="modal fade" id="ModalAprobarAveria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <center><h1 class="modal-title" id="myModalLabel">Aprobar orden de trabajo</h1></center>
                        </div>
                        <form method="post" action="Averias.php" id="frmDeshabilitar">
                            <div class="modal-body text-center">
                                <p class="lead">¿Está seguro que desea aprobar esta orden de trabajo?</p>
                                <div class="form-group input-group">
                                    <input type="text" name="idAprobar" style="width:350px; visibility:hidden;" class="form-control" id="idAprobar">
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="AprobarReporte" class="btn btn-success" value="Aprobar orden de trabajo">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal -->
            <!-- Edit Modal-->
            <div class="modal fade" id="ModalRechazarAveria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <center><h1 class="modal-title" id="myModalLabel">Recharzar orden de trabajo</h1></center>
                        </div>
                        <form method="post" action="Averias.php" id="frmDeshabilitar">
                            <div class="modal-body text-center">
                                <p class="lead">¿Está seguro que desea rechazar esta Orden de Trabajo?</p>
                                <div class="form-group input-group">
                                    <input type="text" name="idRechazar" style="width:350px; visibility:hidden;" class="form-control" id="idRechazar">
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="RechazarReporte" class="btn btn-danger" value="Rechar orden de trabajo">
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
            if (isset($_POST['CancelarReporte'])) {
                // Guardamos el id en una variable
                $idAEliminar = $_POST['idAEliminar'];
                // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
                $VeridUsuario = "SELECT idUsuario FROM Averia WHERE idAveria=" . $idAEliminar . ";";
                // Hacemos la consulta
                $ResultadoConsultaID = $mysqli->query($VeridUsuario);
                $FilaResultadoID = $ResultadoConsultaID->fetch_assoc();
                $idUsuarioMunicipal = $FilaResultadoID['idUsuario'];
                //$idUsuarioCovial = $FilaResultadoID['EncargadoCovial'];

                // Entonces ahora obtendremos el correo del usuario que está reportando para poder enviarle el numero de Avería que se ah creado
                $VerCorreoUsuario = "SELECT CorreoUsuario FROM Usuario WHERE idUsuario=" . $idUsuarioMunicipal . ";";
                // Hacemos la consulta
                $ResultadoConsultaCorreo = $mysqli->query($VerCorreoUsuario);
                $FilaResultadoCorreo = $ResultadoConsultaCorreo->fetch_assoc();
                $CorreoUsuarioReporta = $FilaResultadoCorreo['CorreoUsuario'];

                // Pasamos la dirección de correo
                $mail->AddAddress($CorreoUsuarioReporta, "Seguimiento de Averias");

                // Preparamos la consulta
                $query = "UPDATE Averia SET idTrazabilidad = 2 WHERE idAveria=" . $idAEliminar . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    echo "<script language=\"JavaScript\">\n";
                    echo "myFunction(\"Reporte cancelado\");\n";
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
                                            <h1>Su solicitud No. " . $idAEliminar . " ah sido cancelada</h2>
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
            // Código que recibe la información del formulario modal (Aprobar OT)
            if (isset($_POST['AprobarReporte'])) {
                // Guardamos el id en una variable
                $idAprobar = $_POST['idAprobar'];

                // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
                $VeridUsuario = "SELECT EncargadoMunicipal, EncargadoCovial FROM OrdenTrabajo WHERE idAveria=" . $idAprobar . ";";
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
                $query = "UPDATE Averia SET idTrazabilidad = 4 WHERE idAveria=" . $idAprobar . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 4 WHERE idAveria=" . $idAprobar . ";";
                    // Ejecutamos la consulta
                    if (!$resultado = $mysqli->query($query)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Orden de Trabajo aprobada\");\n";
                        echo "</script>";

                        // Obtendremos el numero de OT
                        $VerIdOT = "SELECT idOrdenTrabajo FROM OrdenTrabajo WHERE idAveria=" . $idAprobar . ";";
                        // Hacemos la consulta
                        $ResultadoConsultaidOT = $mysqli->query($VerIdOT);
                        $FilaResultadoidOT = $ResultadoConsultaidOT->fetch_assoc();
                        $idOT = $FilaResultadoidOT['idOrdenTrabajo'];

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
                                            <h1>Se ah aprobado la orden de trabajo No. <a href='http://www.siavg.ga/GenerarOTPDF.php?idOrdenTrabajo=" . $idOT . "' target='_blank'>" . $idOT ."</a> de la solicitud No. " . $idAprobar . ".</h2>
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
            // Código que recibe la información del formulario modal (Rechazar OT)
            if (isset($_POST['RechazarReporte'])) {
                // Guardamos el id en una variable
                $idRechazar = $_POST['idRechazar'];

                // Primero obtendremos el id del usuario que reportó la avería para poder saber que usuario consultar el correo
                $VeridUsuario = "SELECT EncargadoMunicipal, EncargadoCovial FROM OrdenTrabajo WHERE idAveria=" . $idRechazar . ";";
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
                $query = "UPDATE Averia SET idTrazabilidad = 5 WHERE idAveria=" . $idRechazar . ";";
                // Ejecutamos la consulta
                if (!$resultado = $mysqli->query($query)) {
                    echo "Error: La ejecución de la consulta falló debido a: \n";
                    echo "Query: " . $query . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                } else {
                    $query = "UPDATE OrdenTrabajo SET idTrazabilidad = 5 WHERE idAveria=" . $idRechazar . ";";
                    // Ejecutamos la consulta
                    if (!$resultado = $mysqli->query($query)) {
                        echo "Error: La ejecución de la consulta falló debido a: \n";
                        echo "Query: " . $query . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    } else {
                        echo "<script language=\"JavaScript\">\n";
                        echo "myFunction(\"Orden de Trabajo rechazada\");\n";
                        echo "</script>";
                        // Obtendremos el numero de OT
                        $VerIdOT = "SELECT idOrdenTrabajo FROM OrdenTrabajo WHERE idAveria=" . $idRechazar . ";";
                        // Hacemos la consulta
                        $ResultadoConsultaidOT = $mysqli->query($VerIdOT);
                        $FilaResultadoidOT = $ResultadoConsultaidOT->fetch_assoc();
                        $idOT = $FilaResultadoidOT['idOrdenTrabajo'];

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
                                            <h1>Se ah rechazado la orden de trabajo No. <a href='http://www.siavg.ga/GenerarOTPDF.php?idOrdenTrabajo=" . $idOT . "' target='_blank'>" . $idOT ."</a> de la solicitud No. " . $idAprobar . ".</h2>
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
} catch (Exception $ex) {
    echo $ex;
}
?>
</html>
