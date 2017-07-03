<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author Oskll
 */
class Paciente implements JsonSerializable{
    private $pacienteRut;
    private $pacienteNombreCompleto;
    private $pacienteFechaNacimiento;
    private $pacienteSexo;
    private $pacienteDomicilio;
    private $pacienteTelefono;
    private $pacientePassword;
    
    function __construct() {
        
    }
    function getPacienteRut() {
        return $this->pacienteRut;
    }

    function getPacienteNombreCompleto() {
        return $this->pacienteNombreCompleto;
    }

    function getPacienteFechaNacimiento() {
        return $this->pacienteFechaNacimiento;
    }

    function getPacienteSexo() {
        return $this->pacienteSexo;
    }

    function getPacienteDomicilio() {
        return $this->pacienteDomicilio;
    }

    function getPacienteTelefono() {
        return $this->pacienteTelefono;
    }

    function getPacientePassword() {
        return $this->pacientePassword;
    }

    function setPacienteRut($pacienteRut) {
        $this->pacienteRut = $pacienteRut;
    }

    function setPacienteNombreCompleto($pacienteNombreCompleto) {
        $this->pacienteNombreCompleto = $pacienteNombreCompleto;
    }

    function setPacienteFechaNacimiento($pacienteFechaNacimiento) {
        $this->pacienteFechaNacimiento = $pacienteFechaNacimiento;
    }

    function setPacienteSexo($pacienteSexo) {
        $this->pacienteSexo = $pacienteSexo;
    }

    function setPacienteDomicilio($pacienteDomicilio) {
        $this->pacienteDomicilio = $pacienteDomicilio;
    }

    function setPacienteTelefono($pacienteTelefono) {
        $this->pacienteTelefono = $pacienteTelefono;
    }

    function setPacientePassword($pacientePassword) {
        $this->pacientePassword = $pacientePassword;
    }

        public function jsonSerialize() {
        $arregloAsociativo = Array("pacienteRut"=> $this->pacienteRut,
                                    "pacienteNombreCompleto"=> $this->pacienteNombreCompleto,
                                    "pacienteFechaNacimiento"=> $this->pacienteFechaNacimiento,
                                    "pacienteSexo"=> $this->pacienteSexo,
                                    "pacienteDomicilio"=> $this->pacienteDomicilio,
                                    "pacienteTelefono"=> $this->pacienteTelefono,
                                    "pacientePassword"=> $this->pacientePassword);  
        return $arregloAsociativo;
    }

}
