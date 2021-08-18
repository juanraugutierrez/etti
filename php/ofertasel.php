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
              $stmt = $conn->prepare('DELETE FROM foto WHERE id in (select id_foto from ofertas where id_oferta=:proID)');
              $stmt->bindParam(':proID',$_GET['proID'], PDO::PARAM_INT);   
              try{
              $stmt->execute();
               }
              catch(PDOException $err){
             echo $err; 
             echo "<script language='javascript'>";
             echo "alert(hay oferta activas de este producto)"; 
             echo "</script>";
             header('location:/lofertas.php');

              }

            
              $stmt = $conn->prepare('DELETE FROM fichatecnica WHERE id in (select id_fichatecnica from ofertas where id_oferta=:proID)');
              $stmt->bindParam(':proID',$_GET['proID'], PDO::PARAM_INT);   
              try{
              $stmt->execute();
               }
              catch(PDOException $err){
              echo $err; 
             echo "<script language='javascript'>";
             echo "alert(hay oferta activas de este producto)"; 
             echo "</script>";
             header('location:/lofertas.php');

              }




        
              $stmt = $conn->prepare('DELETE FROM ofertas WHERE id_oferta=:proID');
              $stmt->bindParam(':proID',$_GET['proID'], PDO::PARAM_INT);   
              try{
              $stmt->execute();
               }
              catch(PDOException $err){
             echo $err; 
             echo "<script language='javascript'>";
             echo "alert(hay oferta activas de este producto)"; 
             echo "</script>";
             header('location:/lofertas.php');

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
             header('location:/lofertas.php');

              }
              

              $sql="commit;";
              $conn->query($sql);
              $conn=null;
              
            header('location:/lofertas.php');
            
            

            }
           catch(PDOException $err) {
             echo $err;
            //  header('location:/covid/pages/examples/404.html');
            


           }
          
              
              return "/index.php";
            
            // 

        
        
         
    ?>