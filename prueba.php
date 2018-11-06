<?php 
$fecha = new DateTime(now, new DateTimeZone('America/Guatemala'));
echo $fecha->format('Y-m-d H:i:s');
?>