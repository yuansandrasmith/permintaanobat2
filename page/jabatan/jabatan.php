<?php
function format_indo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
    return($result);
    }
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Data Jabatan</h2>
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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     <div class="container-fluid">
  </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Jabatan</h3>
              <div class="card-tools">
 <a href="?page=jabatan&aksi=tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data </a>
</div>
            </div>

            <div class="card-body">  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jabatan</th>
                  <th>Nama jabatan</th>          
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                 $sql = $koneksi ->query("SELECT * from jabatan");
                while ($data=$sql->fetch_assoc()) {
               ?>
               <tr>
                <td><?php echo $no++;?></td> 
               <td><?php echo $data['kd_jabatan'];?></td>
               <td><?php echo $data['nama_jabatan'];?></td>
                <td>
              <a href="?page=jabatan&aksi=ubah&kd_jabatan=<?php echo $data['kd_jabatan']; ?>" class="btn btn-info" > <i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
              <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=jabatan&aksi=hapus&kd_jabatan=<?php echo $data['kd_jabatan']; ?>" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i> Delete </a></td>   
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
    </section>