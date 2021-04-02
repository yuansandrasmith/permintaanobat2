<?php
$kd_jabatan = $_GET['kd_jabatan'];
$sql = $koneksi->query("delete from jabatan where kd_jabatan='$kd_jabatan'"); 



if ($sql ) {
	?>
	<script type="text/javascript">
			
	alert ("Data Berhasil Di Hapus")
	window.location.href = "?page=jabatan";

	</script>
	<?php

}

?>