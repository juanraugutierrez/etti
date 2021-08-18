<?php

define('BASEPATH', true);
require 'system/config.php';
require 'system/autoload.php';
$email = $_SESSION['email'];
if (is_null($email)) {
  header('location:' . FOLDER_PATH . '/' . DEFAULT_ARCH);
}


$conn = new PDO($hostname, $usuario, $contrasena);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Covid-19 | Agregar Productos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="icon" href="dist/img/control.png">

  <!-- <!-- <script> -->
  <!-- $(document).ready(function(){
  $("#botonA-bfilaproducto-1").click(function(){    
     alert("Click en botonA-bfilaproducto-1") -->
  <!-- });
<!-- });     -->
  <!-- </script> -->
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- SEARCH FORM -->
      <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <p class="ion ion-android-person nav-icon"><span class="caret ">&nbsp;&nbsp;<?= $email ?></span></p>
          </a>
          <ul class="dropdown-menu">
            <li>&nbsp;&nbsp;<a href="php/logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
        <li>
          <!-- Messages Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>-->
          <!--<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
       
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>-->
        </li>
        <!--
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>-->
        <!-- finnn-->
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/control.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Empresa</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/covid-1.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Covid-19</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

              </li>


              <!-- clientes-->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="ion ion-android-bookmark"></i>
                  <p>
                    Clientes
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="clientes.php" class="nav-link">
                      <i class="ion ion-android-bookmark nav-icon"></i>
                      <p>Listado de Clientes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="aclientes.php" class="nav-link">
                      <i class="ion ion-android-bookmark nav-icon"></i>
                      <p>Agregar Cliente</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- clientes -->

              <!-- usuarios -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="ion ion-android-person nav-icon"></i>
                  <p>
                    Usuarios
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="lusuarios.php" class="nav-link">
                      <i class="ion ion-ios-people-outline nav-icon"></i>
                      <p>Listado de Usuarios </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="ion ion-android-person nav-icon"></i>
                      <p>Agregar Usuario</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="perfiles.php" class="nav-link">
                      <i class="ion ion-profile nav-icon"></i>
                      <p>Listado de Perfiles</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="ion ion-profile-mx nav-icon"></i>
                      <p>Usuario-perfil</p>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- usuarios -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="ion ion-plus nav-icon"></i>
                  <p>
                    Categorias
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="productos.php" class="nav-link">
                      <i class="ion ion-plus nav-icon"></i>
                      <p>Listado de Categorias </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="acategoria.php" class="nav-link">
                      <i class="ion ion-plus nav-icon"></i>
                      <p>Agregar Categoria</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- productos categorias-->

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="ion ion-ios-cart-outline nav-icon"></i>
                  <p>
                    Productos
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="productos.php" class="nav-link">
                      <i class="ion ion-ios-cart-outline nav-icon"></i>
                      <p>Listado de Produtos </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="aproductos.php" class="nav-link">
                      <i class="ion ion-ios-cart-outline nav-icon"></i>
                      <p>Agregar Producto</p>
                    </a>
                  </li>
                  <!-- categorias -->

                </ul>
              </li>

              <!-- fin productos -->


            </ul>
          </nav>
        </div>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Clientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Covid-19</a></li>
                <li class="breadcrumb-item active">Panel de Clientes</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Agregar Clientes</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="php/clienten.php" method="post">
              <div class="card-body">
                <div class="row">

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Direccion</label>
                      <input type="text" name="direccion" class="form-control" id="exampleInputEmail1" placeholder="Direccion">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Telefono</label>
                      <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Nº Telefono">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Rut</label>
                      <input type="text" name="rut" class="form-control" placeholder="10444555-5">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Tipo de Cliente</label>

                      <select class="form-control" name="ltipocliente">
                        <?php
                        try {
                          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          $sql = "SELECT descripcion from tipo_cliente;";
                          $fila = array();
                          $rows = array();
                          foreach ($conn->query($sql) as $row) {

                            echo "<option>" . $row[0] . "</option>";
                          }
                        } catch (PDOException $err) {
                          // Imprime error de conexión
                          echo "ERROR: No se pudo conectar a la base de datos: " . $err->getMessage();
                        }
                        ?>

                      </select>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer align-content-end">
                <button type="submit" class="btn btn-success">Agregar</button> <a class="btn btn-primary" href="clientes.php"> Volver </a>
              </div>
            </form>
          </div>


          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!--<strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>-->

      <div class="float-right d-none d-sm-inline-block">

      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <script src="dist/js/pages/dashboard3.js"></script>
  <script src="dist/js/botones.js"></script>
</body>

</html>