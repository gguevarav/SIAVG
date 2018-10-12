function validarPassword() {
    var p1 = document.getElementById("PasswordUsuario").value;
    var p2 = document.getElementById("RePasswordUsuario").value;
    
    if (p1 != p2){
        alert("Las contraseñas no coinciden");
        return false;
    } else {
        return true;
    }
}