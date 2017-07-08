<?php

include_once __DIR__."/GenericDAO.php";
include_once __DIR__."/../domain/Usuario.php";
include_once __DIR__."/../domain/TipoUsuario.php";
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
    public function buscarTipo($id){
        $tipos = array();
        $query = "SELECT * FROM tipo_usuario WHERE TIPO_USUARIO_ID = :rut";
        
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(':rut',$id);
        $sentencia->execute();
        if ($sentencia != NULL) {
            foreach($sentencia as $fila){
                $tipo = new TipoUsuario();
                $tipo->setTipoID($fila["TIPO_USUARIO_ID"]);
                $tipo->setTipoDESC($fila["TIPO_USUARIO_DESC"]);
                
                array_push($tipos, $tipo);
            }
            return $tipos;
        }
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
            $usuario->setUsuarioTipo($registro["USUARIO_TIPO_USER"]);
        }
        
        return $usuario;
    }
     public function eliminar($rut) {
         $query = "DELETE  FROM usuario WHERE USUARIO_RUT = :rut";
        
        $sentencia = $this->conexion->prepare($query);
        
        $sentencia->bindParam(':rut',$rut);
        
        return $sentencia->execute();
    }

    public function listarTodos() {
        $listado = array();
        
        $registros = $this->conexion->query("SELECT U.USUARIO_RUT, U.USUARIO_NOMBRE, T.TIPO_USUARIO_DESC FROM usuario U JOIN tipo_usuario T ON (U.USUARIO_TIPO_USER = T.TIPO_USUARIO_ID) ");
        
        $registros->execute();
        if($registros != null) {
            foreach($registros as $fila) {
                $usuario = new Usuario();
                $usuario->setUsuarioRut($fila["USUARIO_RUT"]);
                $usuario->setUsuarioNombre($fila["USUARIO_NOMBRE"]);
                
                $usuario->setUsuarioTipo($fila["TIPO_USUARIO_DESC"]);
              

                array_push($listado, $usuario);
                

            }
        }
        
        return $listado;
    }
public function listarPorRut($rut){
        $query = "SELECT * FROM usuario WHERE USUARIO_RUT = :rut";
        $registro = $this->conexion->prepare($query);
        
         $registro->bindParam(':rut',$rut);
         
        $registro->execute();
        
        if($registro != null) {
            foreach($registro as $fila) {
                $usuario = new Usuario();
                $usuario->setUsuarioRut($fila["USUARIO_RUT"]);
                $usuario->setUsuarioNombre($fila["USUARIO_NOMBRE"]);
                $usuario->setUsuarioPassword($fila["USUARIO_PASSWORD"]);
                $usuario->setUsuarioTipo($fila["USUARIO_TIPO_USER"]);
             }
        }
        return $usuario;
    }
    public function modificar($registro) {
        
    }
    public function listarTipoUsuario(){
        $tipos = array();
        
        $sentencia = $this->conexion->query("SELECT * FROM tipo_usuario ");
        
        $sentencia->execute();
        if($sentencia != null) {
            foreach($sentencia as $fila) {
                $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setTipoID($fila["TIPO_USUARIO_ID"]);
                $tipoUsuario->setTipoDESC($fila["TIPO_USUARIO_DESC"]);
                
                array_push($tipos, $tipoUsuario);
            }
        }
        return $tipos;
    }
    public function existeUsuario($rut){
        $listado = array();
        $query = "SELECT * FROM usuario WHERE USUARIO_RUT = :rut";
        
        $sentencia = $this->conexion->prepare($query);
       
        
        $sentencia->bindParam(":rut",$rut);
        $sentencia->execute();
        
        if($sentencia != null) {
            foreach($sentencia as $fila) {
                $usuario = new Usuario();
                $usuario->setUsuarioRut($fila["USUARIO_RUT"]);
                $usuario->setUsuarioNombre($fila["USUARIO_NOMBRE"]);
                $usuario->setUsuarioPassword($fila["USUARIO_RUT"]);
                $usuario->setUsuarioTipo($fila["USUARIO_TIPO_USER"]);


                array_push($listado, $usuario);
            }
        }
        return $listado;
    }
//put your code here
}
