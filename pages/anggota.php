<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<br>
<button class="btn btn-danger" onclick="ExportPdf()"><span class="fa fa-print"></span> Export PDF</button>
<a href="cetak-anggota.php" class="btn btn-info"><span class="fa fa-edit"></span> Print</a>
		
<div class="container-fluid konten">
	<div>
		<h3 class="text-center">DATA ANGGOTA</h3><hr style="border: 1px solid #5c3701;">
		<a href="index.php?p=input-anggota" class="btn btn-primary"><span class="fa fa-edit"></span> Tambah Anggota</a><hr>
		<div class="table-responsive" id="myCanvas">
    	<table id="data" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>ID Anggota</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Status</th>
						<th width="50px">Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
            include ('proses/koneksi.php');
            $no = 1;
            $data = mysqli_query($db,"SELECT * FROM tb_anggota");
            while($row = mysqli_fetch_array($data)){
          ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?php if($row['foto']==null){ echo'<i>{Tidak ada foto}</i>';} else{ ?>
							<img src="images/anggota/<?= $row['foto']; ?>" alt="foto" width="80px"><?php } ?></td>
						<td><?= $row['id_anggota']; ?></td>
						<td><?= $row['nama']; ?></td>
						<td><?= $row['jeniskelamin']; ?></td>
						<td><?= $row['alamat']; ?></td>
						<td><?php if ($row['status']=='Tidak Meminjam') { ?>
							<label class="btn btn-secondary" style="width:70%;"><?= $row['status']; ?></label>
						<?php } elseif ($row['status']=='Meminjam') { ?>
							<label class="btn btn-primary" style="width:70%;"><?= $row['status']; ?></label>
						<?php } ?>
						</td>
						<td align="center">
              <a href="cetak-kartu.php?id_anggota=<?= $row['id_anggota']; ?>" class="btn btn-info btn-opsi" title="Cetak"><span class="fa fa-print"></span> Cetak Kartu</a><br>
              <a href="index.php?p=edit-anggota&id_anggota=<?= $row['id_anggota']; ?>" class="btn btn-warning btn-opsi" title="Edit"><span class="fa fa-edit"></span> Edit</a><br>
              <a href="index.php?p=hapus-anggota&id_anggota=<?= $row['id_anggota']; ?>" title="Hapus" class="btn btn-danger btn-opsi" onclick="return confirm('Anda yakin ingin menghapus?')"><span class="fa fa-trash"></span> Hapus</a>
            </td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://kendo.cdn.telerik.com/2017.2.621/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $('.anggota').addClass('active');
    });

    $(function () {
      $('#data').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
      })
    })
</script>
<script type="text/javascript">
   function ExportPdf(){ 
			kendo.drawing
			    .drawDOM("#myCanvas", 
			    { 
			        paperSize: "A4",
			        margin: { left:"1cm", right:"1cm" ,top: "0.5cm", bottom: "0.2cm" },
			        scale: 0.61,
			        height: 800
			    })
			        .then(function(group){
			        kendo.drawing.pdf.saveAs(group, "Laporan Anggota.pdf")
			    });
			};
</script>