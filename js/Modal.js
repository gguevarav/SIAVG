// Eliminación de usuario
 $(document).ready(function(){
    $(document).on('click', '.EliminarUsuario', function(){
        var id=$(this).val();
        var Nombres=$('#NombreUsuario'+id).text();
        var Apellidos=$('#ApellidoUsuario'+id).text();
        var Usuario=$('#idPersonaEliminar'+id).text();

        $('#frmEliminar').modal('show');
        document.querySelector('#NombresApellidos').innerText = Nombres + " " + Apellidos;
        $('#idAEliminar').val(Usuario);
    });
 });

// Edición usuario
$(document).ready(function(){
    $(document).on('click', '.EditarUsuario', function(){
        var id=$(this).val();
        var PersonaEliminar=$('#idPersonaEliminar'+id).text();
        var NombreUsuario=$('#NombreUsuario'+id).text();
        var ApellidoUsuario=$('#ApellidoUsuario'+id).text();
        var DireccionUsuario=$('#DireccionUsuario'+id).text();
        var DPIUsuario=$('#DPIUsuario'+id).text();
        var TelefonoUsuario=$('#TelefonoUsuario'+id).text();
        var FechaNacUsuario=$('#FechaNacUsuario'+id).text();
        var CorreoUsuario=$('#CorreoUsuario'+id).text();
        var PrivilegioUsuario=$('#PrivilegioUsuario'+id).text();

        $('#frmEditar').modal('show');
        $('#idEditar').val(PersonaEliminar);
        $('#NombreEditar').val(NombreUsuario);
        $('#ApellidoEditar').val(ApellidoUsuario);
        $('#DireccionEditar').val(DireccionUsuario);
        $('#DPIEditar').val(DPIUsuario);
        $('#TelefonoEditar').val(TelefonoUsuario);
        $('#FechaNacEditar').val(FechaNacUsuario);
        $('#CorreoEditar').val(CorreoUsuario);
        $('#PrivilegioEditar').val(PrivilegioUsuario);
    });
});

// Deshabilitacion de Material
 $(document).ready(function(){
    $(document).on('click', '.DeshabilitarMaterial', function(){
        var id=$(this).val();
        var Nombre=$('#NombreMaterial'+id).text();
        var Producto=$('#idMaterial'+id).text();

        $('#ModalDeshabilitar').modal('show');
        document.querySelector('#NombreMaterialDeshabilitar').innerText = Nombre;
        $('#idMaterialDeshabilitar').val(id);
    });
 });
 
 // Habilitacion de Material
 $(document).ready(function(){
    $(document).on('click', '.HabilitarMaterial', function(){
        var id=$(this).val();
        var Nombre=$('#NombreMaterial'+id).text();
        var Producto=$('#idMaterial'+id).text();

        $('#ModalHabilitar').modal('show');
        document.querySelector('#NombreMaterialHabilitar').innerText = Nombre;
        $('#idMaterialHabilitar').val(id);
    });
 });
 
 // Edición Material
$(document).ready(function(){
    $(document).on('click', '.EditarMaterial', function(){
        var id=$(this).val();
        var NombreMaterial=$('#NombreMaterial'+id).text();
        //var idMarca=$('#idMarca'+id).text();
        var PrecioMaterial=$('#PrecioMaterial'+id).text();

        $('#ModalEditarMaterial').modal('show');
        $('#idEditar').val(id);
        $('#NombreMaterial').val(NombreMaterial);
        //$('#Marca').val(idMarca);
        $('#PrecioMaterial').val(PrecioMaterial);
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