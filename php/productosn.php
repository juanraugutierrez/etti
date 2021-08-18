<?php

define('BASEPATH', true);

require '../system/config.php';
require '../system/autoload.php';
     
     $conn = new PDO($hostname, $usuario, $contrasena);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         

              //$p = $conn->prepare('SELECT id FROM clientes WHERE nombre=:proveedor');
              //$p->bindValue(':proveedor', $_POST['lproveedor']);
              //$p->execute(); // 
              //$fp=$p->fetch();

              $c = $conn->prepare('SELECT id_categoria FROM categoria WHERE descripcion=:proveedor');
              $c->bindValue(':proveedor', $_POST['lcategoria']);
              $c->execute(); // 
              $cp=$c->fetch();



              $sql="INSERT INTO `producto`(`id_categoria`, `id_estado`, `descripcion`) VALUES (".$cp[0].",1,'".$_POST['nproducto']."');";
           
            
            echo $sql;
            try {
            $conn->query($sql);
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