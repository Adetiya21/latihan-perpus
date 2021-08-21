<?php 

include 'koneksi.php';

$id_pinjam = $_POST['id_pinjam'];
$id_anggota = $_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
$tgl_kembali = date("Y-m-d H:i:s");
$status = $_POST['status'];

if (isset($_POST['simpan'])) {
	extract($_POST);
	if ($status=='Sudah Dikembalikan') {
		// mengganti status pada tabel peminjaman
		$sql = "UPDATE tb_pinjaman SET tgl_kembali='$tgl_kembali', status='$status' WHERE id_pinjam='$id_pinjam'";
		$query = mysqli_query($db,$sql);

		// mengganti status pada tabel anggota
		$sqlAnggota = "UPDATE tb_anggota SET status='Tidak Meminjam' WHERE id_anggota='$id_anggota'";
		$queryAnggota = mysqli_query($db,$sqlAnggota);

		// menangkap data buku
		$qty = mysqli_query($db,"select qty from tb_buku where id_buku='$id_buku'");
	    while($row = mysqli_fetch_array($qty)){
			// mengganti jumlah buku pada tabel buku
			$jml = $row['qty']+1;
			$sqlBuku = "UPDATE tb_buku SET qty='$jml' WHERE id_buku='$id_buku'";
			$queryBuku = mysqli_query($db,$sqlBuku);
		}
		
	} else {
		// mengganti status pada tabel peminjaman
		$sql = "UPDATE tb_pinjaman SET status='$status' WHERE id_pinjam='$id_pinjam'";
		$query = mysqli_query($db,$sql);

		// mengganti status pada tabel anggota
		$sqlAnggota = "UPDATE tb_anggota SET status='Meminjam' WHERE id_anggota='$id_anggota'";
		$queryAnggota = mysqli_query($db,$sqlAnggota);

		// menangkap data buku
		$qty = mysqli_query($db,"select qty from tb_buku where id_buku='$id_buku'");
	    while($row = mysqli_fetch_array($qty)){
			// mengganti jumlah buku pada tabel buku
			$jml = $row['qty']-1;
			$sqlBuku = "UPDATE tb_buku SET qty='$jml' WHERE id_buku='$id_buku'";
			$queryBuku = mysqli_query($db,$sqlBuku);
		}
	}
	header("location:../index.php?p=pengembalian");
}
?>