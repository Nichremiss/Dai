<?php

include_once __DIR__."/../dao/ConexionDB.php";
include_once __DIR__."/../dao/MedicoDAO.php";

class MedicoController {
    public static function agregarMedico($rut,$nombre,$fecha,$especialidad,$consulta){
        $medico = new Medico();
        $medico->setMedicoRut($rut);
        $medico->setMedicoNombre($nombre);
        $medico->setMedicoFechaContratacion($fecha);
        $medico->setMedicoEspecialidad($especialidad);
        $medico->setMedicoConsulta($consulta);
        
        $conexion = ConexionDB::getConexion();
        $daoMedico = new MedicoDAO($conexion);
        
        return $daoMedico->agregar($medico);
    }
    public static function listarMedicos(){
        $conexion = ConexionDB::getConexion();
        $daoMedico = new MedicoDAO($conexion);
        
        return $daoMedico->listarTodos();
    }
    public static function listarEspecialdiades(){
        $conexion = ConexionDB::getConexion();
        $daoMedico = new MedicoDAO($conexion);

        return json_encode($daoMedico->listarEspecialidad());
    }
    
    public static function existeMedico($rut){
        $conexion = ConexionDB::getConexion();
        $daoMedico = new MedicoDAO($conexion);
        
        return $daoMedico->existeMedico($rut);
    }
    
    public static function eliminarMedico($rut){
        $conexion = ConexionDB::getConexion();
        $daoMedico = new MedicoDAO($conexion);
        
        return $daoMedico->eliminar($rut);
    }
}
