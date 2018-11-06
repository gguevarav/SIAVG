<?php
if (isset($_GET['Solicitud'])) {
    // Incluimos el archivo que valida si hay una sesión activa
    include_once "Seguridad/seguro.php";
    // Primero hacemos la consulta en la tabla de persona
    include_once "Seguridad/conexion.php";
    // Si en la sesión activa tiene privilegios de administrador puede ver el formulario
    if ($_GET['Solicitud'] == 'UnidadMedida') {
        $VerUM = "SELECT * FROM UnidadMedida;";
        // Hacemos la consulta
        $resultado = $mysqli->query($VerUM);
        ?>
        <option value="" disabled selected>Unidad de medida</option>
        <?php
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <option value="<?php echo $row['idUnidadMedida']; ?>"><?php echo $row['NombreUnidadMedida'] ?></option>
            <?php
        }
    }
    if ($_GET['Solicitud'] == 'Equipos') {
        $VerEquipos = "SELECT idEquipo, NombreEquipo FROM Equipo WHERE EstadoEquipo='Habilitado';";
        // Hacemos la consulta
        $resultado = $mysqli->query($VerEquipos);
        ?>
        <option value="" disabled selected>Seleccione el equipo</option>
        <?php
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <option value="<?php echo $row['idEquipo']; ?>"><?php echo $row['NombreEquipo'] ?></option>
            <?php
        }
    }
    if ($_GET['Solicitud'] == 'Empleados') {
        $VerEmpleado = "SELECT idPersona, NombrePersona, ApellidoPersona FROM Persona WHERE EstadoPersona='Activo' AND idTipoEmpleado!=1;";
        // Hacemos la consulta
        $resultado = $mysqli->query($VerEmpleado);
        ?>
        <option value="" disabled selected>Seleccione el empleado</option>
        <?php
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <option value="<?php echo $row['idPersona']; ?>"><?php echo $row['NombrePersona'] . " " . $row['ApellidoPersona'] ?></option>
            <?php
        }
    }
    if ($_GET['Solicitud'] == 'Material') {
        $VerMaterial = "SELECT idMaterial, NombreMaterial FROM Material WHERE EstadoMaterial='Habilitado';";
        // Hacemos la consulta
        $resultado = $mysqli->query($VerMaterial);
        ?>
        <option value="" disabled selected>Seleccione el material</option>
        <?php
        while ($row = mysqli_fetch_array($resultado)) {
            ?>
            <option value="<?php echo $row['idMaterial']; ?>"><?php echo $row['NombreMaterial'] ?></option>
            <?php
        }
    }
}
?>