<?php
        ob_start();
        session_start();

        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

        $koneksi= new mysqli("localhost", "root", "", "dinkes");

        $_SESSION["admin"] =null;
        $_SESSION["karyawan"] =null;

        if ($_SESSION['admin'] || $_SESSION['karyawan'] ) {
            header("location:index.php");
        }else{
            
        

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image" href="dist/img/223px.png">
  <title>Dinas Kesehatan UPT Instalasi Farmasi  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <center><h2>Dinas Kesehatan UPT Instalasi Farmasi  </h2></center><hr>
    <br>
      <center><img src="dist/img/223px.png" width="200px" height="300px" /></center>
      <p class="login-box-msg"></p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="Username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="Password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">LOGIN</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>

<?php


  if (isset($_POST['login'])) {

    $Username = $_POST['Username'];
    $PASSWORD=$_POST['Password'];

    $sql = $koneksi->query("select * from user where nama_user='$Username' and password='$PASSWORD'
      ");

    $ketemu = $sql->num_rows;

    $data = $sql->fetch_assoc();


    if ($ketemu >=1) {

      session_start();

      if ($data['level'] == "admin") {


        $_SESSION['admin'] = $data['id_user'];

        header("location:index.php");


        }else if ($data['level'] == "karyawan") {

            $_SESSION['karyawan'] = $data['id_user'];
    
            header("location:index_karyawan.php");
        
    }else{
        ?>
    
        <script type="text/javascript">
          alert("Login Gagal Username atau Password yang Anda Masukan Salah")
        </script>
    
        <?php
    }
}
}
?>


<?php
}
?>