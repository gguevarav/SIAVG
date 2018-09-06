<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsFunciones
 *
 * @author DarkParadox
 */

include_once "Clase/clsConsultas.php";

class clsFunciones {
    //Funcion para cambio de contraseña
    Public Function CambioPassword($idUsuario, $Password, $Repassword){
        // Creacion de objeto
        $Consulta = new clsConsultas();
        // Incluimos el archivo de consultas
        //include_once "Seguridad/clsConsultas.php";
        // Variable que devuleve el valor
        $Respuesta;
        // Verificamos si las contraseñas son iguales
        if($Password != $Repassword){
            // Indicamos que las contraseñas no coinciden
            $Respuesta = "Contraseña erronea";
        }
        else{
            $ContraseniaEncriptada = md5($Password);
            $Tabla = "Usuario";
            $Cambio = "PasswordUsuario='" . $ContraseniaEncriptada . "' ";
            $Condicion ="WHERE idUsuario=".$idUsuario.";";
            $ResultadoConsulta = $Consulta->ConsultaUpdate($Tabla, $Cambio, $Condicion);
            
            if ($ResultadoConsulta){
                $Respuesta = "Contraseña cambiada";
            }
        }
        // Retornamos la respuesta
        return $Respuesta;
    }
}
