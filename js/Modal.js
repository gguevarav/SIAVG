// Eliminación de usuario
$(document).ready(function () {
    $(document).on('click', '.CambiarRol', function () {
        var id = $(this).val();
        var Nombres = $('#NombrePersona' + id).text() + " " + $('#ApellidoUsuario' + id).text();

        $('#ModalCambioRol').modal('show');
        document.querySelector('#NombresApellidos').innerText = Nombres;
        $('#idUsuarioCambioRol').val(id);
    });
});

// Deshabilitacion de Material
$(document).ready(function () {
    $(document).on('click', '.DeshabilitarMaterial', function () {
        var id = $(this).val();
        var Nombre = $('#NombreMaterial' + id).text();
        var Producto = $('#idMaterial' + id).text();

        $('#ModalDeshabilitar').modal('show');
        document.querySelector('#NombreMaterialDeshabilitar').innerText = Nombre;
        $('#idMaterialDeshabilitar').val(id);
    });
});

// Aprobar avería
$(document).ready(function () {
    $(document).on('click', '.AprobarAveria', function () {
        var id = $(this).val();

        $('#ModalAprobarAveria').modal('show');
        $('#idAprobar').val(id);
    });
});

// Rechazar avería
$(document).ready(function () {
    $(document).on('click', '.RechazarAvería', function () {
        var id = $(this).val();

        $('#ModalRechazarAveria').modal('show');
        $('#idRechazar').val(id);
    });
});

// Habilitacion de Material
$(document).ready(function () {
    $(document).on('click', '.HabilitarMaterial', function () {
        var id = $(this).val();
        var Nombre = $('#NombreMaterial' + id).text();
        var Producto = $('#idMaterial' + id).text();

        $('#ModalHabilitar').modal('show');
        document.querySelector('#NombreMaterialHabilitar').innerText = Nombre;
        $('#idMaterialHabilitar').val(id);
    });
});

// Cancelar OT
$(document).ready(function () {
    $(document).on('click', '.CancelarOT', function () {
        var id = $(this).val();
        var idAveria = $('#CodigoAveria' + id).text();

        $('#ModalCancelarOT').modal('show');
        $('#idCancelar').val(id);
        $('#idAveriaCancelar').val(idAveria);
    });
});

// Cambiar estado a en proceso de OT
$(document).ready(function () {
    $(document).on('click', '.CambiarAEnProcesoOT', function () {
        var id = $(this).val();
        var idAveria = $('#CodigoAveria' + id).text();

        $('#ModalEnProcesoOT').modal('show');
        $('#idEnProceso').val(id);
        $('#idAveriaEnProceso').val(idAveria);
    });
});

// Cerrar OT
$(document).ready(function () {
    $(document).on('click', '.FinalizarOT', function () {
        var id = $(this).val();
        var idAveria = $('#CodigoAveria' + id).text();

        $('#ModalCerrarOT').modal('show');
        $('#idCerrar').val(id);
        $('#idAveriaCerrar').val(idAveria);
    });
});

// Edición de empleado
$(document).ready(function () {
    $(document).on('click', '.EditarPersona', function () {
        var id = $(this).val();
        var Persona = $('#idPersona' + id).text();
        var NombrePersona = $('#NombrePersona' + id).text();
        var ApellidoPersona = $('#ApellidoPersona' + id).text();
        var DireccionPersona = $('#DireccionPersona' + id).text();
        var TelefonoPersona = $('#TelefonoPersona' + id).text();
        var PrecioPorHora = $('#PrecioPorHora' + id).text();
        var Puesto = $('#Puesto' + id);

        $('#ModalEditarEmpleado').modal('show');
        $('#idEditar').val(Persona);
        $('#NombrePersona').val(NombrePersona);
        $('#ApellidoPersona').val(ApellidoPersona);
        $('#DireccionPersona').val(DireccionPersona);
        $('#TelefonoPersona').val(TelefonoPersona);
        $('#PrecioPorHora').val(PrecioPorHora);
        //$('#NombreTipoEmpleado').index(Puesto);
    });
});

// Deshabilitacion de empleado
$(document).ready(function () {
    $(document).on('click', '.DeshabilitarPersona', function () {
        var id = $(this).val();
        var Nombre = $('#NombrePersona' + id).text();
        var Producto = $('#idPersona' + id).text();

        $('#ModalDeshabilitarEmpleado').modal('show');
        document.querySelector('#NombreEmpledoDeshabilitar').innerText = Nombre;
        $('#idEmpleadoDeshabilitar').val(id);
    });
});

// Habilitacion de Material
$(document).ready(function () {
    $(document).on('click', '.HabilitarPersona', function () {
        var id = $(this).val();
        var Nombre = $('#NombrePersona' + id).text();
        var Producto = $('#idPersona' + id).text();

        $('#ModalHabilitarEmpleado').modal('show');
        document.querySelector('#NombreEmpleadoHabilitar').innerText = Nombre;
        $('#idEmpleadoHabilitar').val(id);
    });
});

// Deshabilitacion de Equipo
$(document).ready(function () {
    $(document).on('click', '.DeshabilitarEquipo', function () {
        var id = $(this).val();
        var Nombre = $('#NombreEquipo' + id).text();
        var Producto = $('#idEquipo' + id).text();

        $('#ModalDeshabilitarEmpleado').modal('show');
        document.querySelector('#NombreEquipoDeshabilitar').innerText = Nombre;
        $('#idEquipoDeshabilitar').val(id);
    });
});

// Habilitacion de Equipo
$(document).ready(function () {
    $(document).on('click', '.HabilitarEquipo', function () {
        var id = $(this).val();
        var Nombre = $('#NombreEquipo' + id).text();
        var Producto = $('#idEquipo' + id).text();

        $('#ModalHabilitar').modal('show');
        document.querySelector('#NombreEquipoHabilitar').innerText = Nombre;
        $('#idEquipoHabilitar').val(id);
    });
});

// Cancelación de Avería
$(document).ready(function () {
    $(document).on('click', '.CancelarAveria', function () {
        var id = $(this).val();
        var Nombres = $('#NombreUsuario' + id).text();
        var Apellidos = $('#ApellidoUsuario' + id).text();
        var Usuario = $('#idPersonaEliminar' + id).text();

        $('#ModalCancelarAveria').modal('show');
        //document.querySelector('#NombresApellidos').innerText = Nombres + " " + Apellidos;
        $('#idAEliminar').val(id);
    });
});

// Edición Material
$(document).ready(function () {
    $(document).on('click', '.EditarMaterial', function () {
        var id = $(this).val();
        var NombreMaterial = $('#NombreMaterial' + id).text();
        //var idMarca=$('#idMarca'+id).text();
        var PrecioMaterial = $('#PrecioMaterial' + id).text();

        $('#ModalEditarMaterial').modal('show');
        $('#idEditar').val(id);
        $('#NombreMaterial').val(NombreMaterial);
        //$('#Marca').val(idMarca);
        $('#PrecioMaterial').val(PrecioMaterial);
    });
});

// Edición Equipo
$(document).ready(function () {
    $(document).on('click', '.EditarEquipo', function () {
        var id = $(this).val();
        var CodigoEquipo = $('#CodigoEquipo' + id).text();
        var NombreEquipo = $('#NombreEquipo' + id).text();
        var PrecioMaterial = $('#CostoPorHora' + id).text();

        $('#ModalEditarEquipo').modal('show');
        $('#idEditar').val(id);
        $('#CodigoEquipo').val(CodigoEquipo);
        $('#NombreEquipo').val(NombreEquipo);
        $('#CostoPorHora').val(PrecioMaterial);
    });
});

$(document).ready(function () {
    (function ($) {
        $('#filtrar').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.buscar tr').hide();
            $('.buscar tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        })
    }(jQuery));
});