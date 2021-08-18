<?php

define('BASEPATH', true);

require '../system/config.php';
require '../system/autoload.php';
require_once "encriptar.php";
 
     $conn = new PDO($hostname, $usuario, $contrasena);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $p = $conn->prepare('SELECT id_tipo FROM tipo_cliente WHERE descripcion=:tipo');
              $p->bindValue(':tipo', $_POST['ltipocliente']);
              $p->execute(); // 
              $fp = $p->fetch();


// $conn->beginTransaction();
                          $sentencia=null;
                          $idtc=$fp[0];
                          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          $sentencia = $conn->prepare("INSERT INTO clientes (id_tipocliente, nombre,email, direccion, telefono, rut) VALUES (:tipo, :nombre, :email,:direccion,:telefono,:rut)");
                          $sentencia->bindParam(':tipo',$idtc);
                          $sentencia->bindParam(':nombre',$_POST['nombre']);
                          $sentencia->bindParam(':email',$_POST['email']);
                          $sentencia->bindParam(':direccion',$_POST['direccion']);
                          $sentencia->bindParam(':telefono',$_POST['telefono']);
                          $sentencia->bindParam(':rut', $_POST['rut']);
                         
                          try {

                         
                          $sentencia->execute();
                          // $conn->commit();
                          
                          $id_ficha= $conn->lastInsertId();
                         

                     
                        $id_cliente = $conn->lastInsertId();
                        $passw = $encriptar($_POST["password"]);
                        $fecha = date('Y-m-d H:i:s');
                        $sql=null;
                        $sql = "INSERT INTO usuarios (email,password,fecha,id_liente,campass) VALUES  ('" . $_POST['email'] . "','" . $passw . "','" . $fecha . "'," . $id_cliente . ",0);";
                        $conn->query($sql);                    
                       
                        $sql = "commit;";
                        $conn->query($sql);
                        $conn = null;
                      
                      header('location:../clientes.php');
                      
                    


            }
           catch(PDOException $err) {
             echo $err;
            //  header('location:../pages/examples/404.html');
            


           }
          
              
              return "../index.php";
   

        
        
         
    ?>