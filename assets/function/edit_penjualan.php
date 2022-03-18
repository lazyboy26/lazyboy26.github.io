<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    echo "
			<script>
			alert('Silahkan Login Terlebih Dahulu');
			document.location.href = 'login.php';
			</script>
	";
}

$id_penjualan = $_GET["id"];
$tampil = barang("SELECT * FROM tbl_penjualan WHERE id_penjualan = '$id_penjualan' ")[0];

if (isset($_POST["submit"])) {
    if (edit_jual($_POST) > 0) {
        echo "
			<script>
			alert('Data Berhasil Diedit');
			document.location.href = 'tbl_barang_keluar.php';
			</script>
            ";
    } else {
        echo "
			<script>
			alert('Data Gagal Diedit');
			document.location.href = 'tbl_barang_keluar.php';
			</script>
		";
    }
}

include 'template/header.php';
?>
<!-- Content -->

<div class="dashboard col-9 m-8" style="margin: 20px;">
    <div class="form-group">

        <h2>Edit Barang Keluar</h2>
        <br>

        <form action="" method="post">

            <input type="hidden" name="id_penjualan" value="<?php echo $tampil['id_penjualan']; ?>">
            <input type="hidden" name="harga" value="<?php echo $tampil['harga_barang']; ?>">

            <label for="kode_barang">Kode Barang</label>
            <input type="text" value="<?php echo $tampil['kode_barang'] ?>" class="form-control" id="kode_barang" name="kdbarang"><br>

            <label for="nama_barang">Nama Barang</label>
            <input type="text" value="<?php echo $tampil['nama_barang']; ?>" class="form-control" id="nama_barang" name="nama_barang"><br>

            <label for="nama_barang">Nama Pembeli</label>
            <input type="text" value="<?php echo $tampil['nama_cust']; ?>" class="form-control" id="nama_barang" name="nama_customer"><br>

            <label for="stok">Jumlah Beli</label>
            <input type="number" value="<?php echo $tampil['jumlah']; ?>" class="form-control" id="stok" name="jumlah"><br>
            
            <label for="stok">tanggal</label>
            <input type="date" value="<?php echo $tampil['tanggal']; ?>" class="form-control" id="stok" name="tanggal"><br>
                
            <button type="sumbit" class="btn btn-info" name="submit"> Edit </button>

        </form>
    </div>
</div>

<!-- End Content -->
<?php include 'template/footer.php';
