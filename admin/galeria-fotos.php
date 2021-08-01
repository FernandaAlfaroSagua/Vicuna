<?php 
include('../function/setup.php');
  $sqlser = "SELECT * FROM galeria WHERE idGaleria=" . $_GET['id'];
  $resultser = mysqli_query(conectar(), $sqlser);
  $datoser = mysqli_fetch_array($resultser);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="Fernanda Alfaro - Mitzy Flores - Paola Pinnola - Vesna Marin" />

    <title>Portal</title>
    <link rel="shortcut icon" type="image/ico" href="../img/logo.ico" />


    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="portal.php"
        >
          <div class="sidebar-brand-icon">
            <img src="../img/Isotipo-white.png" alt="" width="40px" />
          </div>
          <div class="sidebar-brand-text mx-3">Portal</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="portal.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Mantenedores</div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
          <a class="nav-link" href="servicios.php">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Servicios</span></a
          >
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="rubros.php">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Rubros</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="empresa.php">
            <i class="fas fa-fw fa-building"></i>
            <span>Empresas</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="calles.php">
            <i class="fas fa-fw fa-map-marked-alt"></i>
            <span>Calles</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usuarios.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Transaccionales</div>

        <li class="nav-item active">
          <a class="nav-link" href="galeria.php">
            <i class="fas fa-fw fa-images"></i>
            <span>Galeria de Fotos</span></a
          >
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span>Puntos de Interés</span></a
              >
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="punto-de-interes.php">Puntos de Interés</a>
                    <a class="collapse-item" href="videos.php">Videos</a>
                </div>
            </div> 
        </li> 

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="ubicaciones.php">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>Ubicaciones QR</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="
              navbar navbar-expand navbar-light
              bg-white
              topbar
              mb-4
              static-top
              shadow
            "
          >
            <!-- Sidebar Toggle (Topbar) -->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              
              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Douglas McGee</span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="
                    dropdown-menu dropdown-menu-right
                    shadow
                    animated--grow-in
                  "
                  aria-labelledby="userDropdown"
                >
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Cerrar Sesión
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Galeria</h4>
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $datoser['nombreGaleria'] ?></h6>
              </div>
              <div class="card-body">
              <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#form">
                <i class="fas fa-plus-circle"></i> Subir Foto
              </button>  
                <div class="row">

                <?php
                              $sql = "select * from fotosgaleria where galeria_idGaleria=". $_GET['id'];
                              $result = mysqli_query(conectar(), $sql);
                              while ($datos = mysqli_fetch_array($result)) {
                              ?>
                                <div class="col-md-4 col-12">
                                    <div class="card card-text-top card-gradient-top card-inverse text-top">
                                    <img src="../galeria/<?php echo $datos['nombrefotoGaleria'];?>" alt="" class="card-img-top" >
                                    <div class="card-body text-center">
                                    <?php
                                      if($datos['estadofotoGaleria']==1){

                                    ?>
                                      <a href="../function/mantenedorGaleria.php?idfoto=<?php echo $datos['idfotosGaleria'];?> &act=0 &id=<?php echo $_GET['id']?>"><img src="../img/activo.png" alt="Desactivar"></a>
                                    <?php
                                    } else {
                                    ?>
                                      <a href="../function/mantenedorGaleria.php?idfoto=<?php echo $datos['idfotosGaleria'];?> &act=1 &id=<?php echo $_GET['id']?>" id="inactivo"><img id="foto" src="../img/inactivo.png" alt="Activar"></a>
                                    <?php 
                                    }
                                    if($datos['principalfotoGaleria']==1){
                                    ?>
                                      <a href="../function/mantenedorGaleria.php?idfoto=<?php echo $datos['idfotosGaleria'];?> &estado=<?php echo $datos['estadofotoGaleria']; ?> &principal=0&id=<?php echo $_GET['id']?>"><img src="../img/principal.png" alt="No Principal"></a>
                                    <?php
                                    } else {
                                    ?>
                                      <a href="../function/mantenedorGaleria.php?idfoto=<?php echo $datos['idfotosGaleria'];?> &estado=<?php echo $datos['estadofotoGaleria']; ?> & principal=1&id=<?php echo $_GET['id']?>"><img src="../img/noprincipal.png" alt="Principal"></a>
                                    <?php
                                    }

                                    if($datos['principalfotoGaleria']==0)
                                    {
                                    ?>
                                    <a href="../function/mantenedorGaleria.php?idfoto=<?php echo $datos['idfotosGaleria'];?> & delete=1 &id=<?php echo $_GET['id']?>"><img src="../img/remove.png" alt="Eliminar"></a>

                                    <?php
                                    }
                                    ?>
                                    </div>
                                    </div>
                                 </div>
                          <?php
                            }
                          ?> 

                </div>
                
              </div>
          
            </div>
            
          
        </div>
        <!-- /.container-fluid -->

        <!-- modal -->
        <div class="modal fade" id="form"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Subir Fotos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../function/ctrl_fotos-galeria.php" method="post"  name="form" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="img">Seleccionar Fotos</label>
                    <input type="hidden" name="accion_oculta" />
                    <input type="hidden" name="id_oculta" value="<?php echo $_GET['id'];?>"/>
                    <input
                          type="file"
                          id="fotos"
                          class="form-control"
                          name="fotos[]"
                          multiple
                    />
                  </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                <input type="button" class="btn btn-success" id="registrar" value="Ingresar" onclick="enviar(this.value)">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->
      </div>
    </div>

    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="../js/validar-galeria.js"></script>
  </body>
</html>
