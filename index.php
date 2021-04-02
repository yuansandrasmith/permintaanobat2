<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "koneksi.php";

session_start();

if($_SESSION['admin'] ){
?>


?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" type="image" href="dist/img/223px.png">
  <title>Aplikasi Permintaan</title>
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-sign-out-alt"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-key"></i> Log Out
            <span class="float-right text-muted text-sm"></span>
          </a>         
        </div>
      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->
  <?php
if ($_SESSION['admin']){
        $user =$_SESSION['admin'];
    } elseif ($_SESSION['user']){
        $user =$_SESSION['user'];
    }

    $sql = $koneksi->query("select * from user where id_user='$user'");

    $data = $sql->fetch_assoc();
  ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/223px.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dinas Kesehatan UPT </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $data['nama_user']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">            
            <ul class="nav nav-treeview">              
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="?page=user" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>Data User</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="?page=karyawan" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=jabatan" class="nav-link">
                  <i class="nav-icon fa fa-id-card"></i>
                  <p>Data Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=obat" class="nav-link">
                  <i class="nav-icon fa fa-list"></i>
                  <p>Data Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=alkes" class="nav-link">
                  <i class="nav-icon fa fa-list"></i>
                  <p>Data Alat Kesehatan</p>
                </a>
              </li>
            </ul> 
          </li>
          <li class="nav-item has-treeview">
            <a href="?page=konfirmasi" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                List Permintaan Obat
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="?page=konfirmasialkes" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                List Permintaan Alkes
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="page/laporan/laporanobat.php" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>Permintaan Obat Di <br>Konfirmasi</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="page/laporan/laporanalkes.php" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>Permintaan Alkes Di <br>Konfirmasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="page/laporan/laporanstokobat.php" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p> Stok Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="page/laporan/laporanstokalkes.php" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p> Stok Alkes</p>
                </a>
              </li>
              <li class="nav-item">
                <a data-toggle="modal" data-target="#smallModal" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>Permintaan Obat Bulanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a data-toggle="modal" data-target="#smallModal2" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>Permintaan Alkes Bulanan</p>
                </a>
              </li>
            </ul> 
          </li>
         
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
                    $page = $_GET['page'];
                    $aksi = $_GET['aksi'];

                    if ($page == "user") {
                        if ($aksi == "") {
                            include "page/user/user.php";
                        } elseif ($aksi == "tambah") {
                            include "page/user/tambah.php";
                        } else if ($aksi == "ubah") {
                            include "page/user/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/user/hapus.php";
                        }
                    } elseif ($page == "karyawan") {
                        if ($aksi == "") {
                            include "page/karyawan/karyawan.php";
                        } elseif ($aksi == "tambah") {
                            include "page/karyawan/tambah.php";
                        } else if ($aksi == "ubah") {
                            include "page/karyawan/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/karyawan/hapus.php";
                        }
                    } elseif ($page == "jabatan") {
                        if ($aksi == "") {
                            include "page/jabatan/jabatan.php";
                        } elseif ($aksi == "tambah") {
                            include "page/jabatan/tambah.php";
                        } else if ($aksi == "ubah") {
                            include "page/jabatan/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/jabatan/hapus.php";
                        }
                    } elseif ($page == "obat") {
                        if ($aksi == "") {
                            include "page/obat/obat.php";
                        } elseif ($aksi == "tambah") {
                            include "page/obat/tambah.php";
                        } else if ($aksi == "ubah") {
                            include "page/obat/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/obat/hapus.php";
                        }
                    } elseif ($page == "alkes") {
                        if ($aksi == "") {
                            include "page/alkes/alkes.php";
                        } elseif ($aksi == "tambah") {
                            include "page/alkes/tambah.php";
                        } else if ($aksi == "ubah") {
                            include "page/alkes/ubah.php";
                        } elseif ($aksi == "hapus") {
                            include "page/alkes/hapus.php";
                        }
                    }elseif ($page == "konfirmasi") {
                        if ($aksi == "") {
                            include "page/permintaan/konfirmasi.php";
                        } elseif ($aksi == "terima") {
                            include "page/permintaan/terima.php";
                        } else if ($aksi == "tolak") {
                            include "page/permintaan/tolak.php";
                        }
                    }elseif ($page == "konfirmasialkes") {
                        if ($aksi == "") {
                            include "page/permintaan/konfirmasi_alkes.php";
                        } elseif ($aksi == "terima") {
                            include "page/permintaan/terima_alkes.php";
                        } else if ($aksi == "tolak") {
                            include "page/permintaan/tolak_alkes.php";
                        }
                    }  elseif ($page == "permintaanobat") {
                        include "page/permintaan/permintaan_obat.php";
                    } elseif ($page == "permintaanalkes") {
                        include "permintaan_alkes.php";
                    }elseif ($page == "") {
                        include "home.php";
                    }

      ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>&copy; <a>Dinas Kesehatan UPT Instalasi Farmasi 2021</strong>   
    <div class="float-right d-none d-sm-inline-block">     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>

<?php
}else{

  header("location:login.php");
}
?>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Filter Bulanan</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="page/laporan/laporanobatbulanan.php">

                          
                            <label>Pilih Bulan</label>
                            <div class="form-group">
                                <select name="bulan" class="form-control ">
                                          <option value="">-- Pilih --</option>
                                          <option value="01">Januari</option>
                                          <option value="02">Februari</option>
                                          <option value="03">Maret</option>
                                          <option value="04">April</option>
                                          <option value="05">Mei</option>
                                          <option value="06">Juni</option>
                                          <option value="07">Juli</option>
                                          <option value="08">Agustus</option>
                                          <option value="09">September</option>
                                          <option value="10">Oktober</option>
                                          <option value="11">November</option>
                                          <option value="12">Desember</option>
                                      </select>
                            </div>

                            
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect">Print</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Kembali</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
<div class="modal fade" id="smallModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Filter Bulanan</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="page/laporan/laporanalkesbulanan.php">

                          
                            <label>Pilih Bulan</label>
                            <div class="form-group">
                                <select name="bulan" class="form-control ">
                                          <option value="">-- Pilih --</option>
                                          <option value="01">Januari</option>
                                          <option value="02">Februari</option>
                                          <option value="03">Maret</option>
                                          <option value="04">April</option>
                                          <option value="05">Mei</option>
                                          <option value="06">Juni</option>
                                          <option value="07">Juli</option>
                                          <option value="08">Agustus</option>
                                          <option value="09">September</option>
                                          <option value="10">Oktober</option>
                                          <option value="11">November</option>
                                          <option value="12">Desember</option>
                                      </select>
                            </div>

                            
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect">Print</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Kembali</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>