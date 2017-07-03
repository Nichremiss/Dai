<?php

include_once __DIR__."/../dao/ConexionDB.php";
include_once __DIR__."/../dao/PacienteDAO.php";

/**
 * Description of PacienteController
 *
 * @author Oskll
 */
class PacienteController {
     public static function agregarPaciente($rut,$nombre,$nacimiento,$sexo,$direccion, $telefono, $password, $passrepetida){
          if ($password != $passrepetida) {
            return false;
        }
        $paciente = new Paciente();
        $paciente->setPacienteRut($rut);
        $paciente->setPacienteNombreCompleto($nombre);
        $paciente->setPacienteFechaNacimiento($nacimiento);
        $paciente->setPacienteSexo($sexo);
        
        $hasD = crypt($direccion,5);
        $paciente->setPacienteDomicilio($hasD);
        
        $paciente->setPacienteDomicilio($direccion);
        $paciente->setPacienteTelefono($telefono);
        
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $paciente->setPacientePassword($hash);
        
        $conexion = ConexionDB::getConexion();
        $daoPaciente = new PacienteDAO($conexion);    
        
        return $daoPaciente->agregar($paciente);
    }
    
    public static function existe($rut){
        $conexion = ConexionDB::getConexion();
        $daoPaciente = new PacienteDAO($conexion);
        
        return $daoPaciente->existePaciente($rut);
    }
}
