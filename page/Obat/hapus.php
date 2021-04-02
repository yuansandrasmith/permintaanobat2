<?php
$kd_obat = $_GET['kd_obat'];
$sql = $koneksi->query("delete from obat where kd_obat='$kd_obat'"); 



if ($sql ) {
	?>
	<script type="text/javascript">
			
	alert ("Data Berhasil Di Hapus")
	window.location.href = "?page=obat";

	</script>
	<?php

}

?>