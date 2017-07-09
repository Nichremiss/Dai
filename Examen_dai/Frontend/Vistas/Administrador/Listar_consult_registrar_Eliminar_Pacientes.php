<?php
   
    session_start();

    include_once __DIR__."/../../../Backend/controller/PacienteController.php";
     include_once __DIR__."/../../../Backend/controller/UsuarioController.php";


            
    $listadoPersona = PacienteController::listarPacientes();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["txtRut"])){
            $exito = PacienteController::eliminar($_POST["txtRut"]);
            $usuario = UsuarioController::eliminar($_POST["txtRut"]);
            if($exito && $usuario){
               header("location: Listar_consult_registrar_Eliminar_Pacientes.php");
               return;
           }
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["nombre"]) && isset($_POST["fecha"]) && isset($_POST["ddl_sexo"])
            && isset($_POST["direccion"]) && isset($_POST["telefono"])&& isset($_POST["pass"])&& isset($_POST["pass2"])){
            
            
            
            $paciente = PacienteController::existePaciente($_POST["rut"]);
            $usuarioExiste = UsuarioController::existeUsuario($_POST["rut"]);
            
             if ($paciente == null && $usuarioExiste == null) {
                
                $agregar = PacienteController::agregarPaciente($_POST["rut"], $_POST["nombre"],
                                                         $_POST["fecha"], $_POST["ddl_sexo"],
                                                         $_POST["direccion"], $_POST["telefono"], $_POST["pass"], $_POST["pass2"]);
                
                $user = UsuarioController::agregarUsuario($_POST["rut"], $_POST["nombre"],$_POST["pass"], $_POST["pass2"], 4);
            
            if($user && $agregar){
               header("location: Listar_consult_registrar_Eliminar_Pacientes.php");
               return;
           }
        }
    }
            
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Exámen Final DAI-*****</title>

        <!-- css -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../../plugins/cubeportfolio/css/cubeportfolio.min.css">
        <link href="../../css/nivo-lightbox.css" rel="stylesheet" />
        <link href="../../css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
        <link href="../../css/owl.carousel.css" rel="stylesheet" media="screen" />
        <link href="../../css/owl.theme.css" rel="stylesheet" media="screen" />
        <link href="../../css/animate.css" rel="stylesheet" />
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/Tabla.css" rel="stylesheet">

        <!-- boxed bg -->
        <link id="bodybg" href="../../bodybg/bg1.css" rel="stylesheet" type="text/css" />
        <!-- template skin -->
        <link id="t-colors" href="../../color/default.css" rel="stylesheet">
        <script src="Js/jquery-3.2.1.js"></script>
        <script>
            function Mostrar(){
                $("#buscar").removeAttr("hidden");
            }   
        </script>
       
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">


        <div id="wrapper">

            <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <div class="top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-left">Poner Fecha Actual</p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-right">LLamanos +562 008 65 001</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container navigation">

                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="../../Index.php">
                            <img src="../../img/logo.png" alt="" width="150" height="40" />
                        </a>
                    </div>
                    <!--Navegador con sesiones -->
                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <?php
                            if (isset($_SESSION["usuario"])) {
                                echo '<p><b>Usuario autenticado</b>: ' . $_SESSION["usuario"] . '</p>';
                                echo '<li><a href="/Examen_dai/Frontend/logout.php">Cerrar Session</a></li>';
                                 if ($_SESSION["TipoUsuario"] == 1) {//Director
                                echo '<li><a href="ConsultarEstadisticas_Dir.php">Estadísticas</a><li>';
                                echo '<li><a href="Listar_Consultas_Dir.php">Consultar</a><li>';
                            }if ($_SESSION["TipoUsuario"] == 2) {//Administrador
                                echo '<li><a href="/Examen_dai/Frontend/Vistas/Administrador/Medicos.php">Administrar médicos</a><li>';
                                echo '<li><a href="/Examen_dai/Frontend/Vistas/Administrador/Listar_consult_registrar_Eliminar_Pacientes.php">Administrar Pacientes</a><li>';
                                echo '<li><a href="/Examen_dai/Frontend/Vistas/Administrador/Usuarios.php">Administrar Usuarios</a><li>';
                                
                            }if ($_SESSION["TipoUsuario"] == 3){//Secretaria
                                echo '<li><a href="Agendar_Confirmar_anular_atenciones.php">Adm. reservas</a><li>';
                                echo '<li><a href="List_Consultar_Pacientes_Medicos.php">Consultas</a><li>';
                                echo '<li><a href="List_consultar_atenciones.php"></a>';
                                echo '<li><a href="Marcar_perdida_realizada_atencion.php">Adm. Atenciones</a><li>';
                                
                            }if ($_SESSION["TipoUsuario"] == 4) {//Paciente
                                echo '<li><a href="Lista_Consulta_Atenciones.php">Atenciones</a>';
                                
                                }
                                
                            }
                            else {
                                echo '<li><a href="#" data-toggle="modal" data-target="#ModalLogin">Login</a></li>';
                                echo '<li><a href="/Examen_dai/Frontend/Vistas/Paciente/RegistroPaciente.php">Registro</a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                </div> 
                <!-- Collect the nav links, forms, and other content for toggling -->

                <!-- /.navbar-collapse -->

                <!-- /.container -->
            </nav>
        </div>
        <!-- Section: intro -->
        <section id="intro" class="intro">
            <div class="intro-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                                <h2 class="h-ultra">Registro Paciente</h2>
                            </div>
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                <h6 class="h-light">Campos Obligatorios *</h6>
                            </div>
                            <div class="well well-trans">
                                <div class="wow fadeInRight" data-wow-delay="0.1s">

                                    <ul class="lead-list">
                                        <form action="/Examen_dai/Frontend/Vistas/Administrador/Listar_consult_registrar_Eliminar_Pacientes.php" method="POST" role="form" class="contactForm lead">
                                             <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Rut</label>
                                                        <input type="text" name="rut" id="rut" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars" required>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre Completo</label>
                                                        <input type="text" name="nombre" id="nombre" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars" required>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Fecha Nacimiento</label>
                                                        <input type="date" name="fecha" id="fecha" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars" required>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Sexo</label>
                                                        <select name="ddl_sexo" class="select2" data-allow-clear="true" data-placeholder="" id="ddl_sexo" style="display: block;
                                                                width: 100%;
                                                                height: 34px;
                                                                padding: 6px 12px;
                                                                font-size: 14px;
                                                                line-height: 1.42857143;
                                                                color: #555;
                                                                background-color: #fff;
                                                                background-image: none;
                                                                border: 1px solid #ccc;
                                                                border-radius: 4px;" required>
                                                            <option></option>
                                                            <optgroup label="Seleccione una opción">
                                                                <option value="F">Femenino</option>
                                                                <option value="M">Masculino</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Dirección</label>
                                                        <input type="text" name="direccion" id="direccion" class="form-control input-md" data-rule="required" data-msg="The phone number is required" required>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>N° Télefono</label>
                                                        <input type="number" name="telefono" id="telefono" class="form-control input-md" data-rule="required" data-msg="The phone number is required" required>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <input type="password" name="pass" id="pass" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars" required>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Repita Contraseña</label>
                                                        <input type="password" name="pass2" id="pass2" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars" required>
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                            </div>

                                    <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                                        <a href="/Examen_dai/Frontend/Vistas/Administrador/consultarPaciente.php"><input type="button" class="btn btn-skin btn-lg" value="Buscar Paciente"><i class="fa fa-angle-right"></i></a>
                                        <input type="submit" class="btn btn-skin btn-lg" value="Guardar"><i class="fa fa-angle-right"></i>
                                        
                                    </p>
                                            <p class="lead-footer">* We'll contact you by phone & email later</p>
                                    </form>
                                    </ul>
                                </div>
                            </div>
                        </div>				
                    </div>		
                </div>
            </div>		
        </section>
       
        <form action="/Examen_dai/Frontend/Vistas/Administrador/Listar_consult_registrar_Eliminar_Pacientes.php" method="POST">

            <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                <h2 class="h-ultra">Lista de Pacientes</h2>
            </div>
            
            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>Fecha Nacimiento</th>
                            <th>Telefono Paciente</th>
                            <th>Acción</th>
                        </tr>

                        
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                Listado de personas registradas
                            </td>
                        </tr>
                    </tfoot>
                    <?php
                    foreach($listadoPersona as $paciente) {
                        /*@var $persona Persona */
                ?>
                    <tbody>
                        <td><?= $paciente->getPacienteRut() ?></td>
                        <td><?= $paciente->getPacienteNombreCompleto() ?></td>
                        <td><?= $paciente->getPacienteFechaNacimiento() ?></td>
                        <td><?= $paciente->getPacienteTelefono()?></td>
                        <td><input type="submit" name="eliminar" value="Eliminar"></td>
                        <td><input type="hidden" name="txtRut" value="<?= $paciente->getPacienteRut()?>"></td>
                
               
                    </tbody> 
                <?php 
                    }
                ?>
            </table> 
            </div>  
        </form>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>About Medicio</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                                </p>
                            </div>
                        </div>
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Information</h5>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Laboratory</a></li>
                                    <li><a href="#">Medical treatment</a></li>
                                    <li><a href="#">Terms & conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Medicio center</h5>
                                <p>
                                    Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                                </p>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                        </span> Monday - Saturday, 8am to 10pm
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                        </span> +62 0888 904 711
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                        </span> hello@medicio.com
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Our location</h5>
                                <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>		

                            </div>
                        </div>
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Follow us</h5>
                                <ul class="company-social">
                                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                    <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="text-left">
                                    <p>&copy;Copyright - Medicio Theme. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                <div class="text-right">
                                    <div class="credits">
                                        <!-- 
                                            All the links in the footer should remain intact. 
                                            You can delete the links only if you purchased the pro version.
                                            Licensing information: https://bootstrapmade.com/license/
                                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medicio
                                        -->
                                        <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </footer>
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

        <!-- Core JavaScript Files -->
        <script src="../../js/jquery.min.js"></script>	 
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/jquery.easing.min.js"></script>
        <script src="../../js/wow.min.js"></script>
        <script src="../../js/jquery.scrollTo.js"></script>
        <script src="../../js/jquery.appear.js"></script>
        <script src="../../js/stellar.js"></script>
        <script src="../../plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
        <script src="../../js/owl.carousel.min.js"></script>
        <script src="../../js/nivo-lightbox.min.js"></script>
        <script src="../../js/custom.js"></script>

    </body>

</html>
