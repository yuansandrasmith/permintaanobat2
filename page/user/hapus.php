<?php
$id_user = $_GET['id_user'];
$sql = $koneksi->query("delete from user where id_user='$id_user'"); 



if ($sql ) {
	?>
	<script type="text/javascript">
			
	alert ("Data Berhasil Di Hapus")
	window.location.href = "?page=user";

	</script>
	<?php

}

?>