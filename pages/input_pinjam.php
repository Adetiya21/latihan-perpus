<div class="container-fluid konten">
  <div>
    <h3 class="text-center">FORM TAMBAH DATA PEMINJAMAN</h3><hr style="border: 1px solid #5c3701;">
  </div>
  <form action="proses/tambah_pinjam.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Nama Anggota</label>
      <select name="id_anggota" class="form-control">
        <option>--- Pilih Anggota ---</option>
        <?php include ('proses/koneksi.php');
            $data = mysqli_query($db,"SELECT * FROM tb_anggota WHERE status='Tidak Meminjam'");
            while($row = mysqli_fetch_array($data)){ ?>
        <option value="<?= $row['id_anggota']; ?>"><?= $row['nama']; ?></option>
        <?php } ?>
      </select>
      <p style="font-size:0.7em;margin-top:5px;">Note:<br>Jika anggota telah meminjam maka tidak akan muncul dipilihan.</p>
    </div>
    <div class="form-group">
      <label>Judul Buku</label>
      <select name="id_buku" class="form-control">
        <option>--- Pilih Judul Buku ---</option>
        <?php include ('proses/koneksi.php');
            $data = mysqli_query($db,"SELECT * FROM tb_buku WHERE qty>'0'");
            while($row = mysqli_fetch_array($data)){ ?>
        <option value="<?= $row['id_buku']; ?>"><?= $row['judul']; ?></option>
        <?php } ?>
      </select>
      <p style="font-size:0.7em;margin-top:5px;">Note:<br>Buku yang dapat dipilih adalah buku yang jumlahnya masih tersedia.</p>
    </div>
    <div class="form-group">
      <label>Tanggal Pinjam</label>
      <input type="date" class="form-control" name="tgl_pinjam" required>
    </div>
    <div class="form-group">
      <label>Tanggal Tempo Kembali</label>
      <input type="date" class="form-control" name="tgl_tempoKembali" required>
    </div>
    <hr>
    <div class="">
      <input type="reset" class="btn btn-secondary" value="Batal" > 
      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan" onclick="return confirm('Simpan data?')"> 
    </div>                 
  </form>
</div>
<br><br><br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- DataTables -->
<script type="text/javascript">
	$(document).ready(function() {
        $('.peminjaman').addClass('active');
    });
</script>