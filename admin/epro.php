<?php
session_start();
if (empty($_SESSION)) {
	header("Location: ../index.php");
}

include '../config.php';

$id = $_GET['kode'];
$SQL_DATA = $mysqli->query("SELECT * FROM produk WHERE IdPrd='$id'");
$m = $SQL_DATA->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Data Produk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../js/jquery-ui/jquery-ui.css">
	<link rel="shortcut icon" href="../favicon.ico" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui/jquery-ui.js"></script>
	<!--  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> -->

</head>

<body>

	<?php include 'nav.php' ?>


	<div class="container">

		<div class="jumbotron">
			<img src="../gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%">
		</div>

		<div class="row">
			<div class="col-md-12">
				<h4>Edit Produk</h4>
			</div>
		</div>

		<?php
		if (isset($_POST["edit"])) {

			$a = $_POST['id'];
			$b = $_POST['nama'];
			$e = $_POST['qty'];
			$f = $_POST['harga'];

			$SQL = $mysqli->query("UPDATE produk SET NamaPrd='$b', Qty='$e', Harga='$f' WHERE IdPrd='$a'");

			if ($SQL) {
				echo "<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='produk.php'</script>";
			} else {
				echo "<script>window.alert('DATA GAGAL DISIMPAN');;window.location='produk.php'</script>";
			}
		}
		echo "
	<div class='row'>
		<form class='form-horizontal' role='form' action='' method='POST'>
			<div class='col-md-5'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='id'>Id Produk</label>
					<div class='col-sm-8'>
					<input type='text' name='id' class='form-control' value='" . $m['IdPrd'] . "'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='nama'>Nama Produk</label>
					<div class='col-sm-8'>
					<input type='text' name='nama' class='form-control' value='" . $m['NamaPrd'] . "'>
					</div>
				</div>
			</div>
			
			<div class='col-md-6'>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='qty'>Jumlah Produk</label>
					<div class='col-sm-8'>
					<input type='text' name='qty' class='form-control' value='" . $m['Qty'] . "'>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-4' for='harga'>Harga</label>
					<div class='col-sm-8'>
					<input type='text' name='harga' class='form-control' value='" . $m['Harga'] . "'>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-6 col-sm-10'>
					<button type='submit' class='btn btn-success' name='edit'>EDIT</button>
					<a href='produk.php' class='btn btn-warning'>Batal</a>
					</div>
				</div>
			</div>
		</form>
		</div>"; ?>
	</div>
	</div>
	</div>

	<!-- footer -->
	<?php include 'footer.php' ?>
	<!-- footer -->


	</div>
</body>

</html>