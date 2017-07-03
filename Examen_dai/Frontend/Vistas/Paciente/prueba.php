<?php
include_once __DIR__."/../../../Backend/controller/UsuarioController.php";
include_once __DIR__."/../../../Backend/controller/PacienteController.php";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["rut"]) && isset($_POST["nombre"]) && isset($_POST["fecha"]) && isset($_POST["ddl_sexo"])
            && isset($_POST["direccion"]) && isset($_POST["telefono"])&& isset($_POST["pass"])&& isset($_POST["pass2"])){
        
            $paciente = PacienteController::existe($_POST["rut"]);
            
            if ($paciente != null) {
                
                $exito = PacienteController::agregarPaciente($_POST["rut"], $_POST["nombre"],
                                                         $_POST["fecha"], $_POST["ddl_sexo"],
                                                         $_POST["direccion"], $_POST["telefono"], $_POST["pass"], $_POST["pass2"]);
                
                $user = UsuarioController::agregarUsuario($_POST["rut"], $_POST["pass"], $_POST["pass2"], 5);
                if ($exito && $user) {
                    
                    //header("location: ../../index.php");
                    //return;
                }
            }
    }
            
}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($paciente == null) {
            echo  "no existe";
        }else{
            echo "Existe";
        }
        
        ?>
    </body>
</html>
