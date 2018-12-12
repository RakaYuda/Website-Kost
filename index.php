<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . "/vendor/autoload.php";

$connection = new MongoDB\Driver\Manager();
$db = (new MongoDB\Client)->dbkos;

$collection = (new MongoDB\Client)->dbkos->twarga;

$result = $collection->find();

?>
<head>
	<title>Website Kost</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<style type="text/css">
	html,body{
		height: 100%;
		width: 	100%;
	}
</style>
<body class="bdindex">
	
	<div class="card text-center">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Tambah</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="lihat.php">Lihat</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disable" href="edit.php">Edit</a>
				</li>
			</ul>
		</div>
		<!-- <form action method="POST">
			<div class="tambah">
				<h1>Tambahkan Warga Baru</h1>
				<table>
					<tr>
						<td>NIK</td>
						<td><input type="text" name="nik"></td>
					</tr>
					<tr>
						<td>NAMA</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>TEMPAT TANGGAL LAHIR</td>
						<td><input type="text" name="ttl" placeholder="Kota, dd-mm-yyyy"></td>
					</tr>
					<tr>
						<td>ALAMAT</td>
						<td><input type="text" name="alamat"></td>
					</tr>
					<tr>

						<td>AGAMA</td>
						<td><input type="text" name="agama"></td>
					</tr>
					<tr>

						<td>PEKERJAAN</td>
						<td><input type="text" name="pekerjaan"></td>
					</tr>
				</table>
				<button name="Submit" class="tambahi" value="Add">TAMBAH</button>
			</div>
		</form> -->

		<form action method="POST">
			<div class="card text-center text-white bg-info w-50 mt-5 mb-5 float-right mr-5">
				<div class="card-header">
					Data Anak Kost
				</div>
				<div class="card-body">
					<div class="row w-50 mx-auto pb-3">
						<div class="col">
							<input type="text" class="form-control" placeholder="First name" name="firstname">
						</div>
					</div>
					<div class="row w-50 mx-auto pb-3">
						<div class="col">
							<input type="text" class="form-control" placeholder="Last name" name="lastname">
						</div>
					</div>
					<div class="row w-50 mx-auto pb-3">
						<div class="col">
							<input type="text" class="form-control" placeholder="Address" name="address">
						</div>
					</div>
				</div>

				<button class="card-footer btn text-white tambahi" name="Submit" value="Add">
					Submit
				</button>
			</div>
		</form>
	</body>
	</html>

	<?php
	if(isset($_POST['Submit'])){
		$insertOneResult = $collection->insertOne([
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'address' => $_POST['address']
			]);}

			?>