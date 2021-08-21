<?php 

include 'koneksi.php';

$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$foto_awal = $_POST['gambar'];

if (isset($_POST['simpan'])) {
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];
	if (!empty($nama_file)) {
		// baca lokasi file sementara dan nama file dari form
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_anggota.".".$tipe_file;

		// tentukan folder untuk menyimpan file
		$folder = "../images/anggota/$file_foto";
		@unlink("$folder");
		// apabila file berhasil di upload
		move_uploaded_file($lokasi_file, "$folder");
	} else {
		$file_foto = $foto_awal;
	}

	$sql = "UPDATE tb_anggota SET nama='$nama', jeniskelamin='$jenkel', alamat='$alamat', foto='$file_foto' WHERE id_anggota='$id_anggota'";
	$query = mysqli_query($db,$sql);
	header("location:../index.php?p=anggota");
}
?>