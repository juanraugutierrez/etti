<?php

define('BASEPATH', true);

require '../system/config.php';
require '../system/autoload.php';
     $hostname ='mysql:dbname=covid;host=localhost';
     $usuario='root';
     $clave  ="";
     $conn = new PDO($hostname, $usuario, $clave);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         

            



              $sql="INSERT INTO `categoria`(`descripcion`) VALUES ('".$_POST['ncategoria']."');";
           
            
            echo $sql;
            try {
            $conn->query($sql);
            $sql="commit;";
            $conn->query($sql);
            $conn=null;
            
            header('location:../categoria.php');

            }
           catch(PDOException $err) {
             echo $err;
            //  header('location:/covid/pages/examples/404.html');
            


           }
          
              
              return "/index.php";
            
            // 

        
        
         
    ?>