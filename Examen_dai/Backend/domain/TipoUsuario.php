<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoUsuario
 *
 * @author Oskll
 */
class TipoUsuario implements JsonSerializable{
    private $tipoID;
    private $tipoDESC;
    
    function __construct() {
        
    }

    function getTipoID() {
        return $this->tipoID;
    }

    function getTipoDESC() {
        return $this->tipoDESC;
    }

    function setTipoID($tipoID) {
        $this->tipoID = $tipoID;
    }

    function setTipoDESC($tipoDESC) {
        $this->tipoDESC = $tipoDESC;
    }

        
    public function jsonSerialize() {
         $arregloAsociativo = Array("tipoID"=> $this->tipoID,
                                    "tipoDESC"=> $this->tipoDESC);  
        return $arregloAsociativo;
    }

//put your code here
}
