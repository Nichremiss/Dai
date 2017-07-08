<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Oskll
 */
class Usuario implements JsonSerializable {
    private $usuarioRut;
    private $usuarioNombre;
    private $usuarioPassword;
    private $usuarioTipo;
    
    function __construct() {
        
    }

    function getUsuarioRut() {
        return $this->usuarioRut;
    }

    function getUsuarioNombre() {
        return $this->usuarioNombre;
    }

    function getUsuarioPassword() {
        return $this->usuarioPassword;
    }

    function getUsuarioTipo() {
        return $this->usuarioTipo;
    }

    function setUsuarioRut($usuarioRut) {
        $this->usuarioRut = $usuarioRut;
    }

    function setUsuarioNombre($usuarioNombre) {
        $this->usuarioNombre = $usuarioNombre;
    }

    function setUsuarioPassword($usuarioPassword) {
        $this->usuarioPassword = $usuarioPassword;
    }

    function setUsuarioTipo($usuarioTipo) {
        $this->usuarioTipo = $usuarioTipo;
    }

    public function jsonSerialize() {
        $arregloAsociativo = Array("usuarioRut"=> $this->usuarioRut,
                                    "usuarioNombre"=> $this->usuarioNombre,
                                    "usuarioPassword"=> $this->usuarioPassword,
                                    "usuarioTipo"=> $this->usuarioTipo);  
        return $arregloAsociativo;
    }

}
