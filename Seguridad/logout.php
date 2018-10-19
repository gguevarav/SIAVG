<?php

try {
    // Iniciamos y Destruimos la sesión
    session_start();
    session_destroy();
    // Redirigimos el usuario al indexsv
    header('location:../login.php');
} catch (Exception $ex) {
    echo $ex;
}
?>