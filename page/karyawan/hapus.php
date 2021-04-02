<?php
$id_karyawan = $_GET['id_karyawan'];
$sql = $koneksi->query("delete from karyawan where id_karyawan='$id_karyawan'"); 



if ($sql ) {
	?>
	<script type="text/javascript">
			
	alert ("Data Berhasil Di Hapus")
	window.location.href = "?page=karyawan";

	</script>
	<?php

}

?>