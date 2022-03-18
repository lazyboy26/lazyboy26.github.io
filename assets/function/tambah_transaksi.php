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


if (isset($_POST["submit"])) {
    if (tambahTransaksi($_POST) > 0) {

        echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'tbl_barang_keluar.php';
            </script>
        ";
    } else {

        echo mysqli_error($conn);
        "
            <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'tambah_transaksi.php';
            </script>
        ";
    }
}

$tampil1 = barang("SELECT * FROM data_barang");

// $tampil = barang("SELECT  * FROM data_barang,data_penjualan WHERE data_barang.id_barang = data_penjualan.id_barang");
$value = "";

include 'template/header.php';
?>
<!-- Content -->

<div class="col-9 m-1" style="margin: 20px;">
    <div class="form-group">

        <h2>Tambah Data Transaksi</h2>
        <br>

        <form action="" method="post">
            <label for="kode_barang">Kode Barang</label>
            <select name="kode_barang" id="kode_barnag" class="form-select" aria-label="Default select example">
                <option selected disabled>Pilih Kode Barang</option>
                <?php foreach ($tampil1 as $brg) : ?>
                    <option value="<?= $brg['kode_barang'] ?>" <?php if (isset($_POST['kode_barang'])) : ?> <?php if ($_POST['kode_barang'] == $brg['kode_barang']) : ?> selected <?php endif ?> <?php endif ?>><?= $brg['kode_barang'] ?> - <?= $brg['nama_barang'] ?></option>
                <?php endforeach; ?>
            </select> <br>

            <button type="submit" class="btn btn-info" name="searchData">Cari</button></button><br><br>

            <?php
            if (isset($_POST['kode_barang'])) {
                $kd_barang = $_POST['kode_barang'];
                $tampil2 = barang("SELECT * FROM data_barang WHERE kode_barang = '$kd_barang'");
            }
            ?>
        </form>

        <a href="tambah_transaksi.php?kd_barang"></a>

        <?php if (isset($_POST['searchData'])) : ?>
            <form action="" method="post">

                <!-- <?php var_dump($tampil2) ?> -->
                <input type="hidden" value="<?= $tampil2[0]['id_barang'] ?>" name="id_barang">
                <input type="hidden" value="<?= $tampil2[0]['kode_barang'] ?>" name="kode_barang">

                <label for="kode_barang">Kode Barang</label>
                <input type="text" value="<?php echo $tampil2[0]['kode_barang']; ?>" class="form-control" id="kode_barang" name="kdbarang" placeholder="Masukan Kode Barang" disabled><br>

                <label for="nama_barang">Nama Barang</label>
                <input type="text" value="<?php echo $tampil2[0]['nama_barang']; ?>" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" readonly><br>

                <label for="namaCustomer">Nama Customer</label>
                <input type="text" class="form-control" id="namaCustomer" name="namaCust" placeholder="Masukan Nama Customer"><br>

                <label for="harga">Harga Barang</label>
                <input type="number" value="<?php echo $tampil2[0]['harga_barang']; ?>" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Barang" readonly><br>

                <label for="jumlah">Jumlah Barang Yang Dibeli</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Barang"><br>

                <label for="diskon">diskon Barang Yang Diberi <i>(contoh : 15 berarti 15 %)</i></label>
                <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Masukan Diskon (%)"><br>

                <label for="tanggal">Tanggal Transaksi </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"><br>


                <button type="sumbit" class="btn btn-success" name="submit"> Tambah </button>
            </form>

        <?php endif; ?>
    </div>
</div>

<!-- End Content -->
<?php include 'template/footer.php'; ?>