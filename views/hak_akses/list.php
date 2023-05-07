<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
	<legend>List Hak Akses</legend>
	<a href="?controller=HakAkses&action=formAdd" class="btn btn-success">Tambah</a>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>ID Akses</th>
				<th>Nama Akses</th>
				<th>Keterangan</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php foreach($data["DaftarHakAkses"] as $key => $roles) { ?>
			<tr>
				<td><?php echo $roles['IdAkses'] ?></td>
				<td><?php echo $roles['NamaAkses'] ?></td>
				<td><?php echo $roles['Keterangan'] ?></td>
				<td>
					<a href="?controller=HakAkses&action=formEdit&id=<?php echo $roles['IdAkses'] ?>">
						<button type="button" class="btn btn-primary">
							<span><i class="bi bi-pencil"></i></span>
						</button>
					</a>
				</td>
				<td>
					<a href="?controller=HakAkses&action=delete&id=<?php echo $roles['IdAkses'] ?>">
						<button type="button" class="btn btn-danger">
							<span><i class="bi bi-trash"></i></span>
						</button>
					</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
