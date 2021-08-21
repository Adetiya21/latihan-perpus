<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id_buku yang di kirim dari url
$id_buku = $_GET['id_buku'];


// menghapus data dari database
mysqli_query($db,"DELETE FROM tb_buku WHERE id_buku='$id_buku'");

// mengalihkan halaman kembali ke index.php
header("location:index.php?p=buku");

?>