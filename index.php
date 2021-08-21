<?php 
  include "pages/temp_header.php";

  if(isset($_GET['p'])){
    $p = $_GET['p'];
    
    switch ($p) {
      case 'beranda':
          include "pages/beranda.php";
        break;
      case 'anggota':
          include "pages/anggota.php";
      break;
      case 'input-anggota':
          include "pages/input_anggota.php";
      break;
      case 'edit-anggota':
          include "pages/edit_anggota.php";
      break;
      case 'hapus-anggota':
          include "proses/hapus_anggota.php";
      break;
      case 'buku':
          include "pages/buku.php";
      break;
      case 'input-buku':
          include "pages/input_buku.php";
      break;
      case 'edit-buku':
          include "pages/edit_buku.php";
      break;
      case 'hapus-buku':
          include "proses/hapus_buku.php";
      break;
      case 'peminjaman':
          include "pages/peminjaman.php";
      break;
      case 'input-pinjam':
          include "pages/input_pinjam.php";
      break;
      case 'pengembalian':
          include "pages/pengembalian.php";
      break;
      case 'laporan':
          include "pages/laporan.php";
      break;
      default:
        include "404.php";
        break;
    }
    
  } else {
    include "pages/beranda.php";
  }

  include  "pages/temp_footer.php";
?>
