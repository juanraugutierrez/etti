<?php
define('BASEPATH', true);

require_once "encriptar.php";
require '../system/config.php';


 $conn = new PDO($hostname, $usuario, $contrasena);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo $_POST['email'];

    
     $passw=$encriptar ( $_POST["password"]);
     
     $fecha= date('Y-m-d H:i:s');
     

   


 
          $tabla="usuarios";
         
            
            $sql = "INSERT INTO `usuarios`(`email`, `password`,`fecha`) VALUES ('".$_POST['email']."','".$passw."','".$fecha."');";
            
            echo $sql;
            try {
            $conn->query($sql);
            $conn=null;
            header('location:/covid/login.php');

            }
           catch(PDOException $err) {
             echo $err;
            //  header('location:/covid/pages/examples/404.html');
            


           }
          
              
              return "/index.php";
            
            // 

        
        
         
    ?>