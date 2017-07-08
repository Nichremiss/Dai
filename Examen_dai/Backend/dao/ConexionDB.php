<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexionDB
 *
 * @author Oskll
 */
class ConexionDB {
    const HOST = "localhost";
    const DBNAME = "examen_dai";
    const PORT = "3306";
    const USER = "root";
    const PASS = "";

    public static function getConexion() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";port=" . self::PORT . ";charset=utf8";

        try {
            $dbConexion = new PDO($dsn, self::USER, self::PASS);
            return $dbConexion;
        } catch (PDOException $exception) {
            switch ($exception->getCode()) {
                case 2002:
                    echo '<div class="error">No se pudo establecer la conexión con la base de datos, revise que &eacute;sta se encuentre en ejecuci&oacute;n.</div>';
                    exit;
                case 1045:
                    echo '<div class="error">No se pudo conectar a la base de datos, revise las credenciales configuradas</div>';
                    exit;
                case 1049: // La base de datos no existe.                        
                    $dbConexion = self::crearBaseDatos();
                    return $dbConexion;
                default:
                    echo '<div class="error">' . $exception->getMessage() . '</div>';
                    break;
            }
        }
    }

    private static function crearBaseDatos() {

        echo '<div class="warning">Base de datos no encontrada, se crear&aacute;...</div>';

        try {
            $dsn = "mysql:host=" . self::HOST . ";port=" . self::PORT . ";charset=utf8";
            $mysqlConexion = new PDO($dsn, self::USER, self::PASS);
            $mysqlConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mysqlConexion->exec("CREATE DATABASE " . self::DBNAME);
            $mysqlConexion->exec("USE " . self::DBNAME);

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `especialidad` (
      `ESPECIALIDAD_ID` int(100) NOT NULL DEFAULT '0',
      `ESPECIALIDAD_DESC` varchar(50) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
	

            $mysqlConexion->exec("
    INSERT INTO `especialidad` (`ESPECIALIDAD_ID`, `ESPECIALIDAD_DESC`) VALUES
        (1, 'Medicina'),
	(2, 'Cardiologia'),
	(3, 'Ginecologia'),
	(4,'Salud Mental'),
	(5,'Pediatria'),
	(6,'Otorrino'),
	(7,'Oftalmologia'),
	(8,'Neurologia'),
	(9,'Gastronterologia'),	
        (10,'Dermatologia'),
	(11,'Unidad De Tratamiento De Cefaleas'),	
        (12,'Kinesiologia'),
	(13,'Urologia'),
        (14,'Cirugia'),	
        (15,'Traumatologia'), 
        (16,'Enfermedades Respiratorias'),
	(17,'Centro Oftalmologico')");

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `estado`(
        `ESTADO_ID` int(100) NOT NULL DEFAULT '0',
	`ESTADO_DESC` varchar(50) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8");
           
                    
           
            $mysqlConexion->exec("
    INSERT INTO `estado` (`ESTADO_ID`, `ESTADO_DESC`) VALUES
        (1, 'Agendada'),
	(2, 'Confirmada'),
	(3, 'Anulada'),
	(4, 'Perdida'),
	(5, 'Realizada')");

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `tipo_usuario` (
		`TIPO_USUARIO_ID` int(100) NOT NULL DEFAULT '0',
		`TIPO_USUARIO_DESC` varchar(50) DEFAULT NULL
		)ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    INSERT INTO `tipo_usuario` (`TIPO_USUARIO_ID`, `TIPO_USUARIO_DESC`) VALUES

	(1,'Director'),
	(2,'Administrador'),
	(3,'Secretaria'),
	(4,'Paciente');");
            
            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `usuario` (
		`USUARIO_RUT` varchar(13) DEFAULT NULL,
                `USUARIO_NOMBRE` varchar(255) DEFAULT NULL,
		`USUARIO_PASSWORD` varchar(250) DEFAULT NULL,
		`USUARIO_TIPO_USER` int(100) NOT NULL DEFAULT '0'
		)ENGINE=InnoDB DEFAULT CHARSET=utf8");
             $mysqlConexion->exec("
    INSERT INTO `usuario`(`USUARIO_RUT`, `USUARIO_NOMBRE`, `USUARIO_PASSWORD`, `USUARIO_TIPO_USER`) VALUES

	('195075476','Oscar Andres Jara Diaz','123456',2);");
            
            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `paciente` (
		`PACIENTE_RUT` varchar(13) DEFAULT NULL,
		`PACIENTE_NOMBRE_COMPLETO` varchar(250) DEFAULT NULL,
		`PACIENTE_FECHA_NACIMIENTO` date DEFAULT NULL,
		`PACIENTE_SEXO` char DEFAULT NULL,
		`PACIENTE_DIRECCION` varchar(255) DEFAULT NULL,
		`PACIENTE_TELEFONO` int(100) NOT NULL DEFAULT '0',
                `PACIENTE_PASSWORD` varchar(255) DEFAULT NULL
		)ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `medico` ( 
	`MEDICO_RUT` varchar(13) DEFAULT NULL, 
	`MEDICO_NOMBRE_COMPLETO` varchar(250) DEFAULT NULL,
	`MEDICO_FECHA_CONTRATACION` date DEFAULT NULL, 
	`MEDICO_ESPECIALIDAD_ID` int(100) NOT NULL DEFAULT '0',
	`MEDICO_CONSULTA` bigint NOT NULL DEFAULT '0'
	 )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
    CREATE TABLE IF NOT EXISTS `atencion`(
		`ATENCION_ID` int(100) NOT NULL AUTO_INCREMENT,
		`ATENCION_FECHA` date DEFAULT NULL,
		`ATENCION_HORA` time DEFAULT NULL,
		`ATENCION_PACIENTE_RUT` varchar(13) DEFAULT NULL,
		`ATENCION_MEDICO_RUT` varchar(13) DEFAULT NULL,
		`ATENCION_ESTADO_ID` int(8) NOT NULL DEFAULT '0',
                PRIMARY KEY (`ATENCION_ID`)
		)ENGINE=InnoDB DEFAULT CHARSET=utf8");
        
            
            return $mysqlConexion;
            
        } catch (Exception $e) {
            echo $e->getMessage();
            die($e->getCode());
        }
    }
}
