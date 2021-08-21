<?php 
// error_reporting(0);
session_start();
if(!isset($_SESSION['login']) )
{
  header("location:login.php");
  exit(); 
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> 
		<?php 
	    if(isset($_GET['p'])){
	      $p = $_GET['p'];
	   
	      switch ($p) {
	        case 'beranda':
	          echo "Beranda";
	          break;
	        case 'anggota':
	          echo "Data Anggota";
	          break;
	        case 'input-anggota':
	          echo "Tambah Data Anggota";
	          break;
	        case 'edit-anggota':
	          echo "Edit Data Anggota";
	          break;
	        case 'buku':
	          echo "Data Buku";
	          break;
	        case 'input-buku':
	          echo "Tambah Data Buku";
	          break;
	        case 'edit-buku':
	          echo "Edit Data Buku";
	          break;
	        case 'peminjaman':
	          echo "Transaksi Peminjaman";
	          break;
	        case 'input-pinjam':
	          echo "Tambah Data Peminjaman";
	          break;
	        case 'pengembalian':
	          echo "Transaksi Pengembalian";
	          break;
            case 'laporan':
	          echo "Laporan Transaksi";
	          break;
	      }
	    } else {
	      echo 'Beranda';
	    }
	  ?>	
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<main role="main" class="">
	<div class="container-fluid p-md-4 bn">
		<div class="row">
			<div class="col-md-2"><img src="images/logo.png" alt="Logo" class="logo"></div>
			<div class="col-md-8 text-center">
				<h3>PERPUSTAKAAN UMUM</h3>
				<p>Distinctio modi maxime voluptate tempore vero vel nobis, a veritatis sint aliquid assumenda nostrum veniam aut voluptatum impedit omnis reprehenderit, deserunt dicta.</p>
				<p>Jalan Lembah Abang No.1</p>
				
			</div>
		</div>
	</div>
	<div class="container-fluid hd">
		<div class="row">
			<div class="col-md-12">
				<p class="user">Hai <?= $_SESSION['sesi'] ?>!</p>
			</div>	
		</div>
		
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 bn">
				<ul class="menu">
					<li class="beranda"><a href="index.php?p=beranda">Beranda</a></li>
					<li class="head-side">Data Master</li>
					<li class="anggota"><a href="index.php?p=anggota">Data Anggota</a></li>
					<li class="buku"><a href="index.php?p=buku">Data Buku</a></li>
					<li class="head-side">Data Transaksi</li>
					<li class="peminjaman"><a href="index.php?p=peminjaman">Transaksi Peminjaman</a></li>
					<li class="pengembalian"><a href="index.php?p=pengembalian">Transaksi Pengembalian</a></li>
					<li class="head-side laporan"><a href="index.php?p=laporan">Laporan Transaksi</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				