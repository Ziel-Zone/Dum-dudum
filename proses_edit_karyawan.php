<?php
require_once('../config/koneksi.php');
require_once('../models/database.php');
include "../models/m_karyawan.php";
$connection = new database($host, $user, $pass, $database);
$kry = new karyawan($connection);

$id_cs = ($_POST['id_cs']);
$nama_cs = $connection->conn->real_escape_string($_POST['nama_cs']);
$jk_cs = $connection->conn->real_escape_string($_POST['jk_cs']);
$alamat_cs = $connection->conn->real_escape_string($_POST['alamat_cs']);
$no_ktp = $connection->conn->real_escape_string($_POST['no_ktp']);

$kry->editdatakry("UPDATE karyawan SET id_cs = '$id_cs', nama_cs = '$nama_cs', jk_cs = '$jk_cs', alamat_cs = '$alamat_cs', no_ktp = '$no_ktp' WHERE id_cs='$id_cs'");
echo "<script>window.location='?page=daftar_karyawan'; </script>";
?>