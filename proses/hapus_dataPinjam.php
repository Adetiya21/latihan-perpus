<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id_pinjam yang di kirim dari url
$id_pinjam = $_GET['id_pinjam'];

// mengganti status anggota menjadi tidak meminjam	
$data = mysqli_query($db,"SELECT tb_pinjaman.id_pinjam, tb_pinjaman.id_anggota, tb_pinjaman.id_buku FROM tb_pinjaman JOIN tb_anggota ON tb_anggota.id_anggota=tb_pinjaman.id_anggota WHERE tb_pinjaman.id_pinjam='$id_pinjam'");

while($row = mysqli_fetch_array($data)){
	$anggota = $row['id_anggota'];
	$sqlAnggota = "UPDATE tb_anggota SET status='Tidak Meminjam' WHERE id_anggota='$anggota'";
	$queryAnggota = mysqli_query($db,$sqlAnggota);

	// menangkap data buku
	$id_buku = $row['id_buku'];
	$qty = mysqli_query($db,"select qty from tb_buku where id_buku='$id_buku'");
	while($row = mysqli_fetch_array($qty)){
		// mengganti jumlah buku pada tabel buku
		$jml = $row['qty']+1;
		$sqlBuku = "UPDATE tb_buku SET qty='$jml' WHERE id_buku='$id_buku'";
		$queryBuku = mysqli_query($db,$sqlBuku);
	}
}

// menghapus data dari database
mysqli_query($db,"DELETE FROM tb_pinjaman WHERE id_pinjam='$id_pinjam'");

// mengalihkan halaman kembali ke halaman sebelumnya
header('location:'.$_SERVER['HTTP_REFERER']);
exit;

?>