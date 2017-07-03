<?php
include_once __DIR__."/../dao/ConexionDB.php";
include_once __DIR__."/../dao/UsuarioDAO.php";
include_once __DIR__."/../domain/Usuario.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author Oskll
 */
class UsuarioController {
     public static function agregarUsuario($rut,$nombre,$password,$passrepetida,$tipo){
           if ($password != $passrepetida) {
            return false;
        }
        $usuario = new Usuario();
        $usuario->setUsuarioRut($rut);
        $usuario->setUsuarioNombre($nombre);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $usuario->setUsuarioPassword($hash);
        $usuario->setUsuarioTipo($tipo);
        
        $conexion = ConexionDB::getConexion();
        $daoUsuario = new UsuarioDao($conexion);    
        
        return $daoUsuario->agregar($usuario);
    }
    
    public static function validarUsuario($rut,$clave){
        $conexion = ConexionDB::getConexion();
        $daoUsuario = new UsuarioDAO($conexion);
        
        $usuario = $daoUsuario->validarUsuario($rut);
        
        if ($usuario == null) {
            return false;
        }
        
        if (password_verify($clave, $usuario->getUsuarioPassword())) {
            $_SESSION["usuario"] = $usuario->getUsuarioNombre();
            $_SESSION["TipoUsuario"] = $usuario->getUsuarioTipo();
            return true;
        }
        return false;
    }
}
