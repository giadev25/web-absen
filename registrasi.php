<?php
session_start();

if(isset($_SESSION['login'])){
  header("Location: index.php");
}

require 'config.php';



if(isset($_POST['regis'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
  $password3 = $_POST['password3'];

	// step 1 verifikasi password
	if($password != $password2){
		echo "<script>
				alert('Password yang anda masukkan tidak sama');
		      </script>";
	}
	// step 2 enkripsi password
	$password_encryp = password_hash($password, PASSWORD_DEFAULT);

	// masukan ke database
	mysqli_query($conn, "INSERT INTO user VALUES (null, '$email', '$password_encryp')");

	// redirect ke login
	if(mysqli_affected_rows($conn) < 0) {
		echo "<script>
				alert('User baru tidak berhasil terdaftar');
		      </script>";
	} else if($password3 != "argiamahya123") {

  } else {
		header("Location: login.php");
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website untuk mengelola data absen SMPN 11 Bekaso kelas 8.C">
    <meta name="author" content="argiamahya">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Halaman Registrasi</title>
  </head>
  <body>

  	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h4 class="card-title text-center mb-5 fs-5">Registration</h4>
            <form action="" method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password2">
                <label for="floatingPassword">Verifikasi password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password3">
                <label for="floatingPassword">Admin Password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="regis">Registrasi</button>
              </div>
              <div class="d-grid mt-2">
                <a href="login.php" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="regis">Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>