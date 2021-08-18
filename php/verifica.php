<?php
define('BASEPATH', true);

require_once "encriptar.php";
require '../system/config.php';

 $conn = new PDO($hostname, $usuario, $contrasena);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$email = $_POST['email'];
$s = $conn->prepare('SELECT password FROM usuarios WHERE email=:email');
$s->bindValue(':email', $_POST['email']);
$s->execute(); // 
$fila=$s->fetch();

 $passw=$desencriptar ( $fila[0]);



// $consulta = sprintf("SELECT password FROM usuarios WHERE usuario='%s';",
//                 pg_escape_string($_POST['email']));
// $fila = pg_fetch_assoc(pg_query($conn, $consulta));

if ($_POST['password']=== $passw) {
    session_start();
    $_SESSION["email"]=$_POST['email'];
    $email=$_POST['email'];
    header('location:/index.php');
} else {
    echo 'La autenticación ha fallado para ' . htmlspecialchars($_POST['email']) . '.';
}
?>