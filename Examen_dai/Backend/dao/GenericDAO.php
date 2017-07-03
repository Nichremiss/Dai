<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Oskll
 */
interface GenericDAO {
   public function agregar($registro);
    
    public function eliminar($idRegistro);
    
    public function modificar($registro);
    
    public function listarTodos();
}
