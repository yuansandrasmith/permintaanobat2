<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dinkes");

//variabel nim yang dikirimkan form.php
$kd_alkes = $_GET['kd_alkes'];

//mengambil data
$query = mysqli_query($koneksi, "select * from alkes where kd_alkes='$kd_alkes'");
$user = mysqli_fetch_array($query);
$data = array(
            'stok'      =>  $user['stok']);

//tampil data
echo json_encode($data);
?>