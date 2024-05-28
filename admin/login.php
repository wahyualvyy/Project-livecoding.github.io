<?php
session_start();

include("../function/koneksi.php");


if (isset($_POST['login'])) {
  
  $username = $_POST['nama'];
  $password = $_POST['password'];

  $query = "SELECT * FROM tb_admin WHERE nama = '$username' AND password = '$password'";
  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['nama'] = $username;
    header("location: admin.php");
  } else {
    $error = "Nama pengguna atau kata sandi salah!";
  }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-4 m-auto">
        <div class="card" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
          <div class="card-body">
            <form action="" method="post">
              <input type="text" name="nama" class="form-control my-4 py-3" placeholder="Nama">
              <input type="password" name="password" class="form-control my-4 py-3" placeholder="Password">
              <div class="text-center mt-3">
                <input type="submit" class="btn fs-4 text-white px-5" style="background-color: #102C57;" name="login" value="Login"></input>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>