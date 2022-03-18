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

function format_rupiah($total)
{
    $angka = "Rp." . number_format($total, 2, ',', '.');
    return $angka;
}
include 'template/header.php';
$tampil = barang("SELECT * FROM data_barang,tbl_penjualan WHERE data_barang.id_barang = tbl_penjualan.id_barang");
$value = "";
$sampai = $value;
$dari = $value;

if (isset($_POST["cari"])) {
    $tampil = cariP($_POST["keyword"]);
    $value = $_POST['keyword'];
} else if (isset($_POST['caridate'])) {
    $tampil = caridate2($_POST['dari'], $_POST['sampai']);
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];
}

$no = 1;
?>

<!-- Content -->
<link rel="stylesheet" href="style.css">
<div class="tbl_keluar">
    <div class="col-10" style="margin: 20px;">
        <table class="table table-striped table-hover table-light table-bordered">
            <h1>Data Barang Keluar</h1>
            <div class="row">
                <div class="col-3">
                    <form action="" method="post">
                        <label for="cari" style="font-size: 15px">Cari Barang :</label>
                        <input id="cari" class="mb-3 input-control-sm" type="text" name="keyword" placeholder="Masukkan Kode / Nama Barang" autocomplete="off" value="<?= $value; ?>">
                        <button type="submit" class="btn btn-info btn-sm mb-2 mt-1 ps-3 pe-3" name="cari">Cari</button>
                    </form>
                </div>
                <div class="col-6">
                    <form action="" method="post">
                        <label for="cari" style="font-size: 15px">Cari Barang :</label><br>
                        <input id="cari" class="mb-3 input-control-sm" type="date" name="dari" placeholder="Masukkan Kode / Nama Barang" autocomplete="off" value="<?= $dari; ?>">s/d
                        <input id="cari" class="mb-3 input-control-sm" type="date" name="sampai" placeholder="Masukkan Kode / Nama Barang" autocomplete="off" value="<?= $sampai; ?>">
                        <button type="submit" class="btn btn-info btn-sm mb-2 mt-1 ps-3 pe-3" name="caridate">Cari</button>
                    </form>
                </div>
            </div>
            <a href="tambah_transaksi.php" class="btn btn-success btn-sm mb-2 mt-1">Tambah Transaksi</a>
            <a href="print_faktur.php" class="btn btn-warning btn-sm mb-2 mt-1 ms-2">Cetak</a>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Keluar</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Nama Customer</th>
                    <th>Harga Barang</th>
                    <th>Jumlah</th>
                    <th>Diskon</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tampil as $arr) : ?>
                    <tr>
                        <td><?= $no++ ?> </td>
                        <td><?= $arr['tanggal'] ?> </td>
                        <td><?= $arr['kode_barang'] ?> </td>
                        <td><?= $arr['nama_barang'] ?> </td>
                        <td><?= $arr['nama_cust'] ?> </td>
                        <td><?= format_rupiah($arr['harga_barang']) ?> </td>
                        <td><?= $arr['jumlah'] ?> </td>
                        <td><?= $arr['diskon'] ?> %</td>
                        <td><?= format_rupiah($arr['total']) ?> </td>
                        <td>

                            <a href="edit_penjualan.php?id=<?= $arr['id_penjualan'] ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus_penjualan.php?id=<?= $arr['id_penjualan'] ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger">Hapus</a>

                        </td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <?php

                    $total = 0;
                    foreach ($tampil as $key) {
                        $total = $total + $key['total'];
                    }
                    // var_dump($data['total']);

                    ?>
                    <th colspan="8">Total</th>
                    <th colspan="2"><?= format_rupiah($total) ?></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- End Content -->
</div>
</div>
</div>

</body>

</html>