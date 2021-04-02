<?php
    $kode = $_GET['kd_obat'];
    $sql = $koneksi->query("SELECT * FROM obat WHERE kd_obat='$kode'");
    $data = $sql->fetch_assoc();

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
                <h3 class="card-title">Tambah Stok Obat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" method="POST" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tambah Stok</label>
                    <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok yang di tambahkan" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stok Sekarang</label>
                    <input type="text" class="form-control"  value="<?php echo $data['stok']; ?>" readonly/>
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

    $stok = $_POST ['stok'];


  $sql = $koneksi->query("UPDATE obat SET stok=(stok+$stok) WHERE kd_obat='$kode'");

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