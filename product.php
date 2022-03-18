<?php
include './assets/function/functions.php';
$data = barang("SELECT * FROM data_barang ORDER BY id_barang DESC");

function format_rupiah($total)
{
  $angka = "Rp." . number_format($total, 0, ',', '.');
  return $angka;
}

$value = "";

if (isset($_POST["cari"])) {
  $data = cari($_POST["keyword"]);
  $value = $_POST['keyword'];
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/responsive.css">

  <!-- Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500&family=Hind+Madurai:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Habibi&family=Hind+Madurai:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400&family=Martel+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <title>Ido Baut</title>
</head>

<body>
  <div class="fluid-container">
    <?php
    include 'navbar.php';
    ?>
    <!-- Back to top -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <ion-icon name="caret-up-outline"></ion-icon>
    </button>
    <!-- Akhir back to top -->

    <!-- Navbar -->
    <nav class="navbar navbar-dark sizeNav">
      <div class="button-toggler">
        <button class="navbar-toggler text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <i class="bi bi-list"></i>
          <span class="btn-kategori">
            Lihat Kategori
          </span>
        </button>
        <div class="offcanvas bg-dark offcanvas-start sideCanvas" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
              <a class="navbar-brand" href="index.php"><span class="color-change">IDO</span> BAUT</a>
            </h5>
            <button type="button" class="btn close-btn" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
          </div>
          <div class="offcanvas-body bg-dark text-white">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li>Kategori Barang</li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Baut
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="offcanvasNavbarDropdown">
                  <?php
                  // Select Kategori Baut
                  $kategori = barang("SELECT * FROM data_barang WHERE kategori = 'baut' ORDER BY id_barang DESC");
                  foreach ($kategori as $barang) :
                  ?>
                    <li><a class="dropdown-item" href="#">
                        <?= $barang['nama_barang']; ?>
                      </a></li>
                    <li>
                    <?php endforeach; ?>
                </ul>
              </li>
            </ul>
            <form class="d-flex" method="POST" action="">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="<?= $value ?>">
              <button class="btn btn-outline-secondary" type="submit" name="cari">Search</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navs -->
  </div>


  <!-- Article -->
  <div class="container-fluid card-container">
    <?php include 'product-baut.php'; ?>
  </div>
  <!-- Akhir Article -->

  <!-- Footer -->
  <div class="row">
    <?php
    include 'footer.php';
    ?>
  </div>
  <!-- Akhir Footer -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>

  <!-- Icon JS -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- AOS Animation -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Initialize AOS -->
  <script>
    AOS.init();
  </script>
</body>

</html>