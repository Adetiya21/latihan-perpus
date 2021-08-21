<div class="container-fluid konten">
  <div>
    <h3 class="text-center">FORM EDIT DATA ANGGOTA</h3><hr style="border: 1px solid #5c3701;">
  </div>
  <?php
    include 'proses/koneksi.php';
    $id_anggota = $_GET['id_anggota'];
    $queri = mysqli_query($db,"select * from tb_anggota where id_anggota='$id_anggota'");
    while($row = mysqli_fetch_array($queri)){
  ?>
  <form action="proses/edit_anggota.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>ID Anggota</label>
      <input type="text" class="form-control" placeholder="Masukkan ID Anggota" name="id_anggota" maxlength="5" value="<?= $row['id_anggota'] ?>" readonly/>
    </div>
    <div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="<?= $row['nama'] ?>">
    </div>
    <div class="form-group">
      <label>Jenis Kelamin</label>
      <?php if ($row['jeniskelamin']=='Pria') { ?>
        <div class="radio">
          <input type="radio" name="jenkel" value="Pria" checked> Pria
          <br>
          <input type="radio" name="jenkel" value="Wanita"> Wanita
      </div>
      <?php } else { ?>
      <div class="radio">
          <input type="radio" name="jenkel" value="Pria"> Pria
          <br>
          <input type="radio" name="jenkel" value="Wanita" checked> Wanita
      </div>
      <?php } ?>
    </div>
    <div class="form-group">
      <label>Alamat</label>
      <textarea placeholder="Masukkan Alamat" class="form-control" name="alamat"><?= $row['alamat'] ?></textarea>
    </div>
    <div class="form-group">
      <label>Foto</label><br>
      <input type="hidden" name="gambar" value="<?= $row['foto'] ?>">
      <input id="uploadImage" type="file" name="foto" onchange="PreviewImage();" />
      <div class="form-group" id="photo-preview"></div>
      <p style="font-size:0.7em">Max. 2MB</p>
      <?php if ($row['foto']==null) {
        echo "<i>{Tidak ada foto}</i>";
      } else { ?>
      <img id="uploadPreview" style="width:200px;" src="images/anggota/<?= $row['foto'] ?>"/>
      <?php } ?>
    </div>
    <hr>
    <div class="">
      <input type="reset" class="btn btn-secondary" value="Batal" > 
      <input type="submit" name="simpan" class="btn btn-primary" value="Simpan" onclick="return confirm('Simpan data?')" > 
    </div>                 
  </form>
  <?php } ?>
</div>
<br><br><br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- DataTables -->
<script type="text/javascript">
	$(document).ready(function() {
        $('.anggota').addClass('active');
    });

  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>