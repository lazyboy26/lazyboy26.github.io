<?php
session_start();
require 'functions.php';

if (isset($_SESSION["login"])) {
	echo "<meta http-equiv='refresh' content='0,url=" . BASE_URL . "index.php'>";
	exit;
}


if (isset($_POST["login"])) {
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$cariuser = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user' ");
	// Cek username apakah ada
	if (mysqli_num_rows($cariuser) === 1) {
		// Cek Password
		$row = mysqli_fetch_assoc($cariuser);
		if ($row['password'] == $pass) {
			$_SESSION["login"] = true;
			echo "<meta http-equiv='refresh' content='0,url=" . BASE_URL . "index.php'>";
			exit;
		}
	}
	$error = true;
}

?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<h2>Login Page !</h2>

<form method="POST" action="">
	
	<label style="display: block;">Username : </label>
	<input type="text" name="username" required placeholder="Masukan Username" autocomplete="off">

	<label style="display: block;">Password : </label>
	<input type="password" name="password" required placeholder="Masukan Password" autocomplete="off"><br>

    <br>
	<button type="submit" name="login">Sign In !</button>
</form>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ido Baut - Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg">
	<div class="container-fluid">
		<div class="position-absolute top-50 start-50 translate-middle">
			<div class="row p-5 form-bg">
				<div class="title col-7">
					<h1>Login Admin</h1>
				</div>
				<div class="form col-5">
					<?php if (isset($error)) : ?>
						<h6 style="color: red; font-style: italic;">Username / Password Salah</h6>
					<?php else : ?>
					<h6>Silahkan Login Terlebih Dahulu!</h6>
					<?php endif ?>
					<form action="" method="POST">
						<div class="username mb-2">
							<label for="user">Username</label><br>
							<input class="form-style" type="text" name="username" id="user" placeholder="Masukkan Username">
						</div>
						<div class="password">
							<label for="password">Password</label><br>
							<input class="form-style" type="password" name="password" id="password" placeholder="Masukkan Password"><br>
							<div class="see form-check form-switch">
								<input type="checkbox" name="see" id="see" class="form-check-input" onclick="seepass()" role="switch">
								<span class="seepass" for="see"><label for="see">See Password</label></span>
							</div>

							<?php
							// See Passwprd
							echo '<script>
                                function seepass() {
                                    var x = document.getElementById("password");
                                    if (x.type === "password") {
                                		x.type = "text";
                                    } else {
                                    	x.type = "password";
                                    }
                                }
                                </script>';
							?>
						</div>
						<button class="button-edit mt-2 ps-5 pe-5" name="login" type="submit">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>