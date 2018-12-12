<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . "/vendor/autoload.php";

$connection = new MongoDB\Driver\Manager();
$db = (new MongoDB\Client)->dbweb;

$collection = (new MongoDB\Client)->dbweb->twarga;

$result = $collection->find();

?>
<head>
	<title>Web Masyarakat Purwokerto</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bdlihat">
<ul>
  <li><a href="index.php" class="tambah">Tambah</a></li>
  <li><a href="lihat.php" class="lihat">Lihat</a></li>
</ul>
