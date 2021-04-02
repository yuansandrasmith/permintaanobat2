<?php

include "../../koneksi.php";


date_default_timezone_set('Asia/Jakarta');

$koneksi = new mysqli("localhost", "root", "", "dinkes");
$bulan1 = $_POST['bulan'];

 function format_indo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
    return($result);
    }

function bulan_indo($bulan_angka) {
 $bulan1 = array(1=>'JANUARI', 
      'FEBRUARI', 
      'MARET', 
      'APRIL', 
      'MEI', 
      'JUNI', 
      'JULI', 
      'AGUSTUS', 
      'SEPTEMBER', 
      'OKTOBER', 
      'NOVEMBER', 
      'DESEMBER'
     );

 return $bulan1[$bulan_angka];
}
?>

<style>

    @media print{
      input.noPrint{
        display: none;
      }

    }
.img{
width: 900px;
height: auto;
margin-left: 20px;

}
.button {
  background-color: #1E90FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.tumblr {
  background-color: #1E90FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
<table class="table table-borderless" style="width: 100%" > 

  <tr>
    <td><center><img src="../../dist/img/223px.png" width="150px" height="200px"></center></td>
  </tr>
  <tr>
    <td style="font-size: 40px;" align="left"><center>Dinas Kesehatan UPT Instalasi Farmasi Kalimantan Selatan</center></td>
  </tr>
    <tr>
      <td><center>Jl. Ahmad Yani Km.21.500 Landasan Ulin,Banjarbaru,Fax. (0511) 4705299</center></td>
    </tr>
    <tr>
      <td><center>Kode Pos:70724,Telepon:(0511)7403092,4705299</center></td>
    </tr>
    <tr>
      <td><center>email: igfkalsel@yahoo.com </center></td>
    </tr>
  </table>
<hr>
   <h3><center><b>LAPORAN PERMINTAAN ALKES PADA BULAN <?php echo  bulan_indo((int)$bulan1); ?>  </b></center></h3>
<table class="table table-borderless" style="width: 100%"> 
  <tr>
    <th style="text-align: right;">Tanggal Cetak :&nbsp&nbsp<?php echo format_indo(date('Y-m-d'))?> </th>
</tr>
  </table> 
<table border="1" width="100%" style="border-collapse: collapse;">

                                       <thead>
                                        <tr>

   <th width="25px" height="50px">No</th>
   <th width="25px" height="50px">ID Permintaan</th>
   <th width="25px" height="50px">Nama Alkes</th>
   <th width="25px" height="50px">Jumlah Permintaan</th>
   <th width="25px" height="50px">Tanggal Permintaan</th>
   <th width="25px" height="50px">Nama Peminta</th>
   <th width="25px" height="50px">Status</th>

 </tr>  
    </thead>
    <tbody>
                                     

        <?php
        $no = 1;

        $sql = $koneksi ->query("SELECT * from  permintaan_alkes INNER JOIN alkes ON permintaan_alkes.kd_alkes=alkes.kd_alkes WHERE status='Dikonfirmasi' AND MONTH(tgl)='$bulan1' ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo $data['id_permintaan_alkes'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_alkes'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['jumlah_permintaan'];?></center></td>
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_peminta'];?> </center></td>
              <td width="100px" height="50px"><center><?php echo $data['status'];?> </center></td>                
         </tr>  
        <?php }  ?>
            </tbody> 
            </table>
            <br><p align="right">Banjarmasin,&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo format_indo(date('Y-m'))?> &nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
            <br>Kepala Dinas Kesehatan UPT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>Provinsi Kalimantan Selatan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>         
            <br></br>   
            <br></br>
            <br></br>
            <u>Dr. Dwi Atmi Susilastuti</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
            </div>
            <br></br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            
            <input type="button" class="noPrint button" value="Cetak" onclick="window.print()">
                      </div>
                  </div>
              </div>
          </div>
    </div>                                     
