<div class="container-fluid konten">
  <div>
    <h3 class="text-center">FORM TAMBAH DATA BUKU</h3><hr style="border: 1px solid #5c3701;">
  </div>
  <form action="proses/tambah_buku.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>ID Buku</label>
      <input type="text" class="form-control" placeholder="Masukkan ID Buku" name="id_buku" maxlength="5" required />
    </div>
    <div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul" required>
    </div>
    <div class="form-group">
      <label>Penerbit</label>
      <input type="text" class="form-control" placeholder="Masukkan Penerbit" name="penerbit" required>
    </div>
    <div class="form-group">
      <label>Tahun</label>
      <input type="text" class="form-control" placeholder="Masukkan Tahun" name="tahun" maxlength="4"  onkeypress='return check_int(event)' required>
    </div>
    <div class="form-group">
      <label>Jumlah Buku</label>
      <input type="text" class="form-control" placeholder="Masukkan Jumlah Buku" name="qty" maxlength="4"  onkeypress='return check_int(event)' required>
    </div>
    <div class="form-group">
      <label>Foto</label><br>
      <input id="uploadImage" type="file" name="foto" onchange="PreviewImage();" />
      <div class="form-group" id="photo-preview"></div>
      <p style="font-size:0.7em">Max. 2MB</p>
      <img id="uploadPreview" style="width:300px; " />
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