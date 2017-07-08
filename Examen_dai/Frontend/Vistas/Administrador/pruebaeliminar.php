
<?php 
session_start();



include_once __DIR__."/../../../Backend/controller/MedicoController.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["rut"]) && isset($_POST["nombre"]) && isset($_POST["fechaN"]) && isset($_POST["ddl_especialidad"])
                && isset($_POST["valor"]) ){
            
               
                    $agregarMedico = MedicoController::agregarMedico($_POST["rut"], $_POST["nombre"],
                                                              $_POST["fechaN"],$_POST["ddl_especialidad"], $_POST["valor"]);
                    if ($agregarMedico) {
                        header("location: Medicos.php");
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
        <script src="../../Js/jquery-3.2.1.js"></script>
        <script src="../../Js/usuario.js"></script>
        <title></title>
    </head>
    <body>
      <?php
      echo $_POST["rutEliminar"]
      
      ?>
    </body>
</html>
