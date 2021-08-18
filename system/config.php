<?php

/////////////////////////////////////
// Valores de rutas
/////////////////////////////////////

define('FOLDER_PATH', '..');


define('ROOT', $_SERVER['DOCUMENT_ROOT']);

// define('PATH_VIEWS', FOLDER_PATH . '/app/views/');

// define('PATH_CONTROLLERS', 'app/controllers/');

define('HELPER_PATH', 'etti.cl/system/helpers/');

define('LIBS_ROUTE', ROOT . FOLDER_PATH . 'etti.cl/system/libs/');

//////////////////////////////////////
// Valores de core
/////////////////////////////////////

define('DEFAULT_ARCH', 'login.php');

//////////////////////////////////////
// Valores de base de datos
/////////////////////////////////////


                      $hostname = 'mysql:host=localhost;dbname=rpropied_covid';
                      $usuario = 'rpropied';
                      $contrasena = 'b62D3Mqao3';
                      $base='covid';
                      $email='';

                   

define('HOST', 'localhost');
define('USER', 'rpopied_root');
define('PASSWORD', '');
define('DB_NAME', 'rpropied_covid');
define('PRUEBA', true);

$pruebas=1;

//////////////////////////////////////
// Valores configuracion
/////////////////////////////////////

define('ERROR_REPORTING_LEVEL', -1);
?>