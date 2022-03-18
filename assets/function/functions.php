<?php
define('BASE_URL', 'http://localhost/ido-baut-main/assets/function/');
define('URL_VIEW', 'http://localhost/ido-baut-main/');
// koneksi ke dbms
$conn = mysqli_connect("localhost", "root", "", "alchemist_baut");

function barang($data)
{
	global $conn;
	$hasil = mysqli_query($conn, $data);
	$rows = [];
	while ($row = mysqli_fetch_assoc($hasil)) {
		$rows[] = $row;
	}
	return $rows;
}

function filter($kategori)
{
	$query = "SELECT *FROM data_barang WHERE
			kategori LIKE '%$kategori%' OR
            kode_barang LIKE '%$kategori%'
	";

	return barang($query);
}

function cari($keyword)
{
	$query = "SELECT * FROM data_barang WHERE
			nama_barang LIKE '%$keyword%' OR
			kode_barang LIKE '%$keyword%'
	";

	return barang($query);
}

function cariP($keyword)
{
	$query = "SELECT * FROM tbl_penjualan WHERE
			nama_barang LIKE '%$keyword%' OR
			kode_barang LIKE '%$keyword%'
	";

	return barang($query);
}

function caridate($dari,$sampai)
{	
	$query = "SELECT * FROM data_barang
	WHERE tanggal BETWEEN '$dari' AND '$sampai'
	
";

	return barang($query);
}
function caridate2($dari,$sampai)
{	
	$query = "SELECT * FROM tbl_penjualan
	WHERE tanggal BETWEEN '$dari' AND '$sampai'
	
";

	return barang($query);
}

function tambah($info)
{
	global $conn;
	$kdbarang = $info["kdbarang"];
	$nama = $info["nama"];
	$stok = $info["stok"];
	$harga = $info["harga"];
	$kategori = $info["kategori"];
	$promo = $info['promo'];
	$diskonpromo = (int)$info['diskonPromo'];

	if($info['promo'] == 'Tidak'){
		$totaldiskon = 0;
	}
	$gambar = upload();
	if (!$gambar) {
		return false;
	}
	$diskonawal = ($diskonpromo / 100) * $harga;
	$total = $harga * $stok;
	$totaldiskon = $total - $diskonawal;

	$hargapromo = $harga - $diskonawal;


	$query = "INSERT INTO data_barang VALUES 
			('','$kdbarang','$nama','$stok','$harga','$gambar','$kategori','$promo','$diskonpromo','$hargapromo','$totaldiskon',CURDATE(),CURDATE()) ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload()
{

	$nama = $_FILES['gambar']['name'];
	$tempat = $_FILES['gambar']['tmp_name'];
	$error = $_FILES['gambar']['error'];
	$size = $_FILES['gambar']['size'];

	// apakah ada gambar yang diup

	if ($error == 4) {
		echo "
				<script>alert('Silahkan Upload Gambar Terlebih Dahulu !')</script>
		";
	}

	// Cek apakah bukan gambar yang diupload
	$ekstensivalid = ["jpeg", "jpg", "png"];
	$ekstensigambar = explode('.', $nama);
	$ekstensigambar = strtolower(end($ekstensigambar));

	// Cek apakah Gambar Yang diupload valid
	if (!in_array($ekstensigambar, $ekstensivalid)) {
		echo "
				<script>alert('Yang Anda Upload Bukan Gambar !')</script>
		";
		return false;
	}

	// Cek apakah size ukuran gambar yang diupload melebihi batas maksimal yaitu 2 mb
	if ($size > 2000000) {
		echo "
				<script>alert('Ukuran Foto Anda Terlalu Besar (Max 2mb) ')</script>
		";
		return false;
	}

	// Jika Lolos pengecekan maka gabar siap di up

	// mengganti nama gambar menjadi unique
	$namabaru = uniqid();
	$namabaru .= '.';
	$namabaru .= $ekstensigambar;

	if (move_uploaded_file($tempat, 'img/' . $namabaru)) {
		return $namabaru;
	}
}

function edit($data)
{
	global $conn;
	$id = $data["id_barang"];
	$kdbarang = $data["kdbarang"];
	$nama = $data["nama"];
	$stok = $data["stok"];
	$harga = $data["harga"];
	$kategori = $data["kategori"];
	$gambarlama = $data["gambarlama"];
	$promo = $data['promo'];
	$diskonpromo = (int)$data['diskonPromo'];

	
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarlama;
	} else {
		$gambar = upload();
	}
	$diskonawal = ($diskonpromo / 100) * $harga;
	if($data['promo'] == 'Tidak'){
		$diskonawal = 0;
	}
	$total = $harga * $stok;
	$totaldiskon = $total - $diskonawal;
	
	$hargapromo = $harga - $diskonawal;

	$query = "UPDATE data_barang SET 
			kode_barang = '$kdbarang',
			nama_barang = '$nama',
			stok = '$stok',
			harga_barang = '$harga',
			img = '$gambar',
			kategori = '$kategori',
			status = '$promo',
			diskon_promo = '$diskonpromo',
			total_harga = '$totaldiskon',
			harga_promo = '$hargapromo'
			WHERE id_barang = '$id'
	";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($kode_barang)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM data_barang WHERE kode_barang = '$kode_barang'");

	return mysqli_affected_rows($conn);
}

function hapusPenjualan($id_penjualan)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_penjualan WHERE id_penjualan = '$id_penjualan'");

	return mysqli_affected_rows($conn);
}

function tambahTransaksi($info)
{
	global $conn;
	$id_barang = $info["id_barang"];
	$kode_barang = $info["kode_barang"];
	$nama_barang = $info["nama_barang"];
	$namaCustomer = $info["namaCust"];
	$harga = (int)$info["harga"];
	$jumlah = (int)$info["jumlah"];
	$diskon = (int)$info["diskon"];
	$tanggal = $info["tanggal"];

	$diskonawal = ($diskon / 100) * $harga;
	$total = $harga * $jumlah;

	$totalHarga = $total - $diskonawal;

	$query = "INSERT INTO tbl_penjualan 
				VALUES 
			('','$id_barang','$kode_barang','$nama_barang','$namaCustomer','$harga','$jumlah','$diskon','$totalHarga','$tanggal') ";

	$ambildata = barang("SELECT  * FROM data_barang WHERE id_barang ='$id_barang'");

	foreach ($ambildata as $arr) {
		$ambilstok = $arr['stok'];
	}
	$stokterbaru = $ambilstok - $jumlah;

	$query2 = "UPDATE data_barang SET 
	stok = '$stokterbaru'
	WHERE id_barang = '$id_barang'
";

	mysqli_query($conn, $query2);
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	// return var_dump($info);
}

function edit_jual($data_jual)
{
	global $conn;
	$id = $data_jual["id_penjualan"];
	$kdbarang = $data_jual["kdbarang"];
	$nama = $data_jual["nama_barang"];
	$jumlah = (int)$data_jual["jumlah"];
	$nama_customer = $data_jual['nama_customer'];
	$tanggal = $data_jual['tanggal'];
	$harga = (int)$data_jual['harga'];

	$ambildata = barang("SELECT data_barang.*,tbl_penjualan.* FROM data_barang JOIN tbl_penjualan
						ON data_barang.kode_barang=tbl_penjualan.kode_barang");
	foreach ($ambildata as $arr) {
		$ambiljumlah = $arr['jumlah'];
		$ambilstok = $arr['stok'];
	}

	if ($jumlah >= $ambiljumlah) {
		$stoklama = $jumlah - $ambiljumlah;
		$stokbaru = $ambilstok - $stoklama;
	} else if ($jumlah <= $ambiljumlah) {
		$stoklama = $jumlah;
		$stokbaru = $ambilstok + $stoklama;
	}

	$total = $harga * $jumlah;
	

	$query = "UPDATE data_barang JOIN tbl_penjualan 
				ON tbl_penjualan.kode_barang = data_barang.kode_barang
				SET 
				tbl_penjualan.kode_barang = '$kdbarang',
				tbl_penjualan.nama_barang = '$nama',
				tbl_penjualan.nama_cust = '$nama_customer',
				stok = '$stokbaru',
				jumlah = '$jumlah',
				tbl_penjualan.tanggal = '$tanggal',
				data_barang.tanggal = '$tanggal',
				total = '$total'
				WHERE id_penjualan = '$id'
	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
