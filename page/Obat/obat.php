
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
              <h3 class="card-title">Tambah Data obat</h3>

              <div class="card-tools">
                <a href="?page=obat&aksi=tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data </a>
              </div>
            </div>

            <div class="card-body">  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID obat</th>
                  <th>Nama obat</th> 
                  <th>Jenis Obat</th> 
                  <th>Stok</th> 
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                 $sql = $koneksi ->query("SELECT * from obat");
                while ($data=$sql->fetch_assoc()) {

               ?>
               <tr>
               <td><?php echo $no++;?></td> 
               <td><?php echo $data['kd_obat'];?></td>              
               <td><?php echo $data['nama_obat'];?></td>    
               <td><?php echo $data['jenis_obat'];?></td>  
               <td><?php echo $data['stok'];?></td>                        
               <td>
              <a href="?page=obat&aksi=ubah&kd_obat=<?php echo $data['kd_obat']; ?>" class="btn btn-info" > <i class="fa fa-edit" aria-hidden="true"></i> Tambah Stok </a>
              <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=obat&aksi=hapus&kd_obat=<?php echo $data['kd_obat']; ?>" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i> Delete </a> </td>
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