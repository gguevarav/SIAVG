<?php

if (isset($_GET['idOrdenTrabajo'])) {
    require_once __DIR__ . '/vendor/autoload.php';
    include_once 'Seguridad/conexion.php';
    $mpdf = new \Mpdf\Mpdf();

    // Vamos a obtener toda la información de la OT
    $InfoAveria = "SELECT * FROM OrdenTrabajo WHERE idAveria=" . $_GET['idOrdenTrabajo'] . " AND idTrazabilidad!=2;";
    // Hacemos la consulta
    $ResultadoInfoAveria = $mysqli->query($InfoAveria);
    $FilaResultadoInfoAveria = $ResultadoInfoAveria->fetch_assoc();

    // Obtendremos la ubicación de la avería
    $UbicacionAveria = "SELECT UbicacionAveria, FechaReporteAveria FROM Averia WHERE idAveria=" . $_GET['idOrdenTrabajo'] . ";";
    // Hacemos la consulta
    $ResultadoUbicacionAveria = $mysqli->query($UbicacionAveria);
    $FilaResultadoUbicacionAveria = $ResultadoUbicacionAveria->fetch_assoc();
    //$UbicacionAveriaMostrar = $FilaResultadoUbicacionAveria['UbicacionAveria'];
    // Buscaremos los usuario que trabajaron para el reporte y la oT
    $EncargadoMunicipal = "SELECT NombreUsuario FROM Usuario WHERE idUsuario=" . $FilaResultadoInfoAveria['EncargadoMunicipal'] . ";";
    // Hacemos la consulta
    $ResultadoConsultaEncargadoMunicipal = $mysqli->query($EncargadoMunicipal);
    $FilaResultadoEncargadoMunicipal = $ResultadoConsultaEncargadoMunicipal->fetch_assoc();
    // $NombreUsuarioSolicitado = $FilaResultadoEncargadoMunicipal['NombreUsuario'];

    $EncargadoCovial = "SELECT NombreUsuario FROM Usuario WHERE idUsuario=" . $FilaResultadoInfoAveria['EncargadoCovial'] . ";";
    // Hacemos la consulta
    $ResultadoConsultaEncargadoCovial = $mysqli->query($EncargadoCovial);
    $FilaResultadoEncargadoCovial = $ResultadoConsultaEncargadoCovial->fetch_assoc();

    // Ahora buscaremos todos los Materiales/Equipos a usar/Personal que estan en las tablas para mostrarlas
    // Tendremos inicialmente una variable que guarde el total final de la cotización
    $TotalEquipos = 0;
    $TotalMaterial = 0;
    $TotalPersona = 0;
    $TotalNeto = 0;
    $ContadorItems = 1;
    // Equipos
    $ListadoEquipos = "SELECT * FROM ListadoEquipo WHERE idAveria=" . $_GET['idOrdenTrabajo'] . ";";
    // Hacemos la consulta
    $resultadoEquipos = $mysqli->query($ListadoEquipos);
    // Donde se almacena toda la info extraída
    $ColumnasEquipos;
    // Insertamos cada resultado en la variable
    while ($row = mysqli_fetch_array($resultadoEquipos)) {
        // Buscaremos el nombre y el precio por equipo
        $InfoEquipo = "SELECT NombreEquipo, CostoPorHora FROM Equipo WHERE idEquipo=" . $row['idEquipo'] . ";";
        // Hacemos la consulta
        $ResultadoConsultaInfoEquipo = $mysqli->query($InfoEquipo);
        $FilaResultadoInfoEquipo = $ResultadoConsultaInfoEquipo->fetch_assoc();

        $ColumnasEquipos .= '<tr>
            <td class="text-center">' . $ContadorItems . '</td>
            <td class="text-center">' . $row['HorasLaboradas'] . '</td>
            <td class="text-center">Hora</td>
            <td>' . $FilaResultadoInfoEquipo['NombreEquipo'] . '</td>
            <td class="text-center">Q. ' . $FilaResultadoInfoEquipo['CostoPorHora'] . '</td>
            <td class="text-right">Q. ' . $row['HorasLaboradas'] * $FilaResultadoInfoEquipo['CostoPorHora'] . '.00</td>
        </tr>';
        $TotalEquipos += $row['HorasLaboradas'] * $FilaResultadoInfoEquipo['CostoPorHora'];
        $ContadorItems++;
    }

    // Material
    $ListadoMaterial = "SELECT * FROM ListadoMaterial WHERE idAveria=" . $_GET['idOrdenTrabajo'] . ";";
    // Hacemos la consulta
    $resultadoMaterial = $mysqli->query($ListadoMaterial);
    // Donde se almacena toda la info extraída
    $ColumnasMaterial;
    // Insertamos cada resultado en la variable
    while ($row = mysqli_fetch_array($resultadoMaterial)) {
        // Buscaremos el nombre y el precio y unidad de medida por material
        $InfoMaterial = "SELECT NombreMaterial, PrecioXUnidad, idUnidadMedida FROM Material WHERE idMaterial=" . $row['idMaterial'] . ";";
        // Hacemos la consulta
        $ResultadoConsultaInfoMaterial = $mysqli->query($InfoMaterial);
        $FilaResultadoInfoMaterial = $ResultadoConsultaInfoMaterial->fetch_assoc();

        // Buscaremos el nombre del nombre del la unidad de medida
        $NombreUnidadMedida = "SELECT NombreUnidadMedida FROM UnidadMedida WHERE idUnidadMedida=" . $FilaResultadoInfoMaterial['idUnidadMedida'] . ";";
        // Hacemos la consulta
        $ResultadoConsultaNombreUnidadMedida = $mysqli->query($NombreUnidadMedida);
        $FilaResultadoNombreUnidadMedida = $ResultadoConsultaNombreUnidadMedida->fetch_assoc();
        $NombreUM = $FilaResultadoNombreUnidadMedida['NombreUnidadMedida'];

        // Debemos saber el Nombre de la unidad de medida del material
        $ColumnasMaterial .= '<tr>
            <td class="text-center">' . $ContadorItems . ' </td>
            <td class="text-center">' . $row['CantidadMaterial'] . '</td>
            <td class="text-center">' . $NombreUM . '</td>
            <td>' . $FilaResultadoInfoMaterial['NombreMaterial'] . '</td>
            <td class="text-center">Q. ' . $FilaResultadoInfoMaterial['PrecioXUnidad'] . '</td>
            <td class="text-right">Q. ' . $row['CantidadMaterial'] * $FilaResultadoInfoMaterial['PrecioXUnidad'] . '.00</td>
        </tr>';
        $TotalMaterial += $row['CantidadMaterial'] * $FilaResultadoInfoMaterial['PrecioXUnidad'];
        $ContadorItems++;
    }

    // Personal
    $ListadoPersonal = "SELECT * FROM ListadoPersonal WHERE idAveria=" . $_GET['idOrdenTrabajo'] . ";";
    // Hacemos la consulta
    $resultadoPersonal = $mysqli->query($ListadoPersonal);
    // Donde se almacena toda la info extraída
    $ColumnasPersonal;
    // Insertamos cada resultado en la variable
    while ($row = mysqli_fetch_array($resultadoPersonal)) {
        // Buscaremos el costo por hora y el id de tipo de empleado para mostrar el puesto de cada uno y no el nombre
        $InfoPersona = "SELECT CostoXHoraPersona, idTipoEmpleado FROM Persona WHERE idPersona=" . $row['idPersona'] . ";";
        // Hacemos la consulta
        $ResultadoConsultaInfoPersona = $mysqli->query($InfoPersona);
        $FilaResultadoInfoPersona = $ResultadoConsultaInfoPersona->fetch_assoc();

        // Buscaremos el nombre del tipo empleado
        $NombreTipoEmpleado = "SELECT NombreTipoEmpleado FROM TipoEmpleado WHERE idTipoEmpleado=" . $FilaResultadoInfoPersona['idTipoEmpleado'] . ";";
        // Hacemos la consulta
        $ResultadoConsultaNombreTipoEmpleado = $mysqli->query($NombreTipoEmpleado);
        $FilaResultadoNombreTipoEmpleado = $ResultadoConsultaNombreTipoEmpleado->fetch_assoc();
        $NombreTipoEmpl = $FilaResultadoNombreTipoEmpleado['NombreTipoEmpleado'];

        $ColumnasPersonal .= '<tr>
            <td class="text-center">'. $ContadorItems . '</td>
            <td class="text-center">' . $row['HorasLaboradas'] . '</td>
            <td class="text-center">Hora</td>
            <td>' . $NombreTipoEmpl . '</td>
            <td class="text-center">Q. ' . $FilaResultadoInfoPersona['CostoXHoraPersona'] . '</td>
            <td class="text-right">Q. ' . $row['HorasLaboradas'] * $FilaResultadoInfoPersona['CostoXHoraPersona'] . '.00</td>
        </tr>';
        $TotalPersona += $row['HorasLaboradas'] * $FilaResultadoInfoPersona['CostoXHoraPersona'];
        $ContadorItems++;
    }
    
    // Obtenemos el total Final
    $TotalNeto = $TotalEquipos + $TotalMaterial + $TotalPersona;
    
    $mpdf->WriteHTML('
                <!DOCTYPE html>
                <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <link rel="stylesheet" href="css/bootstrap.css">
                </head>
                <body>
                    <div class="container">
                        <div class="container-fluid">
                            <div class="text-center">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="imagenes/logo3.jpg" height="150" width="150">
                                            </td>
                                            <td>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center"><h2>Unidad Ejecutadora de Conservación Vial</h2></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center"><h3> - COVIAL - </h3></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <img src="imagenes/logo3.jpg" height="150" width="150">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="table-responsive">          
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center" colspan=4>
                                                <strong>Información general</strong>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Código de Cotización:</strong>
                                            </td>
                                            <td class="text-center">
                                                ' . $FilaResultadoInfoAveria['idOrdenTrabajo'] . '
                                            </td>
                                            <td>
                                                <strong>Código de solicutud:</strong>
                                            </td>
                                            <td class="text-center">
                                                ' . $FilaResultadoInfoAveria['idAveria'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Ubicación:</strong>
                                            </td>
                                            <td class="text-center" colspan=3>
                                                ' . $FilaResultadoUbicacionAveria['UbicacionAveria'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Cotizado por:</strong>
                                            </td>
                                            <td class="text-center">
                                                ' . $FilaResultadoEncargadoCovial['NombreUsuario'] . '
                                            </td>
                                            <td>
                                                <strong>Solicitado por:</strong>
                                            </td>
                                            <td class="text-center">
                                                ' . $FilaResultadoEncargadoMunicipal['NombreUsuario'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Fecha de Cotización:</strong>
                                            </td>
                                            <td class="text-center">
                                                ' . $FilaResultadoInfoAveria['FechaOrdenTrabajo'] . '
                                            </td>
                                            <td>
                                                <strong>Fecha de solicitud:</strong>
                                            </td>
                                            <td class="text-center">
                                                ' . $FilaResultadoUbicacionAveria['FechaReporteAveria'] . '
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <strong>Propuesta económica: </strong>
                        </div>
                        <div class="panel panel-primary">
                            <div class="table-responsive">          
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center" colspan=6>
                                                <strong>Detalles</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">UM</th>
                                            <th class="text-center">Descripción</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>'
            . $ColumnasEquipos .
            $ColumnasMaterial .
            $ColumnasPersonal .
            '</tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="table-responsive">          
                                <table class="table table-bordered">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" colspan=2>
                                                <strong>Totales</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total en Equipos:
                                            </td>
                                            <td class="text-right">
                                                Q. ' . $TotalEquipos . '.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total en Material:
                                            </td>
                                            <td class="text-right">
                                                Q. ' . $TotalMaterial . '.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total en Personal:
                                            </td>
                                            <td class="text-right">
                                                Q. ' . $TotalPersona . '.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Total Neto:</strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>Q. ' . $TotalNeto . '.00 </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="container-fluid">
                            <div class="text-center">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                ' . $FilaResultadoEncargadoCovial['NombreUsuario'] . '<br>
                                                _____________________________<br>
                                                Realizado Por
                                            </td>
                                            <td class="text-center">
                                                ' . $FilaResultadoEncargadoMunicipal['NombreUsuario'] . '<br>
                                                _____________________________<br>
                                                Aprobado Por
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </body>
            </html>');

    $mpdf->Output('OrdenDeTrabajo.pdf', 'I');
    exit;
}
?>
