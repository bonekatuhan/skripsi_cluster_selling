<?php
session_start();
if (empty($_SESSION)) {
	header("Location: ../index.php");
}


include '../config.php';

$DATA = "SELECT COUNT(IdJual) FROM penjualan";
$jumlah = mysqli_query($mysqli, $DATA);
$row = mysqli_fetch_row($jumlah);

// disini memiliki total jumlah baris
$rows = $row[0];

// variabel yang digunakan untuk membatasi data yang ditampilkan
$page_rows = 10;

// membantu halaman membuat halaman terakhir ceil adalah membulatkan data koma
$halaman = ceil($rows / $page_rows);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $page_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Rekap Transaksi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../js/jquery-ui/jquery-ui.css">
	<link rel="shortcut icon" href="../favicon.ico" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui/jquery-ui.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</head>

<body>

	<?php include 'nav.php' ?>


	<div class="container">

		<div class="jumbotron">
			<img src="../gambar/logo.png" class="img-rounded" alt="Lights" style="width:100%">
		</div>

		<div class="row">
			<div class="col-md-12">
				<h4>Detail Penjualan</h4>
			</div>
		</div>

		<div class="row">


		</div>

		<?php
		$kode = $_GET['kode'];
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<th class="col-sm-1">No</th>
							<th hidden="hidden">Id Penjualan</th>
							<th class="col-sm-3">Nama Produk</th>
							<th class="col-sm-1">Jumlah</th>
							<th class="col-sm-1">Harga</th>
							<th class="col-sm-1">Total</th>
						</thead>
						<caption>Kode Nota : <?php echo $kode; ?></caption>
						<?php

						$id = $_GET['kode'];
						$Data = "SELECT * FROM detjual INNER JOIN produk ON produk.IdPrd=detjual.IdPrd WHERE IdJual='$id'";
						$result = $mysqli->query($Data);
						$no = 1;
						if ($result->num_rows > 0) {
							while ($b = $result->fetch_array()) {
								$total = $b['Harga'] * $b['Jumlah'];
								echo '
						<tbody align="center">
							<tr>
								<td>' . $no++ . '</td>
								<td hidden>' . $b['IdDetJual'] . '</td>
								<td>' . $b['NamaPrd'] . '</td>
								<td>' . $b['Jumlah'] . '</td>
								<td>' . $b['Harga'] . '</td>
								<td>' . $total . '</td>								
							</tr>
						</tbody>';
							}
						}
						?>
					</table>

					<!-- paging -->

					<!-- paging -->
				</div>
			</div>
		</div>


		<!-- footer -->
		<?php include 'footer.php' ?>
		<!-- footer -->


	</div>
</body>

</html>