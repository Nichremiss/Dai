<?php

include __DIR__ ."/controller/UsuarioController.php";

     if($_SERVER["REQUEST_METHOD"]=="GET") {
         $json = UsuarioController::listarTipoUsuario();
         echo $json;
          
    } else {
        echo "{\"error\": \"el método de la solicitud no está permitido\"";
        exit;
    }