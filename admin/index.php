<?php
session_start();
if (empty($_SESSION)) {
  header("Location: ../index.php");
}

include '../config.php';

$DATA = "SELECT COUNT(IdMember) FROM member";
$jumlah = mysqli_query($mysqli, $DATA);
$row = mysqli_fetch_row($jumlah);

// disini memiliki total jumlah baris
$rows = $row[0];

$data = "SELECT COUNT(IdPrd) FROM produk";
$jum = mysqli_query($mysqli, $data);
$ro = mysqli_fetch_row($jum);

// disini memiliki total jumlah baris
$roo = $ro[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Admin</title>
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
        <p>Selamat datang kembali <?php echo $_SESSION['username']; ?></p>
      </div>
    </div>


    <div class="row" align="center">

      <div class="col-md-3">
        <div class="thumbnail">
          <a href="member.php">
            <img src="../gambar/member.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Tota Member --> <?php echo $rows; ?></p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="thumbnail">
          <a href="produk.php">
            <img src="../gambar/buku.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Total Produk --> <?php echo $roo; ?></p>
            </div>
          </a>
        </div>
      </div>

      <!-- <div class="col-md-3">
        <div class="thumbnail">
          <a href="brgmasuk.php">
            <img src="../gambar/sto.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>STO</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="thumbnail">
          <a href="laporansto.php">
            <img src="../gambar/laporan.png" alt="Lights" style="width:100%">
            <div class="caption">
              <p>Laporan STO</p>
            </div>
          </a>
        </div>
      </div> -->

    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- footer -->
  </div>
</body>

</html>