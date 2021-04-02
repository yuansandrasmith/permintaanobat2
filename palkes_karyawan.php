<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "koneksi.php";

session_start();

if($_SESSION['admin'] || $_SESSION['karyawan'] ){
?>


?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" type="image" href="dist/img/223px.png">
  <title>Aplikasi Permintaan</title>
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
    } elseif ($_SESSION['karyawan']){
        $user =$_SESSION['karyawan'];
    }

    $sql = $koneksi->query("select * from user where id_user='$user'");

    $data = $sql->fetch_assoc();
  ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index_karyawan.php" class="brand-link">
      <img src="dist/img/223px.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dinas Kesehatan UPT</span>
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
            <a href="index_karyawan.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="pobat_karyawan.php" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Permintaan Obat
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="palkes_karyawan.php" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Permintaan Alkes
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          
         
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
  	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PERMINTAAN ALAT KESEHATAN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permintaan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php
$query ="select max(id_permintaan_alkes) as maxid from permintaan_alkes";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_permintaan_alkes = $data['maxid'];
$nourut = (int) substr($id_permintaan_alkes, 3, 3);
$nourut++;
$char = "PA";
$newId = $char . sprintf("%03s" , $nourut);

?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Alat Kesehatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Alat Kesehatan</label>
                    <select class="form-control" name="kd_alkes" id="kd_alkes" onchange="isi_otomatis()" />
                            <?php

                            echo "<option value=''>-- Pilih Alkes --</option>";
                            $sql = $koneksi->query("select * from alkes order by kd_alkes");
                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value ='$data[kd_alkes]'>$data[nama_alkes]</option>";
                            }

                            ?>
                            </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stok Tersedia</label>
                    <input type="text" class="form-control" id="stok" name="stok" readonly="" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Masukkan Jumlah Permintaan</label>
                    <input type="number" class="form-control" value="0"  name="jumlah_permintaan" >
                  </div>
                </div>
                <!-- /.card-body -->
                
            </div>
            <!-- /.card -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var kd_alkes = $("#kd_alkes").val();
                $.ajax({
                    url: 'ajax_alkes.php',
                    data:"kd_alkes="+kd_alkes ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#stok').val(obj.stok);
                });
            }
        </script>



          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Permintaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                  <!-- input states -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Permintaan</label>
                    <input type="text" class="form-control" name="id_permintaan_alkes" value="<?php echo $newId; ?>" readonly >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Peminta</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Peminta" name="nama_peminta" required="" >
                  </div>
                  <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                </div>
                   </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
<?php 

if (isset($_POST['simpan'])) {

  $id_permintaan_alkes  =$_POST['id_permintaan_alkes'];
  $kd_alkes           =$_POST['kd_alkes'];
  $jumlah_permintaan           =$_POST['jumlah_permintaan'];
  $nama_peminta           = $_POST['nama_peminta'];


   
    $sql = $koneksi->query("INSERT INTO permintaan_alkes (id_permintaan_alkes,kd_alkes,jumlah_permintaan,nama_peminta,status,tgl)VALUES('$id_permintaan_alkes','$kd_alkes','$jumlah_permintaan','$nama_peminta','Belum di Konfirmasi',CURDATE())");
  $koneksi->query("UPDATE alkes SET stok=stok-$jumlah_permintaan WHERE kd_alkes='$kd_alkes'");


        if ($sql ) {
            ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan")
                window.location.href = "palkes_karyawan.php";

            </script>
            
            <?php
        }
    }

 ?>
      
    </section>
    
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
                    } elseif ($page == "permintaanobat") {
                        include "page/permintaan/permintaan_obat.php";
                    } elseif ($page == "permintaanalkes") {
                        include "permintaan_alkes.php";
                    } elseif ($page == "") {
                        include "g.php";
                    }

      ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>&copy; <a>Mispusari</strong>   
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
</body>
</html>

<?php
}else{

  header("location:login.php");
}
?>