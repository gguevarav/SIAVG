<?php

try {
    //Reanudamos la sesión
    @session_start();
    //Validamos si existe realmente una sesión activa o no
    if (empty($_SESSION["NombreUsuario"])) {
        //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión)
        header('location:login.php');
        exit();
    }
} catch (Exception $ex) {
    echo $ex;
}
?>