
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">DATA ALAT KESEHATAN</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">Alkes</li>
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
              <h3 class="card-title">Daftar Permintaan Alkes</h3>

            </div>

            <div class="card-body">  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Permintaan</th>
                  <th>Nama Alkes</th> 
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
                 $sql = $koneksi ->query("SELECT * from permintaan_alkes INNER JOIN alkes ON permintaan_alkes.kd_alkes=alkes.kd_alkes WHERE status='Belum di Konfirmasi'");
                while ($data=$sql->fetch_assoc()) {

               ?>
               <tr>
               <td><?php echo $no++;?></td> 
               <td><?php echo $data['id_permintaan_alkes'];?></td>              
               <td><?php echo $data['nama_alkes'];?></td>    
               <td><?php echo $data['jumlah_permintaan'];?></td>  
               <td><?php echo $data['tgl'];?></td>        
               <td><?php echo $data['nama_peminta'];?></td>  
               <td><?php echo $data['status'];?></td>                           
               <td>
              <a onclick="return confirm('Apakah Anda Yakin untuk Konfirmasi Permintaan Ini ?')" href="?page=konfirmasialkes&aksi=terima&id_permintaan_alkes=<?php echo $data['id_permintaan_alkes']; ?>" class="btn btn-success" > <i class="fa fa-check" aria-hidden="true"></i> Konfirmasi </a>
              <br><br>
              <a onclick="return confirm('Apakah Anda Yakin untuk Menolak Permintaan Ini ?')" href="?page=konfirmasialkes&aksi=tolak&id_permintaan_alkes=<?php echo $data['id_permintaan_alkes']; ?>" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i> Tolak </a> </td>
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