
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">DATA obat</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">obat</li>
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
              <h3 class="card-title">Daftar Permintaan Obat</h3>

            </div>

            <div class="card-body">  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Permintaan</th>
                  <th>Nama Obat</th> 
                  <th>Jumlah Permintaan</th> 
                  <th>Tanggal Permintaan</th> 
                  <th>Nama Peminta</th> 
                  <th>Status</th> 
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                 $sql = $koneksi ->query("SELECT * from permintaan INNER JOIN obat ON permintaan.kd_obat=obat.kd_obat WHERE status='Belum di Konfirmasi'");
                while ($data=$sql->fetch_assoc()) {

               ?>
               <tr>
               <td><?php echo $no++;?></td> 
               <td><?php echo $data['id_permintaan'];?></td>              
               <td><?php echo $data['nama_obat'];?></td>    
               <td><?php echo $data['jumlah_permintaan'];?></td>  
               <td><?php echo $data['tgl'];?></td>        
               <td><?php echo $data['nama_peminta'];?></td>  
               <td><?php echo $data['status'];?></td>                           
               <td>
              <a onclick="return confirm('Apakah Anda Yakin untuk Konfirmasi Permintaan Ini ?')" href="?page=konfirmasi&aksi=terima&id_permintaan=<?php echo $data['id_permintaan']; ?>" class="btn btn-success" > <i class="fa fa-check" aria-hidden="true"></i> Konfirmasi </a>
              <br><br>
              <a onclick="return confirm('Apakah Anda Yakin untuk Menolak Permintaan Ini ?')" href="?page=konfirmasi&aksi=tolak&id_permintaan=<?php echo $data['id_permintaan']; ?>" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i> Tolak </a> </td>
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