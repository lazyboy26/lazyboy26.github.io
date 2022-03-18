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

$tampil = barang("SELECT * FROM data_barang ORDER BY kode_barang DESC");
$value = "";
$dari = "";
$sampai = "";

if (isset($_POST["cari"])) {
    $tampil = cari($_POST["keyword"]);
    $value = $_POST['keyword'];
}else if (isset($_POST['caridate'])) {
    $tampil = caridate($_POST['dari'], $_POST['sampai']);
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];
}

include 'template/header.php';
?>

<!-- Content -->
<div class="tbl_keluar">
    <div class="col-10 m-3  " style="margin: 20px;">
        <h1>Data Barang</h1>
        <table class="table table-striped table-hover table-light table-bordered">
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
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Tanggal Masuk </th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Promo</th>
                    <th>Diskon</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tampil as $arr) :
                ?>
                    <tr>
                        <td><?= $no++ ?> </td>
                        <td><?= $arr['kode_barang'] ?> </td>
                        <td><?= $arr['nama_barang'] ?> </td>
                        <td><?= $arr['stok'] ?> </td>
                        <td><?= $arr['kategori'] ?> </td>
                        <td><?= $arr['timestamp'] ?> </td>
                        <td><img style="width: 60px;" class="border border-dark" src="img/<?= $arr['img'] ?>" alt=""> </td>
                        <td><?= format_rupiah($arr['harga_barang']) ?> </td>
                        <td><?= $arr['status'] ?> </td>
                        <td><?= $arr['diskon_promo'] ?>% </td>
                        <td><?= format_rupiah($arr['total_harga']) ?></td>
                        <td>
                            <a href="edit.php?kdbarang=<?= $arr['kode_barang'] ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?kdbarang=<?= $arr['kode_barang'] ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Content -->
<?php include 'template/footer.php'; ?>