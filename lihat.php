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
<body class="bdlihat">
	<div class="card text-center">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Tambah</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="lihat.php">Lihat</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disable" href="edit.php">Edit</a>
				</li>
			</ul>
		</div>

		<div id="lihat">
			<h1>Lihat Daftar Warga</h1>
			<div class="t-lihat">
				<table border="">

					<tr>
						<th>NIK</th>
						<th>NAMA</th>
						<th>TEMPAT TANGGAL LAHIR</th>
						<th>ALAMAT</th>
						<th>AGAMA</th>
						<th>PEKERJAAN</th>
						<th>ACTION</th>
					</tr>
					<?php     
					foreach ($result as $res) {
						echo "<tr>";
						echo "<td>".$res['firstname']."</td>";
						echo "<td>".$res['lastname']."</td>";    
						echo "<td>".$res['address']."</td>";    
						echo "<td>
						<div class='edit'>
							<a href=\"edit.php?id=$res[_id]\">Edit</a>
						</div>
						<div class='delete'>
							<a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Anda yakin untuk menghapus data?')\">Delete</a>
						</div>
					</td>";        
				}
				?>
			</table>
		</div>
	</div>

	<div class="card text-center w-75 mx-auto mt-5">
		<div class="card-header">
			List Warga Kost
		</div>
		<div class="card-body">
		<?php foreach ($arr as $val): ?>
			<div class="row w-50 mx-auto pb-3">
				<div class="col">
					<?php echo $val['firstname'];?>
				</div>
				<div class="col">
					<?php echo $val['lastname'];?>
				</div>
				<div class="col">
					<?php echo $val['address'];?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="card-footer text-muted">
			Last Update
		</div>
	</div>

</body>
</html>