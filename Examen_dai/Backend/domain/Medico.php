<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Medico
 *
 * @author Oskll
 */
class Medico implements JsonSerializable{
    private $medicoRut;
    private $medicoNombre;
    private $medicoFechaContratacion;
    private $medicoEspecialidad;
    private $medicoConsulta;
    
    function __construct() {
        
    }

    function getMedicoRut() {
        return $this->medicoRut;
    }

    function getMedicoNombre() {
        return $this->medicoNombre;
    }

    function getMedicoFechaContratacion() {
        return $this->medicoFechaContratacion;
    }

    function getMedicoEspecialidad() {
        return $this->medicoEspecialidad;
    }

    function getMedicoConsulta() {
        return $this->medicoConsulta;
    }

    function setMedicoRut($medicoRut) {
        $this->medicoRut = $medicoRut;
    }

    function setMedicoNombre($medicoNombre) {
        $this->medicoNombre = $medicoNombre;
    }

    function setMedicoFechaContratacion($medicoFechaContratacion) {
        $this->medicoFechaContratacion = $medicoFechaContratacion;
    }

    function setMedicoEspecialidad($medicoEspecialidad) {
        $this->medicoEspecialidad = $medicoEspecialidad;
    }

    function setMedicoConsulta($medicoConsulta) {
        $this->medicoConsulta = $medicoConsulta;
    }

        
    public function jsonSerialize() {
        $arregloAsociativo = Array("medicoRut"=> $this->medicoRut,
                                    "medicoNombre"=> $this->medicoNombre,
                                    "medicoFecha"=> $this->medicoFechaContratacion,
                                    "medicoEspecialidad"=> $this->medicoEspecialidad,
                                    "medicoConsulta"=> $this->medicoConsulta);  
        return $arregloAsociativo;
    }

}
