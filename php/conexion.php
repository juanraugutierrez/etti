<?php
require_once  'config.php';

class conexion
{
    protected $db;

  /**
  * Inicializa conexion
  */
  public function __construct()
  {
    $this->db = new Mysqli(HOST, USER, PASSWORD, DB_NAME);
  }

  /**
  * Finaliza conexion
  */
  public function __destruct()
  {
       try {
            $this->db->close();
        } catch  (Exception $e) { 

        }
  }
}