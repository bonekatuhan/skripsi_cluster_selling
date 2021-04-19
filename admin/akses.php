<?php
session_start();
if (empty($_SESSION)) {
	header("Location: ../index.php");
}

include '../config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Hak Akses</title>
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
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>Kelola Hak Akses</h4>
			</div>
		</div>

		<?php

		if (isset($_POST["simpan"])) {

			$a = $_POST["id"];
			$b = $_POST["username"];
			$c = md5($_POST['password']);
			$d = $_POST["nama"];
			$i = $_POST["email"];
			$e = $_POST["alamat"];
			$f = $_POST["telepon"];
			$g = $_POST["level"];
			$h = $_FILES["foto"]["name"];

			if (strlen($h) > 0) {
				if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
					move_uploaded_file($_FILES["foto"]["tmp_name"], "../foto/" . $h);
				}
			}

			$sql = "INSERT INTO users VALUES('$a','$b','$c','$d','$i','$e','$f','$g','$h')";
			$hasil = mysqli_query($mysqli, $sql);

			if ($hasil) {
				echo "<script>window.alert('DATA BERHASIL DISIMPAN');;window.location='akses.php'</script>";
			} else {
				echo $mysqli->error;
			}
		}
		echo "

		<div class='row'>
			<div class='col-md-4'>
				<form role='form' action='' method='POST' enctype='multipart/form-data'>
					<h2>Input Hak Akses</h2>
					<div class='form-group' align='center'>
						<label for='id'>Id</label>
						<input readonly='readonly' required type='text' name='id' class='form-control' placeholder='Automatic Id . .'>
						<label for='nama'>Username</label>
						<input type='text' required name='username' class='form-control' placeholder='Username . .'>
						<label for='password'>Password</label>
						<input type='text' required name='password' class='form-control' placeholder='Password . .'>
						<label for='nama'>Nama</label>
						<input type='text' required name='nama' class='form-control' placeholder='Nama Admin . .'>
						<label for='alamat'>Alamat</label>
						<input type='text' required name='alamat' class='form-control' placeholder='Alamat Admin . .'>
						<label for='telepon'>Telepon</label>
						<input type='text' required name='telepon' class='form-control' placeholder='Nomor Telepon . .'>
						<label for='email'>Email</label>
						<input type='text' required name='email' class='form-control' placeholder='Email . .'>
						<label for='level'>Level</label>
						<select name='level' class='form-control' required>
			              <option value=''>Pilih Level User</option>
			              <option value='admin'>Administrator</option>
			              <option value='kasir'>Kasir</option>
			              <option value='pimpinan'>Pimpinan</option>
			            </select></br>
			            <label for='foto'>Foto</label>
			            <input type='file' name='foto'>
						<input type='submit' name='simpan' class='btn btn-primary' value='Simpan'>
					</div>
				
				</form>
			</div>
		";
		?>

		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th class="col col-sm-1 col-sm-1">No</th>
						<!-- <th hidden="hidden" class="col col-sm-3 col-sm-3">Username</th>
					<th hidden="hidden" class="col col-sm-2 col-sm-2">Password</th> -->
						<th class="col col-sm-2 col-sm-2">Nama</th>
						<th class="col col-sm-2 col-sm-2">Alamat</th>
						<th class="col col-sm-2 col-sm-2">Telepon</th>
						<th class="col col-sm-2 col-sm-2">Email</th>
						<th class="col col-sm-2 col-sm-2">Level</th>
						<th class="col col-sm-2 col-sm-2">Aksi</th>
					</thead>
					<caption>Data Hak Akses</caption>
					<?php

					$Data = "SELECT * FROM users";
					$result = $mysqli->query($Data);
					$no = 1;
					if ($result->num_rows > 0) {
						while ($b = $result->fetch_array()) {
							echo '
				<tbody>
					<tr class="active">
						<td>' . $no++ . '</td>
						<td hidden>' . $b['id'] . '</td>
						<td hidden>' . $b['username'] . '</td>
						<td hidden>' . $b['password'] . '</td>
						<td>' . $b['nama'] . '</td>
						<td>' . $b['alamat'] . '</td>
						<td>' . $b['telepon'] . '</td>
						<td>' . $b['email'] . '</td>
						<td>' . $b['level'] . '</td>
						<td>
						<a onclick="return hapus()" href="delak.php?kode=' . $b['id'] . '" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				</tbody>';
						}
					}
					?>
				</table>

			</div>
		</div>


	</div>

	<!-- footer -->
	<div class="page-header">
		<?php include 'footer.php' ?>
	</div>
	<!-- footer -->

	<script type="text/javascript" language="JavaScript">
		function hapus() {
			takon = confirm("Anda Yakin Akan Menghapus Data ?");
			if (takon == true) return true;
			else return false;
		}
	</script>

	</div>
</body>

</html>