<?php

define('BASEPATH', true);

require 'system/config.php';
require 'system/autoload.php';
    //  $hostname ='mysql:dbname=covid;host=localhost';
    //  $usuario='root';
    //  $clave  ="";
    //  $conn = new PDO($hostname, $usuario, $clave);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO `clientes`(`nombre`, `email`,`direccion`,`telefono`) VALUES ('".$_POST['nombre']."','".$_POST['email']."','".$_POST['direccion']."','".$_POST['telefono']."');";
            
            echo $sql;
            try {
            $conn->query($sql);
            $sql="commit;";
            $conn->query($sql);
            $conn=null;
            
            header('location:../clientes.php');

            }
           catch(PDOException $err) {
             echo $err;
            //  header('location:/covid/pages/examples/404.html');
            


           }
          
              
              return "/index.php";
            
            // 

        
        
         
    ?>