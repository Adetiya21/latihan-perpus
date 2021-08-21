<div class="container-fluid konten">
  <div>
    <h3 class="text-center">FORM EDIT DATA BUKU</h3><hr style="border: 1px solid #5c3701;">
  </div>
  <?php
    include 'proses/koneksi.php';
    $id_buku = $_GET['id_buku'];
    $queri = mysqli_query($db,"select * from tb_buku where id_buku='$id_buku'");
    while($row = mysqli_fetch_array($queri)){
  ?>
  <form action="proses/edit_buku.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>ID Buku</label>
      <input type="text" class="form-control" placeholder="Masukkan ID Buku" name="id_buku" maxlength="5" value="<?= $row['id_buku'] ?>" readonly/>
    </div>
    <div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul" value="<?= $row['judul'] ?>">
    </div>
    <div class="form-group">
      <label>Penerbit</label>
      <input type="text" class="form-control" placeholder="Masukkan Penerbit" name="penerbit" value="<?= $row['penerbit'] ?>">
    </div>
    <div class="form-group">
      <label>Tahun</label>
      <input type="text" class="form-control" placeholder="Masukkan Tahun" name="tahun" maxlength="4" value="<?= $row['tahun'] ?>" onkeypress='return check_int(event)'>
    </div>
    <div class="form-group">
      <label>Jumlah Buku</label>
      <input type="text" class="form-control" placeholder="Masukkan Jumlah Buku" name="qty" maxlength="4" value="<?= $row['qty'] ?>" onkeypress='return check_int(event)'>
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
      <img id="uploadPreview" style="width:200px;" src="images/buku/<?= $row['foto'] ?>"/>
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
        $('.buku').addClass('active');
    });

  function check_int(evt) {
      var charCode = ( evt.which ) ? evt.which : event.keyCode;
      return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
  }

  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>