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

$kdbarang = $_GET["kdbarang"];
$tampil = barang("SELECT * FROM data_barang WHERE kode_barang = '$kdbarang' ")[0];

if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
			<script>
			alert('Data Berhasil Diedit');
			document.location.href = 'tbl_data_barang.php';
			</script>
		";
    } else {
        echo "
			<script>
			alert('Data Gagal Diedit');
			document.location.href = 'tbl_data_barang.php';
			</script>
		";
    }
}

include 'template/header.php';
?>
<!-- Content -->

<div class="dashboard col-9 m-1">
    <div class="form-group">

        <h2>Tambah Data Barang</h2>
        <br>

        <form action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id_barang" value="<?php echo $tampil['id_barang']; ?>">
            <input type="hidden" name="gambarlama" value="<?php echo $tampil['img']; ?>">

            <label for="kode_barang">Kode Barang</label>
            <input type="text" value="<?php echo $tampil['kode_barang']; ?>" class="form-control" id="kode_barang" name="kdbarang" placeholder="Masukan Kode Barang"><br>

            <label for="nama_barang">Nama Barang</label>
            <input type="text" value="<?php echo $tampil['nama_barang']; ?>" class="form-control" id="nama_barang" name="nama" placeholder="Masukan Nama Barang"><br>

            <label for="stok">Stok</label>
            <input type="number" value="<?php echo $tampil['stok']; ?>" class="form-control" id="stok" name="stok" placeholder="Masukan Stok Barang"><br>

            <label for="harga">Harga Barang</label>
            <input type="number" value="<?php echo $tampil['harga_barang']; ?>" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Barang"><br>

            <label for="gambar">Masukan Gambar Produk Yang baru</label><br><br>

            <label> Preview gambar produk yang lama : </label><br>
            <img class="w-25" src="img/<?php echo $tampil['img']; ?>"><br><br>
            <input type="file" class="form-control-file" name="gambar" id="gambar"><br><br>

            <label for="kategori">Kategori</label>
            <input type="text" value="<?php echo $tampil['kategori']; ?>" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori Barang"><br>

            <label for="kategori">Promo</label>
            <div class="radio-promo">
                <input type="radio" id="promo" name="promo" value="Promo" onclick="yesnoCheck();" />
                <label for="promo">Ya</label>
                <br>
                <input type="radio" id="nopromo" name="promo" value="Tidak" onclick="yesnoCheck();" checked />
                <label for="nopromo">Tidak</label>
            </div>
            <br>
            <script>
                function yesnoCheck() {
                    if (document.getElementById('promo').checked) {
                        document.getElementById('diskonPromo').style.display = 'block';
                    } else {
                        document.getElementById('dikonPromo').style.display = 'none';
                    }
                }
            </script>

            <div id="diskonPromo" style="display:none">
                <label for="kategori">Diskon Promo</label>
                <input type="text" class="form-control" id="kategori" name="diskonPromo" placeholder="Masukan Diskon promo"><br>
            </div>


            <button type="sumbit" class="btn btn-info" name="submit"> EDIT </button>

        </form>
    </div>
</div>

<!-- End Content -->
<?php include 'template/footer.php';
