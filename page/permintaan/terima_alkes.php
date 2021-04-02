<?php
$id_permintaan_alkes = $_GET['id_permintaan_alkes'];
$sql = $koneksi->query("UPDATE permintaan_alkes SET status='Dikonfirmasi' WHERE id_permintaan_alkes='$id_permintaan_alkes'"); 



if ($sql ) {
	?>
	<script type="text/javascript">
			
	alert ("Data Berhasil Di Proses")
	window.location.href = "?page=konfirmasialkes";

	</script>
	<?php

}

?>