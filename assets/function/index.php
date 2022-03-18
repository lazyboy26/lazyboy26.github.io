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
include 'template/header.php';
?>

<!-- Content -->
<div class="info-index text-center position-absolute top-50 start-50 translate-middle">
    <h3 class="pt-3 pb-2 ms-5 ps-5">Dashboard Admin</h3>
    <h5 class="pb-1 ms-5 ps-5">Wellcome Admin</h5>
</div>
<!-- End Content -->

<?php include 'template/footer.php' ?>