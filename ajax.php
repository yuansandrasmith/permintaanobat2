<?php
// tes yuansandra
//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dinkes");

//variabel nim yang dikirimkan form.php
$kd_obat = $_GET['kd_obat'];

//mengambil data
$query = mysqli_query($koneksi, "select * from obat where kd_obat='$kd_obat'");
$user = mysqli_fetch_array($query);
$data = array(
            'stok'      =>  $user['stok']);

//tampil data
echo json_encode($data);
?>