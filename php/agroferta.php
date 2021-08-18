<?php
define('BASEPATH', true);

require '../system/config.php';
require '../system/autoload.php';
    
{
     $conn = new PDO($hostname, $usuario, $contrasena);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $archivo=$_FILES['ficha']['name'];
          $extension = explode(".",$archivo);
          $num = count($extension) - 1;
          if($extension[$num] == "pdf"){ 
             
            $fecha= date('Ymd-His');
            $nombrenuevo=$_POST['lproductos']."-".$_POST['id_cliente']."-".$fecha.".pdf";                  
                  if(!copy($_FILES['ficha']['tmp_name'], "../archivos/fichas/".$nombrenuevo)) {
                        echo "error al copiar el archivo";
                        }
                        else
                        {
                        echo "archivo subido con exito"."<br/>";
                      
                        $ruta="archivos/fichas/";
                        $tamano=intdiv($_FILES['ficha']['size'],1024);

                          // $conn->beginTransaction();
                          $sentencia = $conn->prepare("INSERT INTO fichatecnica (nombre,ruta,tamano,nombrenuevo) VALUES (:nombre, :ruta,:tamano,:nombrenuevo)");
                          $sentencia->bindParam(':nombre',$archivo);
                          $sentencia->bindParam(':ruta', $ruta);
                          $sentencia->bindParam(':tamano',$tamano);
                          $sentencia->bindParam(':nombrenuevo', $nombrenuevo);
                         
                          try {

                         
                          $sentencia->execute();
                          // $conn->commit();
                          
                          $id_ficha= $conn->lastInsertId();
                          echo  $id_ficha."<br/> id_ficha <br/>";

                          } catch(PDOExecption $e) {
                             
                              print "Error!: " . $e->getMessage() . "</br>";
                          }

                          


                        }
           }
          }                           
// ****************************************************
{          $archivof=$_FILES['foto']['name'];
          $extension = explode(".",$archivof);
          $num = count($extension) - 1;
          if($extension[$num] == "png" || $extension[$num] == "jpg" ){ 
             
            $fecha= date('Ymd-His');
            $nombrenuevof=$_POST['lproductos']."-".$_POST['id_cliente']."-foto-".$fecha.".".$extension[$num];                  
                  if(!copy($_FILES['foto']['tmp_name'], "../archivos/fotos/".$nombrenuevof)) {
                        echo "error al copiar el archivo";
                        }
                        else
                        {
                        echo "archivo foto subido con exito"."<br/>";
                      
                        $ruta="archivos/fotos/";
                        $tamano=intdiv($_FILES['foto']['size'],1024);
                        $conn = new PDO($hostname, $usuario, $contrasena);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          $sentencia = $conn->prepare("INSERT INTO foto (nombre,ruta,tamano,nombrenuevo) VALUES (:nombre, :ruta,:tamano,:nombrenuevo)");
                          $sentencia->bindParam(':nombre',$archivof);
                          $sentencia->bindParam(':ruta', $ruta);
                          $sentencia->bindParam(':tamano',$tamano);
                          $sentencia->bindParam(':nombrenuevo', $nombrenuevof);
                        
                          try {
                            
                          // $conn->beginTransaction();
                          $sentencia->execute();
                          // $conn->commit();
                          $id_foto= $conn->lastInsertId();
                          echo $id_foto."<br/> id foto <br/>";
                          } catch(PDOExecption $e) {
                              $conn->rollback();
                              print "Error!: " . $e->getMessage() . "</br>";
                          }
                        }
           }
}                          
                            $conn = new PDO($hostname, $usuario, $contrasena);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare('SELECT id_producto from producto where descripcion=?');
                            $producto=$_POST['lproductos'];
                            $stmt->execute([$producto]);
                            $id_productos = $stmt->fetch();
                            $id_producto=$id_productos[0];


                            $conn = new PDO($hostname, $usuario, $contrasena);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare('SELECT id_movimiento from tipo_movimiento where descripcion=?');
                           
                            $movimiento=$_POST['lmovimiento'];
                            $stmt->execute([$movimiento]);
                            $id_movimientos = $stmt->fetch();
                            $id_movimiento=$id_movimientos[0];
                          
                          $conn = new PDO($hostname, $usuario, $contrasena);
                          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          $sentencia = $conn->prepare("INSERT INTO ofertas(id_producto,cantidad,precio,id_fichatecnica,id_foto,id_estado,id_tipomov,id_talla,id_cliente) VALUES (:idproducto,:cantidad,:precio,:idfichatecnica,:idfoto,:idestado,:idtipomov,:idtalla,:idcliente)");
                          $sentencia->bindParam(':idproducto',$id_producto);
                          $cantidad= $_POST['ncantidad'];
                          $sentencia->bindParam(':cantidad', $cantidad);
                          $precio=$_POST['nprecio'];
                          $sentencia->bindParam(':precio',$precio);
                          $sentencia->bindParam(':idfichatecnica', $id_ficha);
                          $sentencia->bindParam(':idfoto', $id_foto);
                          $valor=1;
                          $sentencia->bindParam(':idestado',$valor);
                          $sentencia->bindParam(':idtipomov', $id_movimiento);
                          $sentencia->bindParam(':idtalla', $valor);
                          $idcliente=$_POST['id_cliente'];
                          $sentencia->bindParam(':idcliente', $idcliente);                        
                          $sentencia->execute();


                          header('location:../lofertas.php');

                         ?>