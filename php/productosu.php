<?php

define('BASEPATH', true);

require '../system/config.php';
require '../system/autoload.php';
    

     $conn = new PDO($hostname, $usuario, $contrasena);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          try {
             
              $stmt = $conn->prepare('DELETE FROM producto WHERE id_producto =:proID');
              $stmt->bindParam(':proID',$_GET['proID'], PDO::PARAM_INT);   
              $stmt->execute();

              $sql="commit;";
              $conn->query($sql);
              $conn=null;
              
            header('location:../productos.php');
            
            

            }
           catch(PDOException $err) {
             echo $err;
            //  header('location:/covid/pages/examples/404.html');
            


           }
          
              
              return "/index.php";
            
            // 

        
        
         
    ?>