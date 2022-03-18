<?php
include './assets/function/functions.php';
$data = barang("SELECT * FROM data_barang WHERE status = 'promo' ORDER BY id_barang DESC");

function format_rupiah($total)
{
  $angka = "Rp." . number_format($total, 0, ',', '.');
  return $angka;
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

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

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
  <div class="row">
    <div class="col-12">
      <?php
      include 'navbar.php';
      ?>

    </div>
  </div>
  <!-- Hero -->
  <div class="swiper mySwiper ">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="./assets/img/pexels-photo-1045535.jpeg" alt="">
        <div class="caption">
          <h1>Murah, berkualitas dan terpercaya</h1>
          <p>Toko Kami Menjual berbagai macam Baut Lengkap dan Berkualitas, Silahkan Memilih dan Melihat Berbagai Produk
            kami.</p>
          <a href="" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
      <div class="swiper-slide">
        <img src="./assets/img/pexels-photo-4513031.jpeg" alt="">
        <div class="caption">
          <h1>Murah, berkualitas dan terpercaya</h1>
          <p>Toko Kami Menjual berbagai macam Baut Lengkap dan Berkualitas, Silahkan Memilih dan Melihat Berbagai Produk
            kami.</p>
          <a href="" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
      <div class="swiper-slide">
        <img src="./assets/img/pexels-photo-6212576.jpeg" alt="">
        <div class="caption">
          <h1>Murah, berkualitas dan terpercaya</h1>
          <p>Toko Kami Menjual berbagai macam Baut Lengkap dan Berkualitas, Silahkan Memilih dan Melihat Berbagai Produk
            kami.</p>
          <a href="" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
  <!-- Akhir Hero -->

  <!-- Back to top -->
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <ion-icon name="caret-up-outline"></ion-icon>
  </button>
  <!-- Akhir back to top -->

  <!-- Why Us Section -->
  <section id="about" class="why-us-section">
    <!-- Page Content -->
    <div class="container about">

      <!-- Page Heading -->
      <h1 class="why-us-heading py-4">Kenapa Harus Produk Kami ?</h1>
      <div class="row whyUs">
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="why-us-card">
            <h4 class="icons">
              <i class="bi bi-shield-check"></i>
            </h4>
            <div class="card-body">
              <h4 class="why-us-cards-title card-title">
                Bergaransi
              </h4>
              <p class="why-us-cards-text card-text">Produk yang kami jual bergaransi dan kami akan mengganti produk
                jika tidak ada kesesuaian dengan mengikuti ketentuan garansi Alchemist Baut</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="why-us-card">
            <h4 class="icons">
              <i class="bi bi-cash-coin"></i>
            </h4>
            <div class="card-body">
              <h4 class="why-us-cards-title card-title">
                Harga Terjangkau
              </h4>
              <p class="why-us-cards-text card-text">Produk yang kami jual bergaransi dan kami akan mengganti produk
                jika tidak ada kesesuaian dengan mengikuti ketentuan garansi Alchemist Baut</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="why-us-card">
            <h4 class="icons">
              <i class="bi bi-person-check"></i>
            </h4>
            <div class="card-body">
              <h4 class="why-us-cards-title card-title">
                Mengutamakan Kepuasan Pelanggan
              </h4>
              <p class="why-us-cards-text card-text">Produk yang kami jual bergaransi dan kami akan mengganti produk
                jika tidak ada kesesuaian dengan mengikuti ketentuan garansi Alchemist Baut</p>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container -->
  </section>
  <!-- Akhir Why Us Section -->

  <!-- Product Highlight -->

  <div class="row">
    <section id="products" class="product-highlight-section">
      <!-- Page Content -->
      <h1 class="product-heading">Produk Terbaru</h1>
      <div class="cards-container">
        <div class="row container-product">
          <?php foreach ($data as $barang) : ?>
            <div class="col-lg-3 col-md-4 col-sm-4 card-box">
              <div class="card product-card">
                <a href="">
                  <img src="./assets/function/img/<?= $barang['img']; ?>" class="product-card-img card-img-top mt-4 img-fluid" alt="...">
                </a>
                <div class="card-body">
                  <span class="product-promo position-absolute top-0 start-0 bg-danger text-white">Promo</span>
                  <h5 class="product-titles"><?= $barang['nama_barang']; ?></h5>
                  <div class="product-price card-text">
                    <p class="real-price"><?= format_rupiah($barang['harga_barang']) ?></p>
                    <p class="discount-price"><?= format_rupiah($barang['harga_promo']) ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
    <!-- Footer -->
    <div class="container-footer row">
      <?php
      include 'footer.php';
      ?>
    </div>
    <!-- Akhir Footer -->
  </section>
  <!-- Akhir Product Highlight -->


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

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

  <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 500px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
</body>

</html>