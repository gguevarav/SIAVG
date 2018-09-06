<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsConsultas
 *
 * @author f-Society
 */

    include_once "Seguridad/clsConexion.php";

    class clsConsultas {
        // Funcion para iniciar 
        Public Function LogIn($User, $Password){
            // Incluimos el archivo para conexion
            // Datos para la conexión a la base de datos.
            $PasswordEncriptado = md5($Password);
            $Resultado;
            // Consulta SQL, seleccionamos todos los datos de la tabla y obtenemos solo
            // la fila que tiene el usario especificado
            $query = "SELECT * FROM usuario WHERE NombreUsuario='".$User."'";
            if(!$resultado = $mysqli->query($query)){
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            }
            else{
                if ($resultado->num_rows == 0) {
                    $Resultado = "Usuaio no Registrado";
                    //echo "Usuario no registrado";
                    exit;
                }
                else{
                    $ResultadoConsulta = $resultado->fetch_assoc();
                    if($ResultadoConsulta['NombreUsuario'] === $User){
                        if($ResultadoConsulta['PasswordUsuario'] == $PasswordEncriptado){
                            $idPersona = $ResultadoConsulta['idPersona'];
                            $query = "SELECT * FROM persona WHERE idPersona='".$idPersona."'";
                            if(!$resultado = $mysqli->query($query)){
                                echo "Error: La ejecución de la consulta falló debido a: \n";
                                echo "Query: " . $query . "\n";
                                echo "Errno: " . $mysqli->errno . "\n";
                                echo "Error: " . $mysqli->error . "\n";
                                exit;
                            }
                            else{
                                $ResultadoConsultaPersona = $resultado->fetch_assoc();
                                session_start();
                                $_SESSION['NombreUsuario'] = $ResultadoConsultaPersona['NombrePersona'] . " " . $ResultadoConsultaPersona['ApellidoPersona'];
                                $_SESSION['Usuario'] = $ResultadoConsulta['NombreUsuario'];
                                $_SESSION['ContrasenaUsuario'] = $password;
                                $_SESSION['idUsuario'] = $ResultadoConsulta['idUsuario'];
                                $_SESSION['PrivilegioUsuario'] = $ResultadoConsulta['PrivilegioUsuario'];
                                header("location:login.php");
                            }
                        }
                        else{
                            $Resultado = "Contraseña Erronea";
                            //echo "Contraseña Erronea";
                        }
                    }
                    else{
                        $Resultado = "Usuario Erroneo";
                    }
                }
            }
            return $Resultado;
        }
        Public Function ConsultaUpdate($Tabla, $Cambios, $Condiciones){
            $Resultado = False;
            // Creamos la consulta para la insersión de los datos
            $Consulta = "UPDATE " . $Tabla . " SET " . $Cambios . $Condiciones.";";

            if(!$resultado1 = $mysqli->query($Consulta)){
                $Resultado = True;
                echo "Error: La ejecución de la consulta falló debido a: \n";
                echo "Query: " . $Consulta . "\n";
                echo "Error: " . $mysqli->errno . "\n";
                exit;
            }
            return $Resultado;
        }
    }
?>