<?php 	
require 'config.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM data_siswa WHERE id='$id'");

if(mysqli_affected_rows($conn) < 0) {
	echo "<script>
			alert('Data Gagal hapus');
		  </script>";
} else {
	echo "<script>
			alert('Data Berhasil dihapus');
			window.location.href = 'index.php';
		  </script>";

}