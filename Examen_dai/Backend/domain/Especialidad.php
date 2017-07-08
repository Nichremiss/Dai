<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Especialidad
 *
 * @author Oskll
 */
class Especialidad implements JsonSerializable {
    private $especialidadID;
    private $especialidadDESC;
    
    function __construct() {
        
    }

    function getEspecialidadID() {
        return $this->especialidadID;
    }

    function getEspecialidadDESC() {
        return $this->especialidadDESC;
    }

    function setEspecialidadID($especialidadID) {
        $this->especialidadID = $especialidadID;
    }

    function setEspecialidadDESC($especialidadDESC) {
        $this->especialidadDESC = $especialidadDESC;
    }

        
    public function jsonSerialize() {
        $arregloAsociativo = Array("especialidadID"=> $this->especialidadID,
                                    "especialidadDESC"=> $this->especialidadDESC);  
        return $arregloAsociativo;
    }
}
