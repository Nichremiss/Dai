<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Atencion
 *
 * @author Oskll
 */
class Atencion {
    private $atencionID;
    private $atencionFecha;
    private $atencionHora;
    private $atencionPR;
    private $atencionMR;
    private $atencionEstado;
    
    function __construct() {
        
    }
    
    function getAtencionID() {
        return $this->atencionID;
    }

    function getAtencionFecha() {
        return $this->atencionFecha;
    }

    function getAtencionHora() {
        return $this->atencionHora;
    }

    function getAtencionPR() {
        return $this->atencionPR;
    }

    function getAtencionMR() {
        return $this->atencionMR;
    }

    function getAtencionEstado() {
        return $this->atencionEstado;
    }

    function setAtencionID($atencionID) {
        $this->atencionID = $atencionID;
    }

    function setAtencionFecha($atencionFecha) {
        $this->atencionFecha = $atencionFecha;
    }

    function setAtencionHora($atencionHora) {
        $this->atencionHora = $atencionHora;
    }

    function setAtencionPR($atencionPR) {
        $this->atencionPR = $atencionPR;
    }

    function setAtencionMR($atencionMR) {
        $this->atencionMR = $atencionMR;
    }

    function setAtencionEstado($atencionEstado) {
        $this->atencionEstado = $atencionEstado;
    }



}
