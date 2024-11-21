<?php
require_once('../config/koneksi.php');
require_once('../models/database.php');
include "../models/m_mobil.php";
$connection = new database($host, $user, $pass, $database);
$mbl = new Mobil($connection);

$plat_nomor = $_POST['plat_nomor'];
$merk_mobil = $connection->conn->real_escape_string($_POST['merk_mobil']);
$tipe_mobil = $connection->conn->real_escape_string($_POST['tipe_mobil']);
$thn_buat = $connection->conn->real_escape_string($_POST['thn_buat']);
$kapasitas = $connection->conn->real_escape_string($_POST['kapasitas']);
$stok_mobil = $connection->conn->real_escape_string($_POST['stok_mobil']);
$biaya_rental = $connection->conn->real_escape_string($_POST['biaya_rental']);

$mbl->editdatamobil("UPDATE mobil SET merk_mobil = '$merk_mobil', tipe_mobil = '$tipe_mobil', thn_buat = '$thn_buat', kapasitas = '$kapasitas', stok_mobil = '$stok_mobil', biaya_rental = '$biaya_rental' WHERE plat_nomor='$plat_nomor'");
echo "<script>window.location='?page=daftar_mobil'; </script>";
?>