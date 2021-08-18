<?php
require_once 'config.php';
require_once 'conexion.php' ;


Class consulta
{


  public function __construct()
   {

      $db;
      php_info();
      $listar();
      
  }   
 
  public function listar(){
      $sql = "SELECT * FROM  proveedores";
      var_dump(sql);
      return $this->db->query($sql);
  }


}