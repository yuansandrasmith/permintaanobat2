<?php
$kd_alkes = $_GET['kd_alkes'];
$sql = $koneksi->query("delete from alkes where kd_alkes='$kd_alkes'"); 



if ($sql ) {
	?>
	<script type="text/javascript">
			
	alert ("Data Berhasil Di Hapus")
	window.location.href = "?page=alkes";

	</script>
	<?php

}

?>