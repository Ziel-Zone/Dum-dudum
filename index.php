<?php
ob_start();
require_once('config/koneksi.php');
require_once('models/database.php');

$connection = new Database($host, $user, $pass, $database);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HARUMAN RENT CAR</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?page=dashboard">HARUMAN RENT CAR</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="?page=dashboard"><i class="fa fa-caret-square-o-down"></i> Halaman Utama </a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> Menu Rental <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=daftar_mobil">Daftar Mobil</a></li>
                <li><a href="?page=daftar_karyawan">Daftar Karyawan</a></li>
                <li><a href="?page=daftar_pelanggan">Daftar Pelanggan</a></li>
                <li><a href="#">Kwitansi Rental</a></li>
                <li><a href="?page=print">Cetak Kwitansi Rental</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bitcoin"></i> Social Media <span class="badge"></span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="www.facebook.com/sfahmifadillah"><i class="fa fa-facebook"></i>  Facebook</a></li>
                <li><a href="www.twitter.com/sfahmifadillah"><i class="fa fa-twitter"></i>  Twitter</a></li>
                <li><a href="www.instagram.com/fhmifs"><i class="fa fa-instagram"></i>  Instagram</a></li>
                <li><a href="www.google.plus.com/sfahmifadillah"><i class="fa fa-google-plus-square"></i>  Google +</a></li>
                </ul>
            </li>
                <li class="dropdown user-dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i>  Inbox<span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i>  Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
    
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
          
          <?php
          if(@$_GET['page'] == 'dashboard' || @$_GET['page'] == ''){
              include "views/dashboard.php";
          } else if(@$_GET['page'] == 'daftar_mobil') {
              include "views/daftar_mobil.php";
          } else if(@$_GET['page'] == 'daftar_karyawan') {
              include "views/daftar_karyawan.php";
          } else if(@$_GET['page'] == 'daftar_pelanggan') {
			  include "views/daftar_pelanggan.php";
		  } else if(@$_GET['page'] == 'print') {
              include "views/print.php";
          }
          ?> 
          
      </div><!-- /#page-wrapper -->

      </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>

  </body>
</html>