<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col-2">
                <!-- Navbar -->
                <nav class="nav-side">
                    <a href="index.php" class="title">
                        <h2>Alchemist</h2>
                    </a>
                    <ul class="nav-list">
                        <li><a href="index.php"><i class="bi bi-house-door-fill icon"></i> Home</a></li>
                        <li><a href="tbl_data_barang.php"><i class="bi bi-box-arrow-in-right icon"></i> Data Barang</a></li>
                        <li><a href="tbl_barang_masuk.php"><i class="bi bi-box-arrow-in-right icon"></i>Barang Masuk</a></li>
                        <li><a href="tbl_barang_keluar.php"><i class="bi bi-box-arrow-right icon"></i>Barang Keluar</a></li>
                        <li><a href="logout.php"><i class="bi bi-box-arrow-right icon"></i> Log Out</a></li>
                    </ul>
                </nav>
                <!-- End Navbar -->
            </div>