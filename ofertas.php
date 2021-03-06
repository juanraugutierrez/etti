<?php
define('BASEPATH', true);
require 'system/config.php';
require 'system/autoload.php';
$email = $_SESSION['email'];
if (is_null($email)) {
  header('location:' . FOLDER_PATH . '/' . DEFAULT_ARCH);
}



$conn = new PDO($hostname, $usuario, $contrasena);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$oid = (int)$_GET['oid'];
$stmt = $conn->prepare('SELECT * FROM mostrar_oferta where id_oferta= :oid');
$stmt->bindParam(':oid', $oid, PDO::PARAM_INT);
$stmt->execute();
$ofertas = $stmt->fetch();
$descripcion = strtoupper($ofertas[1]);
$ficha = $ofertas[2];
$foto = $ofertas[3];
$cantidad = $ofertas[4];
$precio = $ofertas[5];
$total = $ofertas[6];
$conn = null;
$stmt = null;
setlocale(LC_MONETARY, 'es_CL');
//echo "valores encontrados"."<br>";
// echo $cantidad."<br>";
// echo $precio."<br>";
// echo $descripcion."<br>";
// echo $ficha."<br>";
// echo $foto."<br>";
// echo $total."<br>";

//echo $ofertas[0]."<br>".$ofertas[1]."<br>".$ofertas[2]."<br>".$ofertas[3]."<br>".$ofertas[4]."<br>".$ofertas[5]."<br>".$ofertas[6]."<br>";

//echo "**********************"."<br>";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Covid-19 | Ofertas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/dist/css/especiales.css">
  <link rel="icon" href="/dist/img/control.png">
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
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.php" class="nav-link">Home</a>
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
            <li>&nbsp;&nbsp;<a href="php/logout.php">Cerrar sesi??n</a></li>
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
      <a href="../index.php" class="brand-link">
        <img src="/dist/img/control.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Empresa</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/dist/img/covid-1.jpg" class="img-circle elevation-2" alt="User Image">
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
      <div class="content-header" style="padding: 1px .1rem;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <!-- <h1 class="text-dark">&nbsp;Oferta N?? </h1> -->
              <?php echo  "<h1 class='text-dark'> Oferta N?? " . strtoupper($ofertas[0]) . "</h1>" ?>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../index.php">Covid-19</a></li>
                <li class="breadcrumb-item active">Panel de Ofertas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">

          <hr>
          <div class="row">
            <!-- <h4>LOWA Men???s Renegade GTX Mid Hiking Boots Review</h4> -->
            <!-- <?php echo  "<h4 class='text-dark'> " . strtoupper($ofertas[1]) . "</h4>" ?>-->

            <div class="col-lg-12">
              <div class="card-body">
                <div class="row">

                  <div class="col-12 col-sm-4">
                    <!-- <h3 class="d-inline-block d-sm-none">LOWA Men???s Renegade GTX Mid Hiking Boots Review</h3> -->
                    <?php echo "<h3 class='text-dark'> " . strtoupper($ofertas[1]) . "</h3>" ?>

                    <div class="col-8">
                      <!-- <img src="archivos/fotos/alcohol gel-1-foto-20200708-062301.png" class="product-image" alt="Product Image"> -->
                      
			<?php echo "<img src='../" . $ofertas[3] . "'  class='product-image' alt='Product Image'>"  ?>
                    </div>
                    <div class="col-12 product-image-thumbs">
                      <div class="product-image-thumb active">
                        <?php echo "<img src='../" . $ofertas[3] . "'  class='product-image' alt='Product Image'>" ?>
                      </div>
                      <div class="product-image-thumb active">
                        <?php echo "<img src='../" . $ofertas[3] . "'  class='product-image' alt='Product Image'>" ?>
                      </div>
		      <div class="product-image-thumb active">
                        <?php echo "<img src='../" . $ofertas[3] . "'  class='product-image' alt='Product Image'>" ?>
                      </div>
                      <!-- <div class="product-image-thumb"><img src="dist/img/prod-2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="dist/img/prod-3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="dist/img/prod-4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb"><img src="dist/img/prod-5.jpg" alt="Product Image"></div> -->
                    </div>
                    <div>

                    </div>


                    <h4>Ficha Tecnica</h4>

                    <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                  Green
                  <br>
                  <i class="fas fa-circle fa-.5x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-.5x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-.5x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-.5x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-.5x text-orange"></i>
                </label>
              </div> -->


                    <h4 class="mt-3">Talla <small class="text-s">(Elija uno)</small></h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                        <span class="text-s">S</span>
                        <br>
                        Small
                      </label>
                      <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                        <span class="text-s">M</span>
                        <br>
                        Medium
                      </label>
                      <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                        <span class="text-s">L</span>
                        <br>
                        Large
                      </label>
                      <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                        <span class="text-s">XL</span>
                        <br>
                        Xtra-Large
                      </label>
                    </div>
                  </div>
                  <div class="col-10 col-sm-8">
                    <div>
                      <div class="col-md-8">
                        <div class="sticky-top mb-8 card-primary">
                          <div class="card card-primary">
                            <div class="card-header ">
                              <h3 class="card-title">Detalle</h3>
                            </div>
                            <div class="card-body">
                              <!-- the events -->
                              <div id="external-events">
                                <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">Precio Unitario <div style=" text-align: right;"> <?php echo money_format('%#1.0n',$ofertas[5]) ?></div>
                                </div>
                                <div class="external-event bg-warning ui-draggable ui-draggable-handle" style="position: relative;tex-alig:rigth">Unidades <div style=" text-align: right;"><?php echo number_format($ofertas[4], 0, ",", ".") ?></div>
                                </div>
                                <div class="external-event bg-info ui-draggable ui-draggable-handle" style="position: relative;tex-alig:rigth">Total <div style=" text-align: right;"> <?php echo money_format('%#1.0n',$ofertas[6]) ?>
                                  </div>
                                </div>
                                <!-- <div class="external-event bg-primary ui-draggable ui-draggable-handle" style="position: relative;">Work on UI design</div>
                          <div class="external-event bg-danger ui-draggable ui-draggable-handle" style="position: relative;">Sleep tight</div> -->
                                <div class="checkbox">
                                  <label for="drop-remove">
                                    <input type="checkbox" id="drop-remove">&nbsp;&nbsp;&nbsp;
                                    Agregar alerta
                                  </label>
			        <div>
				<a class="btn btn-primary  btn-sm btn-flat" href="../lofertas.php"> Volver </a>
				</div>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                          <div class="mt-0">&nbsp;&nbsp;
                            <div class="btn btn-primary btn-sm btn-flat">
                              <i class="fas fa-cart-plus fa-lg mr-3"></i>
                              Agregar al carro de Compras
                            </div>

                            <div class="btn btn-default btn-sm btn-flat">
                              <i class="fas fa-heart fa-lg mr-3"></i>
                              Agregar lista de favoritos
                            </div>
				
                          </div>
                        </div>

                      </div>



                      <!-- <div class="mt-1 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
                
              </div> -->

                    </div>
                    <div class="btn-group btn-group-toggle mt-1 product-share" data-toggle="buttons">
                     
                      <div id="preview" class="col-md-6 col-sm-4 col-xs-4">
                        <h3>Ficha Tecnica</h3>

                        <div class="container-fluid">
                          <!-- <iframe id="FramePDF" src="../covid/archivos/fichas/alcohol gel-1-20200708-062058.pdf" width="450" height="150" style="border: 1px solid black;"/> -->


                          <?php echo "<iframe id='FramePDF' src='../" . $ofertas[2] . "'  width='450' height='150' style='border: 1px solid black;'/>" ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <nav class="w-100">
                      <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripcion</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comentarios</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Ventajas</a>
                      </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
                      <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                      <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- Clientes------------------------------------------- -->

            <!-- Fin Clientes -------------------------------------- -->



            <!-- /.col-md-6 -->
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