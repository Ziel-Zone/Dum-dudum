<?php
require_once('../config/koneksi.php');
require_once('../models/database.php');
include "../models/m_pelanggan.php";
$connection = new database($host, $user, $pass, $database);
$plg = new Pelanggan($connection);

$nik = $_POST['nik'];
$plat_nomor = $connection->conn->real_escape_string($_POST['plat_nomor']);
$nama_pelanggan = $connection->conn->real_escape_string($_POST['nama_pelanggan']);
$jk_pelanggan = $connection->conn->real_escape_string($_POST['jk_pelanggan']);
$alamat_pelanggan = $connection->conn->real_escape_string($_POST['alamat_pelanggan']);
$telp_pelanggan = $connection->conn->real_escape_string($_POST['telp_pelanggan']);
$lama_sewa = $connection->conn->real_escape_string($_POST['lama_sewa']);
$waktu_sewa = $connection->conn->real_escape_string($_POST['waktu_sewa']);
$waktu_kembali = $connection->conn->real_escape_string($_POST['waktu_kembali']);

$plg->editdataplg("UPDATE pelanggan SET nik = '$nik', plat_nomor = '$plat_nomor', nama_pelanggan = '$nama_pelanggan', jk_pelanggan = '$jk_pelanggan', alamat_pelanggan = '$alamat_pelanggan', telp_pelanggan = '$telp_pelanggan', lama_sewa = '$lama_sewa', waktu_sewa = '$waktu_sewa', waktu_kembali = '$waktu_kembali' WHERE nik ='$nik'");
echo "<script>window.location='?page=daftar_pelanggan'; </script>";
?>