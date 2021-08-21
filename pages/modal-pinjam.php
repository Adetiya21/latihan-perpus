<!-- /.modal edit-->
<div class="modal fade" id="modal-edit-<?= $row['id_pinjam']; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Status Pinjam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="proses/edit_statusPinjam.php" method="POST" role="form">
            <div class="form-group">
              <div class="row">
              	<input type="hidden" name="id_pinjam" value="<?= $row['id_pinjam']; ?>">
                <input type="hidden" name="id_anggota" value="<?= $row['id_anggota']; ?>">
                <input type="hidden" name="id_buku" value="<?= $row['id_buku']; ?>">
                <label class="col-sm-3">Status :</label>
                <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="status">
                      <option value="Sedang Meminjam" <?php if($row['status']=='Sedang Meminjam'){ echo "selected"; } ?>>Sedang Meminjam</option>
                      <option value="Sudah Dikembalikan" <?php if($row['status']=='Sudah Dikembalikan'){ echo "selected"; } ?>>Sudah Dikembalikan</option>
                    </select>
                </div>
              </div>
              <hr>
              <p style="font-size:0.8em">Note : <br>Jika status diganti menjadi <b>"Sudah Dikembalikan"</b> maka status Anggota menjadi <b>"Belum Meminjam"</b>, dan <b>Jumlah Buku</b> akan bertambah 1.<br>Jika status diganti menjadi <b>"Sedang Meminjam"</b> maka status Anggota menjadi <b>"Meminjam"</b>, dan <b>Jumlah Buku</b> akan berkurang 1.</p>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
	  </form>
    </div>
  </div>
</div>