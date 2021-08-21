<?php 

include 'koneksi.php';

$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_tempoKembali = $_POST['tgl_tempoKembali'];
$status = "Sedang Meminjam";

if (isset($_POST['simpan'])) {
	extract($_POST);
	
	// menambah data ke table peminjaman
	$sql = "INSERT INTO tb_pinjaman VALUES('','$id_buku','$id_anggota','$tgl_pinjam',null,'$tgl_tempoKembali','$status')";
	$query = mysqli_query($db,$sql);
	
	// mengedit status data table anggota
	$sqlAnggota = "UPDATE tb_anggota SET status='Meminjam' WHERE id_anggota='$id_anggota'";
	$queryAnggota = mysqli_query($db,$sqlAnggota);
	
	header("location:../index.php?p=peminjaman");
}
?>