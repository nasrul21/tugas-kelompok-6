<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
	<legend>List Barang</legend>
	<a href="?controller=Barang&action=formAdd" class="btn btn-success">Tambah</a>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Keterangan</th>
				<th>Satuan</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php foreach($data["DaftarBarang"] as $key => $barang) { ?>
			<tr>
				<td><?php echo $barang['IdBarang'] ?></td>
				<td><?php echo $barang['NamaBarang'] ?></td>
				<td><?php echo $barang['Keterangan'] ?></td>
				<td><?php echo $barang['Satuan'] ?></td>
				<td>
					<a href="?controller=Barang&action=formEdit&id=<?php echo $barang['IdBarang'] ?>">
						<button type="button" class="btn btn-primary">
							<span><i class="bi bi-pencil"></i></span>
						</button>
					</a>
				</td>
				<td>
					<a href="?controller=Barang&action=delete&id=<?php echo $barang['IdBarang'] ?>">
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
