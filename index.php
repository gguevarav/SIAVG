<!--
    Sistema de Información de Averías Viales de Guatemala
    Martes, 04 de Septiembre del 2018
    20:21 PM
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
            <title>SIAVG</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- vinculo a bootstrap -->
            <link rel="stylesheet" href="css/bootstrap.css">
            <!-- Temas-->
            <link rel="stylesheet" href="css/bootstrap-theme.min.css">
            <!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->
            <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <!-- Contenedor del ícono del Usuario -->
        <div id="Contenedor">
            <div class="IconoInicio">
                <div class="row TextoInicioP">
                    <div class="col-xs-7 TextoInicio">
                        <h2 class="text-center">Inicie sesión</h2>
                    </div>
                    <!-- Contenedor del ícono del Usuario -->
                    <div class="col-xs-4">
                        <!-- Icono de usuario -->
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <form name="FormEntrar" action="login.php" method="post">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" id="Usuario" aria-describedby="sizing-addon1" required>
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
                    </div>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" name="enviar" type="submit">Entrar</button>
                    <!--<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>-->
                </form>
            </div>
        </div>
        <?php
            include_once "Clase/ClsConsultas.php";
            $Consultas = new clsConsultas();
            if (isset($_POST['enviar'])) {
                $Resultado = $Consultas->LogIn($_POST['usuario'], $_POST['password']);
                if ($Resultado == "InicioValido"){
                    header("location:Login.php");
                }
                else{
                    echo $Resultado;
                }
            }
        ?>
    </body>
</html>
