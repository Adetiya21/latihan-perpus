<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<br><button class="btn btn-danger" onclick="ExportPdf()"><span class="fa fa-print"></span> Export PDF</button>
<div class="container-fluid konten">
	<div id="myCanvas">
		<h3 class="text-center">DATA LAPORAN TRANSAKSI</h3><hr style="border: 1px solid #5c3701;">
		
		<div class="table-responsive">
    	<table id="data" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Anggota</th>
						<th>Judul</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Pengembalian</th>
						<th>Tanggal Tempo Kembali</th>
						<th width="50px">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
            include ('proses/koneksi.php');
            $no = 1;
            $data = mysqli_query($db,"SELECT tb_pinjaman.id_pinjam, tb_pinjaman.id_buku, tb_pinjaman.id_anggota, tb_pinjaman.tgl_pinjam, tb_pinjaman.tgl_kembali, tb_pinjaman.tgl_tempoKembali, tb_pinjaman.status, tb_anggota.nama as nama_anggota, tb_buku.judul FROM tb_pinjaman JOIN tb_anggota ON tb_anggota.id_anggota=tb_pinjaman.id_anggota JOIN tb_buku ON tb_buku.id_buku=tb_pinjaman.id_buku ORDER BY tb_pinjaman.tgl_pinjam desc");
            while($row = mysqli_fetch_array($data)){
          ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= '{'.$row['id_anggota'].'}<hr style="margin:5px;">'.$row['nama_anggota']; ?></td>
						<td><?= '{'.$row['id_buku'].'}<hr style="margin:5px;">'.$row['judul']; ?></td>
						<td><?= date('d F Y', strtotime($row['tgl_pinjam'])); ?></td>
						<td><?php if ($row['tgl_kembali']==null) {
								echo '<i>{Belum Mengembalikan}</i>';
							} else {
								echo date('d F Y', strtotime($row['tgl_kembali'])); } ?></td>
						<td><?= date('d F Y', strtotime($row['tgl_tempoKembali'])); ?></td>
						<td><?php if ($row['status']=='Sedang Meminjam') { ?>
							<label class="btn btn-secondary" style="width:70%;"><?= $row['status']; ?></label>
						<?php } elseif ($row['status']=='Sudah Dikembalikan') { ?>
							<label class="btn btn-success" style="width:70%;"><?= $row['status']; ?></label>
						<?php } ?>
						</td>
					</tr>
					<?php include('modal-pinjam.php'); } ?>
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
        $('.laporan').addClass('active');
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
			        kendo.drawing.pdf.saveAs(group, "Laporan Transaksi.pdf")
			    });
			};
</script>