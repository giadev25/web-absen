<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: login.php");
} 


require 'config.php'; 
$id = mysqli_escape_string($conn, $_GET['id']);

if(isset($_POST['submit'])){
	$id_post = mysqli_escape_string($conn, $_POST['id']);	
	$nama = htmlspecialchars($_POST['nama']);
	$email = htmlspecialchars($_POST['email']);
	$telp = htmlspecialchars($_POST['telp']);

	mysqli_query($conn, "UPDATE data_siswa SET nama='$nama', email='$email', telp='$telp' WHERE id='$id_post'");

	if(mysqli_affected_rows($conn) < 0) {
		echo "<script>
				alert('Data Gagal diubah');
		      </script>";
	} else {
		echo "<script>
				alert('Data Berhasil diubah');
				window.location.href = 'index.php';
		      </script>";

	}
}

$query = mysqli_query($conn, "SELECT * FROM data_siswa WHERE id='$id'");

$result = mysqli_fetch_assoc($query);

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
    <title>Halaman Ubah Data</title>
  </head>
  <body>

  	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h4 class="card-title text-center mb-5 fs-5">Halaman Ubah Data</h4>

            <form action="" method="post">
              <input type="hidden" value="<?= $result['id']; ?>" name="id">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" placeholder="Jhon Doe" name="nama" value="<?= $result['nama'] ?>">
                <label for="nama">Nama</label>
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingPassword" placeholder="Email" name="email" value="<?= $result['email'] ?>">
                <label for="floatingPassword">Email</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Telp" name="telp" value="<?= $result['telp'] ?>">
                <label for="floatingPassword">Nomor Telepon</label>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submit">Ubah Data</button>
              </div>

              <div class="d-grid">
              	<a href="index.php" class="btn btn-danger fw-bold btn-login text-uppercase mt-2">Kembali</a>
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