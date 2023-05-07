<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
	<legend>List Penjualan</legend>
	<a href="?controller=Penjualan&action=formAdd" class="btn btn-success">Tambah</a>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>ID Penjualan</th>
				<th>Jumlah Penjualan</th>
				<th>Harga Jual</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php foreach($data["DaftarPenjualan"] as $key => $Penjualan) { ?>
			<tr>
				<td><?php echo $Penjualan['IdPenjualan'] ?></td>
				<td><?php echo $Penjualan['JumlahPenjualan'] ?></td>
				<td><?php echo $Penjualan['HargaJual'] ?></td>
				<td>
					<a href="?controller=Penjualan&action=formEdit&id=<?php echo $Penjualan['IdPenjualan'] ?>">
						<button type="button" class="btn btn-primary">
							<span><i class="bi bi-pencil"></i></span>
						</button>
					</a>
				</td>
				<td>
					<a href="?controller=Penjualan&action=delete&id=<?php echo $Penjualan['IdPenjualan'] ?>">
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
