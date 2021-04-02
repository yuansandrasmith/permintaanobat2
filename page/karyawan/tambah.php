<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Tambah Data</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">karyawan</li>
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
                    <label for="exampleInputEmail1">ID Karyawan</label>
                    <input type="text" class="form-control" name="id_karyawan" />
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" placeholder="Masukkan Nama" required/>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmp_lahir" placeholder="Masukkan Tempat Lahir" required/>
                  </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required="" />
                        
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control show-tick"  name="jk" class="form-control"  >
                            <option value="">-- Pilih Kelamin --</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>                                         
                    </div>

                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control show-tick"  name="agama" class="form-control"  >
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                        </select> 
                        
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>                                        
                    </div>

                    <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" class="form-control" name="telp" required="" />
                        
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="nama_user" required="" />
                        
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="" />
                        
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="kd_jabatan" />
                            <?php

                            echo "<option value=''>-- Pilih Jabatan --</option>";
                            $sql = $koneksi->query("select * from jabatan order by kd_jabatan");
                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value ='$data[kd_jabatan]'>$data[nama_jabatan]</option>";
                            }

                            ?>
                          </select>                                           
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

$id_karyawan = $_POST ['id_karyawan'];
$nama_karyawan = $_POST ['nama_karyawan'];
$tmp_lahir = $_POST ['tmp_lahir'];
$tgl_lahir = $_POST ['tgl_lahir'];
$jk = $_POST ['jk'];
$agama = $_POST ['agama'];
$alamat = $_POST ['alamat'];
$telp = $_POST ['telp'];
$nama_user = $_POST ['nama_user'];
$password = $_POST ['password'];
$kd_jabatan = $_POST ['kd_jabatan'];

  $sql = $koneksi->query("INSERT INTO karyawan (id_karyawan,nama_karyawan,tmp_lahir,tgl_lahir,jk,agama,alamat,telp,kd_jabatan)VALUES('$id_karyawan','$nama_karyawan','$tmp_lahir','$tgl_lahir','$jk','$agama','$alamat','$telp','$kd_jabatan')");
 $koneksi->query("INSERT INTO user (id_user,nama_user,password,level,id_karyawan)VALUES('$id_karyawan','$nama_user','$password','karyawan','$id_karyawan')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      
      alert ("Data Berhasil Disimpan")
      window.location.href = "?page=karyawan";

        </script>
         
    <?php
  }

    
  }

 ?>