<?php 
require 'functions.php';

$id_penjualan = $_GET["id"];

if (hapusPenjualan($id_penjualan) > 0) {
	echo "
			<script>
			alert('Data Berhasil Dihapus');
			document.location.href = 'tbl_barang_keluar.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('Data Gagal Dihapus');
			document.location.href = 'tbl_barang_keluar.php';
			</script>
		";
}



 ?>