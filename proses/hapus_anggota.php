<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id_anggota yang di kirim dari url
$id_anggota = $_GET['id_anggota'];


// menghapus data dari database
mysqli_query($db,"DELETE FROM tb_anggota WHERE id_anggota='$id_anggota'");

// mengalihkan halaman kembali ke index.php
header("location:index.php?p=anggota");

?>