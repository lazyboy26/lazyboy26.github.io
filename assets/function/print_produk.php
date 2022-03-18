<?php
include 'functions.php';
?>
<link rel="stylesheet" href="../css/main.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<body style=" margin: 0px 4em;">
    <!-- onload="javascript:window.print()" style="margin:0 auto; width:1000px" -->
    <div style="margin-left: 20px;"></div>
    <p>&nbsp;</p>
    <table width="100%" cellspacing="0" cellpading="0">
        <tr>
            <td>
                <div align="center">
                    <a class="navbar-brand-2" href="<?= BASE_URL ?>/print_faktur.php"><span class="color-change">IDO</span> BAUT</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div align="center">
                    <font size="3">
                        ........................................................................
                    </font>
                </div>
            </td>
        </tr>
    </table>
    <hr>
    <div align="center">
        <label class="text-center fs-3">
            <span>Laporan data Barang</u></span>
        </label>
    </div>

    <p>&nbsp;</p>

    <table style="border:1px solid black;" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <th style="border-right:1px solid black; border-bottom:1px solid black; padding:3px 5px">No</th>
            <th style="border-right:1px solid black; border-bottom:1px solid black; padding:3px 5px">Kode produk</th>
            <th style="border-right:1px solid black; border-bottom:1px solid black; padding:3px 5px">Nama produk</th>
            <th style="border-right:1px solid black; border-bottom:1px solid black; padding:3px 5px">Harga</th>
            <th style="border-right:1px solid black; border-bottom:1px solid black; padding:3px 5px">Stok</th>
        </tr>

        <?php
        $no = 1;

        if (isset($_GET['cari'])) {
        } else {
            $tampil = barang("SELECT * FROM data_barang,tbl_penjualan WHERE data_barang.id_barang = tbl_penjualan.id_barang");
        }
        foreach ($tampil as $rs) : ?>
            <tr style="border:1px solid black;" width="100%" cellspacing="0" cellpadding="0">
                <td style="border-right:1px solid black;border-bottom:1px solid black; padding:3px 5px;" align="center"><?php echo "$no"; ?></td>
                <td style="border-right:1px solid black;border-bottom:1px solid black; padding:3px 5px;"><?php echo "$rs[kode_barang]"; ?></td>
                <td style="border-right:1px solid black;border-bottom:1px solid black; padding:3px 5px;"><?php echo "$rs[nama_barang]"; ?></td>
                <td style="border-right:1px solid black;border-bottom:1px solid black; padding:3px 5px;"><?php echo "$rs[harga_barang]"; ?></td>
                <td style="border-right:1px solid black;border-bottom:1px solid black; padding:3px 5px;"><?php echo "$rs[stok]"; ?></td>
            </tr>
        <?php $no++;
        endforeach
        ?>
    </table>

    <p>&nbsp;</p>
    <table align="right" cellpadding="0" cellspacing="0">
        <tr>
            <td>.............................. , <?= date("d F Y") ?></td>
        </tr>
        <tr>
            <td>
                <p class="mb-5 mt-4">
                    ................................
                </p><br>
                <u>(......................................................................)</u>
            </td>
        </tr>
    </table>

</body>