<?php 

include 'koneksi.php';

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$qty = $_POST['qty'];
$foto_awal = $_POST['gambar'];

if (isset($_POST['simpan'])) {
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];
	if (!empty($nama_file)) {
		// baca lokasi file sementara dan nama file dari form
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_buku.".".$tipe_file;

		// tentukan folder untuk menyimpan file
		$folder = "../images/buku/$file_foto";
		@unlink("$folder");
		// apabila file berhasil di upload
		move_uploaded_file($lokasi_file, "$folder");
	} else {
		$file_foto = $foto_awal;
	}

	$sql = "UPDATE tb_buku SET judul='$judul', penerbit='$penerbit', tahun='$tahun', qty='$qty', foto='$file_foto' WHERE id_buku='$id_buku'";
	$query = mysqli_query($db,$sql);
	header("location:../index.php?p=buku");
}
?>