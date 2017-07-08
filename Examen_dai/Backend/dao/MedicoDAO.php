<?php

include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../domain/Medico.php";
include_once __DIR__."/../domain/Especialidad.php";

class MedicoDAO implements GenericDAO{
    private $conexion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregar($registro) {
        $query = "INSERT INTO medico (MEDICO_RUT, MEDICO_NOMBRE_COMPLETO, MEDICO_FECHA_CONTRATACION, MEDICO_ESPECIALIDAD_ID, MEDICO_CONSULTA) VALUES (:rut, :nombre, :fecha, :especialidad, :valor)";
        
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getMedicoRut();
        $nombre = $registro->getMedicoNombre();
        $fecha = $registro->getMedicoFechaContratacion();
        $especialidad = $registro->getMedicoEspecialidad();
        $consulta = $registro->getMedicoConsulta();
        
        $sentencia->bindParam(':rut', $rut);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':fecha', $fecha);
        $sentencia->bindParam(':especialidad', $especialidad );
        $sentencia->bindParam(':valor', $consulta);
        
        return $sentencia->execute();
        
    }
    
    public function existeMedico($rut){
        
        $query = "SELECT * FROM medico WHERE MEDICO_RUT = :rut";
        
        $sentencia = $this->conexion->prepare($query);
        $medicos = array();
        
        $sentencia->bindParam(":rut",$rut);
        $sentencia->execute();
        
        if($sentencia != null) {
            foreach($sentencia as $fila) {
                $medico = new Medico();
                $medico->setMedicoRut($fila["MEDICO_RUT"]);
                $medico->setMedicoNombre($fila["MEDICO_NOMBRE_COMPLETO"]);
                $medico->setMedicoFechaContratacion($fila["MEDICO_FECHA_CONTRATACION"]);
                $medico->setMedicoEspecialidad($fila["MEDICO_ESPECIALIDAD_ID"]);
                $medico->setMedicoConsulta($fila["MEDICO_CONSULTA"]);
                
                array_push($medicos, $medico);
            }
        }
        return $medicos;
    }
    public function eliminar($rut) {
        $query = "DELETE FROM medico WHERE MEDICO_RUT = :rut";
        $sentencia = $this->conexion->prepare($query);
        
        $sentencia->bindParam(':rut',$rut);
        
        return $sentencia->execute();
    }

    public function listarTodos() {
        $sentencia = $this->conexion->query("select M.MEDICO_RUT, M.MEDICO_NOMBRE_COMPLETO, M.MEDICO_FECHA_CONTRATACION, E.ESPECIALIDAD_DESC, M.MEDICO_CONSULTA FROM medico M JOIN especialidad E ON (E.ESPECIALIDAD_ID = M.MEDICO_ESPECIALIDAD_ID)");
        $medicos = array();
         if($sentencia != null) {
            foreach($sentencia as $fila) {
                $medico = new Medico();
                $medico->setMedicoRut($fila["MEDICO_RUT"]);
                $medico->setMedicoNombre($fila["MEDICO_NOMBRE_COMPLETO"]);
                $medico->setMedicoFechaContratacion($fila["MEDICO_FECHA_CONTRATACION"]);
                $medico->setMedicoEspecialidad($fila["ESPECIALIDAD_DESC"]);
                $medico->setMedicoConsulta($fila["MEDICO_CONSULTA"]);
                
                array_push($medicos, $medico);
            }
        }
        return $medicos;
    }
    public function especialidad($id){
        
    }

    public function modificar($registro) {
        
    }

    public function listarEspecialidad(){
        $especialidades = array();

        $sentencia = $this->conexion->query("SELECT * FROM especialidad ");
        
        $sentencia->execute();
        if($sentencia != null) {
            foreach($sentencia as $fila) {
                $especialidad = new Especialidad();
                $especialidad->setEspecialidadID($fila["ESPECIALIDAD_ID"]);
                $especialidad->setEspecialidadDESC($fila["ESPECIALIDAD_DESC"]);
                
                array_push($especialidades, $especialidad);
            }
        }
        return $especialidades;
    }

}
