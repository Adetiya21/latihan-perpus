<?php 
error_reporting(0);

session_start();
$_SESSION['sesi'] = NULL;

include('koneksi.php');
if (isset($_POST['submit'])) {
	$user = isset($_POST['username']) ? $_POST['username'] : "" ;
	$pass = isset($_POST['password']) ? $_POST['password'] : "" ;
	$pw = md5($pass);
	$query = "SELECT * FROM tb_admin WHERE username='$user' AND password='$pw'";
	$qry = mysqli_query($db,$query);
	$sesi = mysqli_num_rows($qry);

	if ($sesi == 1) {
		$data_admin = mysqli_fetch_array($qry);
		$_SESSION['id_admin'] = $data_admin['id_admin'];
		$_SESSION['sesi'] = $data_admin['nama'];
		$_SESSION['login'] = 'Sudah_Login';

		echo "<script>alert('Anda Berhasil Login');</script>";
		echo "<meta http-equiv='refresh' content='0; url=../index.php?p=beranda'>";
		
	} else {
		echo "<script>alert('Anda Gagal Login');</script>";
		echo "<script>window.location.replace('../login.php');</script>";
		
	}

} else {
	header('../login.php');
}

?>