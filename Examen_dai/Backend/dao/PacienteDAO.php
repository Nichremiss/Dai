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

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        
    }

    public function existePaciente($rut){
        $query = "SELECT * FROM paciente WHERE PACIENTE_RUT = :rut";
        
        $sentencia = $this->conexion->prepare($query);
       
        
        $sentencia->bindParam(":rut",$rut);
        
        return $sentencia->execute();
    }
    public function modificar($registro) {
        
    }


}
