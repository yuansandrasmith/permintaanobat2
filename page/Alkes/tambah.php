<?php
$query ="select max(kd_alkes) as maxid from alkes";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$kd_alkes = $data['maxid'];
$nourut = (int) substr($kd_alkes, 3, 3);
$nourut++;
$char = "ALK";
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
              <li class="breadcrumb-item active">alkes</li>
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
                    <label for="exampleInputEmail1">ID alkes</label>
                    <input type="text" class="form-control" name="kd_alkes" value="<?php echo $newId;?>"readonly />
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama alkes</label>
                    <input type="text" class="form-control" name="nama_alkes" placeholder="Masukkan Nama" required/>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis alkes</label>
                    <input type="text" class="form-control" name="jenis_alkes" placeholder="Masukkan jenis_alkes" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok" required/>
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

    $kd_alkes = $_POST ['kd_alkes'];
    $nama_alkes = $_POST ['nama_alkes'];
    $jenis_alkes = $_POST ['jenis_alkes'];
    $stok = $_POST ['stok'];


  $sql = $koneksi->query("insert into alkes (kd_alkes,nama_alkes,jenis_alkes,stok)values('$kd_alkes','$nama_alkes','$jenis_alkes','$stok')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      
      alert ("Data Berhasil Disimpan")
      window.location.href = "?page=alkes";

        </script>
         
    <?php
  }

    }
  

 ?>