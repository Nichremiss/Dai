<?php

include __DIR__ ."/controller/MedicoController.php";

     if($_SERVER["REQUEST_METHOD"]=="GET") {
         $json = MedicoController::listarEspecialdiades();
         echo $json;
          
    } else {
        echo "{\"error\": \"el método de la solicitud no está permitido\"";
        exit;
    }

