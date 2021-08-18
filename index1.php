<?php

define('BASEPATH', true);
require 'system/config.php';
// require 'system/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

  print " Servidor:  ".$hostname." <br/>";
  print " Usuario:   ".$usuario." <br/>";
  print " Contrasena: ".$contrasena." <br/>";

            
				  $conn = new PDO($hostname,$usuario,$contrasena);	  





$path=getcwd();
echo $path;
$dir = opendir($path);
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
            // Si es una carpeta
            if( is_dir($path.$elemento) ){
                // Muestro la carpeta
                echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
            // Si es un fichero
            } else {
                // Muestro el fichero
                echo "<br />". $elemento;
            }
        }
    }
for ($i=0; $i < 100; $i++) { 
    echo $i."</br>";
}
echo "prueba";