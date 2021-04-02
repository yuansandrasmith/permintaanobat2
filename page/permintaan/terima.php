<?php
$id_permintaan = $_GET['id_permintaan'];
$sql = $koneksi->query("UPDATE permintaan SET status='Dikonfirmasi' WHERE id_permintaan='$id_permintaan'"); 



if ($sql ) {
	?>
	<script type="text/javascript">
			
	alert ("Data Berhasil Di Proses")
	window.location.href = "?page=konfirmasi";

	</script>
	<?php

}

?>