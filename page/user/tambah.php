<?php
$query ="select max(id_user) as maxid from user";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_user = $data['maxid'];
$nourut = (int) substr($id_user, 3, 3);
$nourut++;
$char = "U";
$newId = $char . sprintf("%03s" , $nourut);

?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Tambah Data</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   


    <section class="content">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID user</label>
                    <input type="text" class="form-control" name="id_user" value="<?php echo $newId;?>"readonly />
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama" required/>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required/>
                  </div>

                 
                <!-- /.card-body -->

                <div class="card-footer">     
                  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                  <button type="reset" class="btn btn-danger"> Reset </button>
                </div>
              </form>
            </div>

        </div>
    </section>
    <?php 

if (isset($_POST['simpan'])) {

    $id_user = $_POST ['id_user'];
    $nama_user = $_POST ['nama_user'];
    $password = $_POST ['password'];


  $sql = $koneksi->query("insert into user (id_user,nama_user,password,level)values('$id_user','$nama_user','$password','karyawan')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      
      alert ("Data Berhasil Disimpan")
      window.location.href = "?page=user";

        </script>
         
    <?php
  }

    }
  

 ?>