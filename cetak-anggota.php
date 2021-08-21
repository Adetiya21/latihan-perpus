<!-- DataTables -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<div class="container-fluid konten">
	<div>
		<h3 class="text-center">Cetak Anggota</h3><hr style="border: 1px solid #5c3701;">
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
						<td  width="100px"><?php if($row['foto']==null){ echo'<i>{Tidak ada foto}</i>';} else{ ?>
							<img src="images/anggota/<?= $row['foto']; ?>" alt="foto" style="width: 100%"><?php } ?></td>
						<td><?= $row['id_anggota']; ?></td>
						<td><?= $row['nama']; ?></td>
						<td><?= $row['jeniskelamin']; ?></td>
						<td><?= $row['alamat']; ?></td>
						<td  width="100px"><?php if ($row['status']=='Tidak Meminjam') { ?>
							<label class="btn btn-secondary" style="width:100%;"><?= $row['status']; ?></label>
						<?php } elseif ($row['status']=='Meminjam') { ?>
							<label class="btn btn-primary" style="width:100%;"><?= $row['status']; ?></label>
						<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	window.print();
</script>
<script type="text/javascript">
    $(function () {
      $('#data').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false,
      })
    });
</script>