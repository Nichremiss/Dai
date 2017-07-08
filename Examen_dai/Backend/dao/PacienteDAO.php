<?php

include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../domain/Paciente.php";


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PacienteDAO
 *
 * @author Oskll
 */
class PacienteDAO implements GenericDAO{
    private $conexion;
            
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }


    
    public function agregar($registro) {
        $query = "INSERT INTO paciente (PACIENTE_RUT, PACIENTE_NOMBRE_COMPLETO, PACIENTE_FECHA_NACIMIENTO, PACIENTE_SEXO, PACIENTE_DIRECCION, PACIENTE_TELEFONO, PACIENTE_PASSWORD) VALUES (:rut, :nombre, :nacimiento, :sexo, :direccion, :telefono, :password) ";
        
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getPacienteRut();
        $nombre = $registro->getPacienteNombreCompleto( );
        $fechaNacimiento = $registro->getPacienteFechaNacimiento();
        $sexo = $registro->getPacienteSexo();
        $direccion = $registro->getPacienteDomicilio();
        $telefono = $registro->getPacienteTelefono();
        $password = $registro->getPacientePassword();
        
        $sentencia->bindParam(':rut' , $rut);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':nacimiento', $fechaNacimiento);
        $sentencia->bindParam(':sexo', $sexo);
        $sentencia->bindParam(':direccion', $direccion);      
        $sentencia->bindParam(':telefono', $telefono);
        $sentencia->bindParam(':password', $password);
              
        return $sentencia->execute();
    }

    public function eliminar($rut) {
         $query = "DELETE  FROM paciente WHERE PACIENTE_RUT = :rut";
        
        $sentencia = $this->conexion->prepare($query);
        
        $sentencia->bindParam(':rut',$rut);
        
        return $sentencia->execute();
    }
    public function listarPorRut($rut){
        $query = "SELECT * FROM paciente WHERE PACIENTE_RUT = :rut";
        $registro = $this->conexion->prepare($query);
        
         $registro->bindParam(':rut',$rut);
         
        $registro->execute();
        
        if($registro != null) {
            foreach($registro as $fila) {
                $paciente = new Paciente();
                $paciente->setPacienteRut($fila["PACIENTE_RUT"]);
                $paciente->setPacienteNombreCompleto($fila["PACIENTE_NOMBRE_COMPLETO"]);
                $paciente->setPacienteFechaNacimiento($fila["PACIENTE_FECHA_NACIMIENTO"]);
                $paciente->setPacienteSexo($fila["PACIENTE_SEXO"]);
                $paciente->setPacienteDomicilio($fila["PACIENTE_DIRECCION"]);
                $paciente->setPacienteTelefono($fila["PACIENTE_TELEFONO"]);
                $paciente->setPacientePassword($fila["PACIENTE_PASSWORD"]);
             }
        }
        return $paciente;
    }
    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT * FROM paciente ");
        
        $registros->execute();
        if($registros != null) {
            foreach($registros as $fila) {
                $paciente = new Paciente();
                $paciente->setPacienteRut($fila["PACIENTE_RUT"]);
                $paciente->setPacienteNombreCompleto($fila["PACIENTE_NOMBRE_COMPLETO"]);
                $paciente->setPacienteFechaNacimiento($fila["PACIENTE_FECHA_NACIMIENTO"]);
                $paciente->setPacienteSexo($fila["PACIENTE_SEXO"]);
                $paciente->setPacienteDomicilio($fila["PACIENTE_DIRECCION"]);
                $paciente->setPacienteTelefono($fila["PACIENTE_TELEFONO"]);
                $paciente->setPacientePassword($fila["PACIENTE_PASSWORD"]);
               

                array_push($listado, $paciente);
                

            }
        }
        
        return $listado;
    }

    public function existePaciente($rut){
        $query = "SELECT * FROM paciente WHERE PACIENTE_RUT = :rut";
        
        $sentencia = $this->conexion->prepare($query);
       
        
        $sentencia->bindParam(":rut",$rut);
        $sentencia->execute();
        
        if($sentencia != null) {
            foreach($sentencia as $fila) {
                $paciente = new Paciente();
                $paciente->setPacienteRut($fila["PACIENTE_RUT"]);
                $paciente->setPacienteNombreCompleto($fila["PACIENTE_NOMBRE_COMPLETO"]);
                $paciente->setPacienteFechaNacimiento($fila["PACIENTE_FECHA_NACIMIENTO"]);
                $paciente->setPacienteSexo($fila["PACIENTE_SEXO"]);
                $paciente->setPacienteDomicilio($fila["PACIENTE_DIRECCION"]);
                $paciente->setPacienteTelefono($fila["PACIENTE_TELEFONO"]);
                $paciente->setPacientePassword($fila["PACIENTE_PASSWORD"]);
              
            }
        }
        return $paciente;
    }
    public function modificar($registro) {
        
    }


}
