/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function myFunction(Mensaje) {
    // Pasamos el mensaje que deseamos
    document.getElementById("snackbar").innerHTML = Mensaje;
    
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");
    
    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

