<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
  
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 konten">
      <div>
        <h3 class="text-center">Cetak Kartu Anggota</h3><hr style="border: 1px solid #5c3701;">
      </div>
      <?php
        include 'proses/koneksi.php';
        $id_anggota = $_GET['id_anggota'];
        $queri = mysqli_query($db,"select * from tb_anggota where id_anggota='$id_anggota'");
        while($row = mysqli_fetch_array($queri)){
      ?>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <?php if ($row['foto']==null) {
              echo "<i>{Tidak ada foto}</i>";
            } else { ?>
            <img id="uploadPreview" style="width:100%;" src="images/anggota/<?= $row['foto'] ?>"/>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <h6>ID Anggota</h6>
            <?= $row['id_anggota'] ?>
          </div>
          <div class="form-group">
            <h6>Nama</h6>
            <?= $row['nama'] ?>
          </div>
          
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <h6>Jenis Kelamin</h6>
            <?= $row['jeniskelamin']; ?>
          </div>
          <div class="form-group">
            <h6>Alamat</h6>
            <?= $row['alamat'] ?>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<br><br><br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- DataTables -->
<script type="text/javascript">
	window.print();

  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>