<?php 
require 'functions.php';

$kdbarang = $_GET["kdbarang"];

if (hapus($kdbarang) > 0) {
	echo "
			<script>
			alert('Data Berhasil Dihapus');
			document.location.href = 'tbl_data_barang.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('Data Gagal Dihapus');
			document.location.href = 'tbl_data_barang.php';
			</script>
		";
}
