<?php
define('BASEPATH', true);
require_once 'system/config.php';
require 'system/autoload.php';

$email = $_SESSION['email'];
if (is_null($email)) {
  header('location:' . FOLDER_PATH . '/' . DEFAULT_ARCH);
}

$conn = new PDO($hostname, $usuario, $contrasena);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare('SELECT count(*),sum(total) FROM mostrar_oferta');
$stmt->execute();
$ofertas = $stmt->fetch();
$tofertas = $ofertas[0];



$stmt = $conn->prepare('SELECT count(*) FROM clientes');
$stmt->execute();
$clientes = $stmt->fetch();
$tclientes = $clientes[0];

$stmt = $conn->prepare('SELECT count(*) FROM producto');
$stmt->execute();
$productos = $stmt->fetch();
$tproductos = $productos[0];

$stmt = $conn->prepare('SELECT count(*) FROM categoria');
$stmt->execute();
$categoria = $stmt->fetch();

setlocale(LC_MONETARY, 'es_CL');



?>
<!DOCTYPE html>
<html lang="es">

<head><meta charset="gb18030">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Covid-19 | Panel de Control</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" href="dist/img/control.png">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="index.php" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
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
        </li>
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
              <h1 class="m-0 text-dark">Panel de Control</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Covid-19</a></li>
                <li class="breadcrumb-item active">Panel de Control</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-8">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $tproductos ?></h3>
                </div>
                <p>Total de Productos</p>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="productos.php" class="small-box-footer">
                  Productos <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            
           <div class="col-lg-6 col-8">              
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $tofertas ?></h3>
                  <p><?=money_format('%#1.0n', $ofertas[1]) ?> Total de Ofertas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="lofertas.php" class="small-box-footer">
                  Ofertas <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-6 col-8">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?=$tclientes ?></h3>

                  <p>Clientes</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
                <a href="clientes.php" class="small-box-footer">
                  Clientes <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-8">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?=$categoria[0]?></h3>

                  <p>Categorias</p>
                </div>
                <div class="icon">
                  <i class="fas ion-plus"></i>
                </div>
                <a href="categoria.php" class="small-box-footer">
                  Categorias <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
                 <div class="col-lg-6 col-8 offset-3">
              <!-- small card -->
              <div>
              <div class="bg-info2 small-box">
              
              
                <div class="inner">
                  <h3>Gestor</h3>
                </div>
                <p>&nbsp;  Indicadores, informes y reportes</p>
                <div class="icon">
                  <i class="ion ion-easel"></i>
                </div>
                <a href="#" class="small-box-footer" style="color: #000;">
                  Reportes <i class="fas fa-arrow-circle-right"></i>
                </a>
                
              </div>
              </div>
            </div>
            <!-- ./col -->
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
</body>

</html>