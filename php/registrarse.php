<?php
define('BASEPATH', true);
require '../system/config.php';
$pruebas=3;


  
            
            ///
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Covid-19  | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="icon" href="/..dist/img/control.png">
</head>
<body class="login-page" style="background: url('../dist/img/covid-fondo12.png');">
<div class="login-box">
  <div class="login-logo">
   <h1><a href="l"><b>Covid</b>  19</a></h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body card-info">
    <div class="card-header">
      <h3 class="card-title text-center"><p class="text-center">Registro</p></h3>
    </div>
      <form action="registro.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

          <div class="input-group mb-3">
          
          <input type="text" class="form-control" placeholder="nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas ui-icon-info"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Apellido">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-secondary"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="direccion">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-book"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Telefono">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone-volume"></span>
            </div>
          </div>
        </div>
          
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3">
                      <label class="custom-control-label" for="customSwitch3">Cliente/Proveedor</label>
            </div>
          
          
          <!-- /.col -->
          <div class="row">
          <div class="col-12">
        
            <button type="submit" class="btn btn-success btn-block">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
        </div>
      
      </form>

      

      
    </div>
  
  </div>
</div>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->

</body>
</html>
