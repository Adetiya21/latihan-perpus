<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<br>
<button class="btn btn-danger" onclick="ExportPdf()"><span class="fa fa-print"></span> Export PDF</button>

<div class="container-fluid konten">
	<div>
		<h3 class="text-center">DATA BUKU</h3><hr style="border: 1px solid #5c3701;">
		<a href="index.php?p=input-buku" class="btn btn-primary"><span class="fa fa-edit"></span> Tambah Buku</a><hr>
		<div class="table-responsive" id="myCanvas">
    	<table id="data" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>ID Buku</th>
						<th>Nama Buku</th>
						<th>Penerbit</th>
						<th>Tahun</th>
						<th>Tersedia</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
            include ('proses/koneksi.php');
            $no = 1;
            $data = mysqli_query($db,"SELECT * FROM tb_buku");
            while($row = mysqli_fetch_array($data)){
          ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?php if($row['foto']==null){ echo'<i>{Tidak ada foto}</i>';} else{ ?>
							<img src="images/buku/<?= $row['foto']; ?>" alt="foto" width="100px"><?php } ?></td>
						<td><?= $row['id_buku']; ?></td>
						<td><?= $row['judul']; ?></td>
						<td><?= $row['penerbit']; ?></td>
						<td><?= $row['tahun']; ?></td>
						<td><?php if($row['qty']>0){ echo $row['qty'].' Buku';} else { echo 'Buku Tidak Tersedia'; } ?></td>
						<td align="center">
              <a href="index.php?p=edit-buku&id_buku=<?= $row['id_buku']; ?>" class="btn btn-warning btn-opsi" title="Edit"><span class="fa fa-edit"></span> Edit</a><br>
              <a href="index.php?p=hapus-buku&id_buku=<?= $row['id_buku']; ?>" title="Hapus" class="btn btn-danger btn-opsi" onclick="return confirm('Anda yakin data akan dihapus?')"><span class="fa fa-trash"></span> Hapus</a>
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
        $('.buku').addClass('active');
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
			        kendo.drawing.pdf.saveAs(group, "Laporan Buku.pdf")
			    });
			};
</script>