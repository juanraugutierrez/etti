<?php
defined('BASEPATH') or exit('No se permite acceso directo');
if($pruebas===1)
{
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
}

if (session_status() === PHP_SESSION_NONE){
  if (isset($_SESSION)){
    $email=$_SESSION['email'];
  header('location:login.php');
  }
}

