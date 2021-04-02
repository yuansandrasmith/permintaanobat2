<?php
$query ="select max(kd_jabatan) as maxid from jabatan";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$kd_jabatan = $data['maxid'];
$nourut = (int) substr($kd_jabatan, 3, 3);
$nourut++;
$char = "K";
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
              <li class="breadcrumb-item active">Jabatan</li>
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
                    <label for="exampleInputEmail1">Kode Jabatan</label>
                    <input type="text" class="form-control" name="kd_jabatan" value="<?php echo $newId;?>"readonly />
                  </div>
                  <div class="form-group">                                    
                  <label for="exampleInputEmail1">Nama Jabatan</label>
                    <input type="text" class="form-control" name="nama_jabatan" placeholder="" required="">
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

  $kd_jabatan                =$_POST['kd_jabatan'];
  $nama_jabatan           =$_POST['nama_jabatan'];


   
    $sql = $koneksi->query("INSERT into jabatan (kd_jabatan,nama_jabatan)values('$kd_jabatan','$nama_jabatan')");


        if ($sql ) {
            ?>
            <script type="text/javascript">
                
                alert ("Data Berhasil Disimpan")
                window.location.href = "?page=jabatan";

            </script>
            
            <?php
        }
    }

 ?>