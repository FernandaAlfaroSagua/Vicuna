<?php
include('../function/setup.php');
if (isset($_GET['id'])) {
    $sqlser = "SELECT * FROM empresa WHERE idEmpresa=" . $_GET['id'];
    $resultser = mysqli_query(conectar(), $sqlser);
    $datoser = mysqli_fetch_array($resultser);
}
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
        <li class="nav-item active">
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

        <li class="nav-item">
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
                <h6 class="m-0 font-weight-bold text-primary">Empresa</h6>
              </div>
            <div class="card-body">
              <form action="../function/ctrl_empresa.php" method="post" name="form">
                <div class="mb-3"><label for="nombre">Nombre</label><input value="<?php if (isset($datoser)) { echo  $datoser['nombreEmpresa'];} ?>" class="form-control" id="nombre" type="text" name="nombre"></div>
                <div class="mb-3"><label for="descripcion">Descripción</label><input value="<?php if (isset($datoser)) { echo  $datoser['descripcionEmpresa'];} ?>" class="form-control" id="descripcion" type="text" name="descripcion"></div>
                <div class="mb-3"><label for="direccion">Dirección</label><input value="<?php if (isset($datoser)) { echo  $datoser['direccionEmpresa'];} ?>" class="form-control" id="direccion" type="text" name="direccion"></div>
                <div class="mb-3"><label for="tel">Teléfono Fijo</label><input value="<?php if (isset($datoser)) { echo  $datoser['telefonofijoEmpresa'];} ?>" class="form-control" id="tel" type="tel" name="telefono"></div>
                <div class="mb-3"><label for="cel">Teléfono Celular</label><input value="<?php if (isset($datoser)) { echo  $datoser['telefonocelularEmpresa'];} ?>" class="form-control" id="cel" type="tel" name="celular"></div>
                <div class="mb-3"><label for="email">Email</label><input value="<?php if (isset($datoser)) { echo  $datoser['correoEmpresa'];} ?>" class="form-control" id="email" type="email" name="correo"></div>
                <div class="mb-3"><label for="web">Página Web</label><input value="<?php if (isset($datoser)) { echo  $datoser['paginawebEmpresa'];} ?>" class="form-control" id="web" type="text" name="pagina"></div>
                <div class="mb-3"><label for="facebook">Facebook</label><input value="<?php if (isset($datoser)) { echo  $datoser['rrssfacebookEmpresa'];} ?>" class="form-control" id="facebook" type="text" name="facebook"></div>
                <div class="mb-3"><label for="twitter">Twitter</label><input value="<?php if (isset($datoser)) { echo  $datoser['rrsstwitterEmpresa'];} ?>" class="form-control" id="twitter" type="text" name="twitter"></div>
                <div class="mb-3"><label for="instagram">Instagram</label><input value="<?php if (isset($datoser)) { echo  $datoser['rrssinstagramEmpresa'];} ?>" class="form-control" id="instagram" type="text" name="instagram"></div>
                <div class="mb-3">
                  <label for="servicio">Servicio</label><select class="form-control" id="servicio" name="servicio">
                      <option value="0">Seleccione</option>
                      <?php $sql="SELECT * FROM servicio WHERE estadoServicio=1";
                          $result = mysqli_query(conectar(), $sql);
                          while ($datos = mysqli_fetch_array($result)) {             
                      ?>                      
                      <option <?php if (isset($_GET['servicio'])) {if ($_GET['servicio'] == $datos['idServicio'] ) { ?> selected <?php } } ?>  value="<?php echo $datos['idServicio'] ?>"><?php echo utf8_encode($datos['descripcionServicio']); ?></option>
                      <?php }?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="rubro">Rubro</label><select class="form-control" id="rubro" name="rubro">
                      <option value="0">Seleccione</option>
                      <?php $sql="SELECT * FROM rubro WHERE estadoRubro=1";
                          $result = mysqli_query(conectar(), $sql);
                          while ($datos = mysqli_fetch_array($result)) {             
                      ?>                      
                      <option <?php if (isset($_GET['rubro'])) {if ($_GET['rubro'] == $datos['idRubro'] ) { ?> selected <?php } } ?>  value="<?php echo $datos['idRubro'] ?>"><?php echo utf8_encode($datos['nombreRubro']); ?></option>
                      <?php }?>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado" >
                        <option value="2">Seleccione</option>
                        <option <?php if (isset($datoser)) {if ($datoser['estadoEmpresa'] == "1") { ?> selected <?php } } ?> value="1">Activo</option>
                        <option <?php if (isset($datoser)) {if ($datoser['estadoEmpresa'] == "0") { ?> selected <?php } } ?> value="0">Inactivo</option>
                    </select>
                </div>
                <?php
                    if (!isset($_GET['id'])) {
                ?>
                    <input type="button" class="btn btn-success"  value="Ingresar" onclick="enviar(this.value)">
                    
                <?php
                } else {
                ?>
                    <input type="button" class="btn btn-warning" value="Actualizar" onclick="enviar(this.value)">
                    <input type="button" class="btn btn-danger" value="Eliminar" onclick="enviar(this.value)">
                    <input type="hidden" name="id_oculto" value="<?php echo $_GET['id']; ?>">
                <?php
                }
                ?>
                    <input type="hidden" name="accion_oculta" />
                    <input type="button" class="btn btn-secondary" value="Cancelar" onclick="cancelar(this.value)">

            </form>
            </div>
            </div>
            
            

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Empresas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Dirección</th>
                                    <th>Telefono</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                    <th>Página Web</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>Servicio</th>
                                    <th>Rubo</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Descripcion</th>
                                  <th>Dirección</th>
                                  <th>Telefono</th>
                                  <th>Celular</th>
                                  <th>Correo</th>
                                  <th>Página Web</th>
                                  <th>Facebook</th>
                                  <th>Twitter</th>
                                  <th>Instagram</th>
                                  <th>Servicio</th>
                                  <th>Rubo</th>
                                  <th>Estado</th>
                                  <th>Acción</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $sql = "SELECT
                                rubro.nombreRubro,
                                servicio.descripcionServicio,
                                empresa.*
                              FROM
                                empresa
                                INNER JOIN servicio ON empresa.servicio_idServicio =
                              servicio.idServicio
                                INNER JOIN rubro ON empresa.rubro_idRubro = rubro.idRubro";
                                $result = mysqli_query(conectar(), $sql);
                                while ($datos = mysqli_fetch_array($result)) 
                                {
                                ?>
                                <tr>
                                    <td><?php echo $datos['idEmpresa']; ?></td>
                                    <td><?php echo $datos['nombreEmpresa']; ?></td>
                                    <td><?php echo $datos['descripcionEmpresa']; ?></td>
                                    <td><?php echo $datos['direccionEmpresa']; ?></td>
                                    <td><?php echo $datos['telefonofijoEmpresa']; ?></td>
                                    <td><?php echo $datos['telefonocelularEmpresa']; ?></td>
                                    <td><?php echo $datos['correoEmpresa']; ?></td>
                                    <td><?php echo $datos['paginawebEmpresa']; ?></td>
                                    <td><?php echo $datos['rrssfacebookEmpresa']; ?></td>
                                    <td><?php echo $datos['rrsstwitterEmpresa']; ?></td>
                                    <td><?php echo $datos['rrssinstagramEmpresa']; ?></td>
                                    <td><?php echo $datos['nombreRubro']; ?></td>
                                    <td><?php echo $datos['descripcionServicio']; ?></td>
                                    <?php if($datos['estadoEmpresa']=="1") { ?> 
                                      <td><i class="fas fa-check-square" style="color: #26d941"></i></td>
                                    <?php } else { ?>  
                                        
                                        <td><i class="fas fa-window-close text-danger"></i></td>
                                        
                                    <?php }; ?>                                    <td>
                                      <div class="d-flex justify-content-around">
                                        <a class="btn btn-success" href="empresa.php?id=<?php echo $datos['idEmpresa'];?>&servicio=<?php echo $datos['servicio_idServicio']?>&rubro=<?php echo $datos['rubro_idRubro'] ?>" >
                                          <i class="fas fa-pen"></i>
                                        </a>
                      
                                        <button type="button" class="deletebtn btn-danger btn"><i class="fas fa-trash"></i></button>

                                        <a class="btn btn-dark" href="fotos.php?id=<?php echo $datos['idEmpresa'];?>&servicio=<?php echo $datos['servicio_idServicio']?>&rubro=<?php echo $datos['rubro_idRubro'] ?>" >
                                          <i class="fas fa-images text-success"></i>
                                        </a>
                                      </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../function/ctrl_empresa.php" method="post">
                <div class="modal-body">
                  <p>¿Esta seguro de cambiar el estado a inactivo?</p>
                  <input type="hidden" name="accion_oculta" value="Eliminar" />
                  <input type="hidden" name="id_oculto" id="id_oculto">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

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
    <script src="../js/validar-empresa.js"></script>
    <script>
      $(document).ready(function () {
        $(".deletebtn").on("click", function () {
          $("#deletemodal").modal("show");
          $tr = $(this).closest("tr");
          var data = $tr
            .children("td")
            .map(function () {
              return $(this).text();
            })
            .get();

          console.log(data);
          $("#id_oculto").val(data[0]);
        });
      });
    </script>
  </body>
</html>
