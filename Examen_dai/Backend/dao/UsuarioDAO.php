<?php

include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../domain/Usuario.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Oskll
 */
class UsuarioDAO implements GenericDAO{
    private $conexion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregar($registro) {
        $query = "INSERT INTO usuario(USUARIO_RUT, USUARIO_NOMBRE ,USUARIO_PASSWORD, USUARIO_TIPO_USER) VALUES(:usuariorut, :usuarionombre,:usuariopass, :usuariotipo)";
        $sentencia = $this->conexion->prepare($query);
        
        $rut = $registro->getUsuarioRut();
        $nombre = $registro->getUsuarioNombre();
        $pass = $registro->getUsuarioPassword();
        $tipo = $registro->getUsuarioTipo();
        
        $sentencia->bindParam(":usuariorut",$rut);
        $sentencia->bindParam(":usuarionombre",$nombre);
        $sentencia->bindParam(":usuariopass", $pass);
        $sentencia->bindParam(":usuariotipo", $tipo);
        
        return $sentencia->execute();
    }

    public function validarUsuario($rut){
        /*@var $usuario Usuario */
        $usuario = null;
        
        $sentencia = $this->conexion->prepare("SELECT USUARIO_RUT, USUARIO_NOMBRE,USUARIO_PASSWORD, USUARIO_TIPO_USER FROM usuario WHERE USUARIO_RUT = :rut");
        
        $sentencia->bindParam(':rut', $rut);
        
        $sentencia->execute();
        
        while($registro = $sentencia->fetch()) {            
            $usuario = new Usuario();
            $usuario->setUsuarioRut($registro["USUARIO_RUT"]);
            $usuario->setUsuarioNombre($registro["USUARIO_NOMBRE"]);
            $usuario->setUsuarioPassword($registro["USUARIO_PASSWORD"]);
            $usuario->setUsuarioTipo($registro["USUARIO_TIPO"]);
        }
        
        return $usuario;
    }
    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        
    }

    public function modificar($registro) {
        
    }

//put your code here
}
