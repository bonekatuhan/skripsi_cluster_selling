<?php
session_start();
if (empty($_SESSION)) {
  header("Location: ../index.php");
}


include '../config.php';
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Owner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="shortcut icon" href="../favicon.ico" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>

  <?php include 'nav.php' ?>


  <div class="container">
    <div class="jumbotron">
      <img src="../gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%">

      <div class="row">
        <br>
        <br>
        <p>Selamat datang kembali <?php echo $username; ?></p>
      </div>
    </div>



    <div class="row">
      <?php

      $Load = "SELECT * FROM users WHERE username='" . $username . "'";
      $hasil = $mysqli->query($Load);
      while ($b = $hasil->fetch_array()) {
        $id = $b['id'];
        $username = $b['username'];
        $password = $b['password'];
        $nama = $b['nama'];
        $email = $b['email'];
        $alamat = $b['alamat'];
        $telepon = $b['telepon'];
        $foto = $b['foto'];
        echo '
      <div class="col-md-4">
          <div class="thumbnail">
            <tbody>
              <tr>
                <img class="img-responsive" src="../foto/' . $foto . '" alt="Image" height="50%">
              </tr>
            </tbody>
          </div>
      </div>
      <div class="col-md-8">
          <table class="table">

            <thead>
                <tr>
                  <th>PROFIL USER</th>
              </tr>
            </thead>

            <tbody>
                <tr>
                  <td>Id User</td>
                  <td>:</td>
                  <td>' . $id . '</td>
                </tr>      
                <tr class="success">
                  <td>Username</td>
                  <td>:</td>
                  <td>' . $username . '</td>
                </tr>
                <tr class="danger">
                  <td>Password</td>
                  <td>:</td>
                  <td>' . $password . '</td>
                </tr>
                <tr class="info">
                  <td>Nama User</td>
                  <td>:</td>
                  <td>' . $nama . '</td> 
                </tr>
                <tr class="warning">
                  <td>Alamat User</td>
                  <td>:</td>
                  <td> ' . $alamat . '</td>
                </tr>
                <tr class="active">
                  <td>Email User</td>
                  <td>:</td>
                  <td> ' . $email . '</td>
                </tr>
                <tr class="success">
                  <td>Nomor Telepon</td>
                  <td>:</td>
                  <td> ' . $telepon . '</td>
                </tr>
                <tr>
                  <td align="center" colspan="3"><a href="eprofil.php?kode=' . $id . '" class="btn btn-info">Edit</a></td>
                </tr
            </tbody>
          </table>
      </div>';
      }

      ?>

    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- footer -->
  </div>
</body>

</html>