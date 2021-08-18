<?php

define('BASEPATH', true);

require '../system/config.php';
require '../system/autoload.php';
    //  $hostname ='mysql:dbname=covid;host=localhost';
    //  $usuario='root';
    //  $clave  ="";
     $conn = new PDO($hostname, $usuario, $contrasena);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          try {
              $stmt = $conn->prepare('DELETE FROM producto WHERE id_categoria=:proID');
              $stmt->bindParam(':proID',$_GET['proID'], PDO::PARAM_INT);   
              try{
              $stmt->execute();
               }
              catch(PDOException $err){
             echo $err; 
             echo "<script language='javascript'>";
             echo "alert(hay oferta activas de este producto)"; 
             echo "</script>";
             header('location:/covid/productos.php');

              }
             
              $stmt = $conn->prepare('DELETE FROM categoria WHERE  id_categoria=:proID');
              $stmt->bindParam(':proID',$_GET['proID'], PDO::PARAM_INT);   
              try{
              $stmt->execute();
              }
              catch(PDOException $err){
             echo $err; 
             echo "<script language='javascript'>";
             echo "alert(hay oferta activas de este producto)"; 
             echo "</script>";
             header('location:/categoria.php');

              }
              

              $sql="commit;";
              $conn->query($sql);
              $conn=null;
              
            header('location:/categoria.php');
            
            

            }
           catch(PDOException $err) {
             echo $err;
            //  header('location:/covid/pages/examples/404.html');
            


           }
          
              
              return "/index.php";
            
            // 

        
        
         
    ?>