<?php
$query ="select max(kd_obat) as maxid from obat";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$kd_obat = $data['maxid'];
$nourut = (int) substr($kd_obat, 3, 3);
$nourut++;
$char = "OBT";
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
              <li class="breadcrumb-item active">Obat</li>
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
                    <label for="exampleInputEmail1">ID obat</label>
                    <input type="text" class="form-control" name="kd_obat" value="<?php echo $newId;?>"readonly />
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama obat</label>
                    <input type="text" class="form-control" name="nama_obat" placeholder="Masukkan Nama" required/>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Obat</label>
                    <input type="text" class="form-control" name="jenis_obat" placeholder="Masukkan jenis_obat" required/>
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

    $kd_obat = $_POST ['kd_obat'];
    $nama_obat = $_POST ['nama_obat'];
    $jenis_obat = $_POST ['jenis_obat'];
    $stok = $_POST ['stok'];


  $sql = $koneksi->query("insert into obat (kd_obat,nama_obat,jenis_obat,stok)values('$kd_obat','$nama_obat','$jenis_obat','$stok')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      
      alert ("Data Berhasil Disimpan")
      window.location.href = "?page=obat";

        </script>
         
    <?php
  }

    }
  

 ?>