<?php 
require 'config.php';

if(isset($_POST['komen'])){
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $komentar = htmlspecialchars($_POST['komentar']);

  mysqli_query($conn, "INSERT INTO komentar VALUES (null, '$nama', '$email', '$komentar')");

  if(mysqli_affected_rows($conn) < 0) {
    echo "<script>
           alert('Komentar gagal dikirim');
          </script>";
  } else {
    echo "<script>
           alert('Komentar Berhasil Dikirim');
          </script>";

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
    <title>Halaman Komentar</title>
  </head>
  <body>

  	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h4 class="card-title text-center mb-5 fs-5">Halaman Komentar</h4>
            <form action="" method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Jhon Doe" name="nama">
                <label for="floatingInput">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Jhon Doe" name="email">
                <label for="floatingInput">Email</label>
              </div>
              <div class="mb-3">
                <label for="komentar" class="form-label">Komentar</label>
                <textarea class="form-control" id="komentar" rows="3" name="komentar"></textarea>
              </div>
              <div class="d-grid mt-2">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="komen">Beri Komentar Sekarang</button>
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