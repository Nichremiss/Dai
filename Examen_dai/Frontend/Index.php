<?php
session_start();
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
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
        <link href="css/nivo-lightbox.css" rel="stylesheet" />
        <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
        <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
        <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
        <link href="css/animate.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">

        <!-- boxed bg -->
        <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
        <!-- template skin -->
        <link id="t-colors" href="color/default.css" rel="stylesheet">

        <!-- =======================================================
            Theme Name: Medicio
            Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
            Author: BootstrapMade
            Author URL: https://bootstrapmade.com
        ======================================================= -->
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
                        <a class="navbar-brand" href="index.html">
                            <img src="img/logo.png" alt="" width="150" height="40" />
                        </a>
                    </div>
                    <!--Navegador con sesiones -->
                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <?php
                            if (isset($_SESSION["TipoUsuario"]) == 1) {//Director
                                echo '<li><a href="ConsultarEstadisticas_Dir.php">Estadísticas</a><li>';
                                echo '<li><a href="Listar_Consultas_Dir.php">Consultar</a><li>';
                                echo '<li><a href="logout.php"> Cerrar Session</a><li>';
                            }if (isset($_SESSION["TipoUsuario"]) == 2) {//Administrador
                                echo '<li><a href="Listar_ consultar_contratar_despedir_medicos.php">Administrar médicos</a><li>';
                                echo '<li><a href="Listar_consult_registrar_Eliminar_Pacientes.php">Administrar Pacientes</a><li>';
                                echo '<li><a href="Listar_consulta_ registrar_eliminar_usuarios.php">Administrar Usuarios</a><li>';
                                echo '<li><a href="logout.php"> Cerrar Session </a><li>';
                            }if (isset($_SESSION["TipoUsuario"]) == 3) {//Secretaria
                                echo '<li><a href="Agendar_Confirmar_anular_atenciones.php">Adm. reservas</a><li>';
                                echo '<li><a href="List_Consultar_Pacientes_Medicos.php">Consultas</a><li>';
                                echo '<li><a href="List_consultar_atenciones.php"></a>';
                                echo '<li><a href="Marcar_perdida_realizada_atencion.php">Adm. Atenciones</a><li>';
                                echo '<li><a href="logout.php"> Cerrar Session </a><li>';
                            }if (isset($_SESSION["TipoUsuario"]) == 4) {//Paciente
                                echo '<li><a href="Lista_Consulta_Atenciones.php">Atenciones</a>';
                                echo '<li><a href="logout.php"> Cerrar Session </a>';
                            } else {
                                echo '<li><a href="#" data-toggle="modal" data-target="#ModalLogin">Login</a></li>';
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
                        <div class="col-lg-6">
                            <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                                <h2 class="h-ultra">Centro Médico comunal</h2>
                            </div>
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                <h4 class="h-light">Dando una mejor calidad de atención para usted</h4>
                            </div>
                            <div class="well well-trans">
                                <div class="wow fadeInRight" data-wow-delay="0.1s">

                                    <ul class="lead-list">
                                        <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Mejor atención</strong><br /></span>Rapidez en gestión</li>
                                        <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Sistema de calidad</strong><br />Reservas online, registros y consultas</span></li>
                                        <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Mayor seguridad y proceso de información</strong><br /></span></li>
                                    </ul>
                                    <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                                        <a href="#" class="btn btn-skin btn-lg">Learn more <i class="fa fa-angle-right"></i></a>
                                    </p>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-6">
                            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                <img src="img/dummy/img-1.png" class="img-responsive" alt="" />
                            </div>
                        </div>					
                    </div>		
                </div>
            </div>		
        </section>



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

    </div>
    <!-- Modal 1 (Basic)-->
    <div id="ModalLogin" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">


                    <!--contenido-->
                    <div class="col-md-12">
                        <div class="form-wrapper">
                            <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                                <div class="panel panel-skin">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span>Login <small>(ingrese datos solicitados</small></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                                        <div id="errormessage"></div>

                                        <form action="" method="post" role="form" class="contactForm lead">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Rut</label>
                                                        <input type="text" name="last_name" id="last_name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <input type="text" name="phone" id="phone" class="form-control input-md" data-rule="required" data-msg="The phone number is required">
                                                        <div class="validation"></div>
                                                    </div>
                                                </div>
                                            </div>          
                                        </form>
                                    </div>
                                </div>				

                            </div>
                        </div>
                    </div>				
                    <div class="modal-footer">
                       <input type="submit" value="Ingresar" class="btn btn-skin btn-block btn-lg">

                                            <p class="lead-footer">* Si tiene inconveniente,comuniquese con la administracion</p>

                    </div>
                </div>

            </div>
        </div>
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

        <!-- Core JavaScript Files -->
        <script src="js/jquery.min.js"></script>	 
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/stellar.js"></script>
        <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/nivo-lightbox.min.js"></script>
        <script src="js/custom.js"></script>

</body>

</html>
