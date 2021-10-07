<?php 
session_start();

if(isset($_SESSION['login'])){
	header("Location: index.php");
}

require 'config.php';

$error = false;


if(isset($_POST['login'])) {

	// $email = preg_replace('/[^A-Za-z0-9\-]/', '', htmlspecialchars($_POST['email']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$password = $_POST['password'];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
	$data_login = mysqli_fetch_assoc($result);

	// cek apakah ada emai
	if(mysqli_num_rows($result) >= 1) {

		// cek password
		if (password_verify($password, $data_login['password'])){

			$_SESSION['login'] = true;
			header("Location: index.php");

		} else {
			$error = true;
		} 

	} else {
		$error = true;
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
    <title>Login</title>
  </head>
  <body>

  	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h4 class="card-title text-center mb-5 fs-5">Sign In</h4>
            <form action="" method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>
              <?php if($error): ?>
              	<div id="emailHelp" class="form-text text-danger mb-3">Email/password tidak ada dalam record database</div>
          	  <?php endif; ?>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="login">Sign
                  in</button>
              </div>
              <div class="d-grid mt-2">
                <a href="guest.php" class="btn btn-success btn-login text-uppercase fw-bold" type="submit" name="regis">Guest User</a>
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
