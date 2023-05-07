<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
	<legend>List Pembelian</legend>
	<a href="?controller=Pembelian&action=formAdd" class="btn btn-success">Tambah</a>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>ID Pembelian</th>
				<th>Jumlah Pembelian</th>
				<th>Harga Beli</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php foreach($data["DaftarPembelian"] as $key => $Pembelian) { ?>
			<tr>
				<td><?php echo $Pembelian['IdPembelian'] ?></td>
				<td><?php echo $Pembelian['JumlahPembelian'] ?></td>
				<td><?php echo $Pembelian['HargaBeli'] ?></td>
				<td>
					<a href="?controller=Pembelian&action=formEdit&id=<?php echo $Pembelian['IdPembelian'] ?>">
						<button type="button" class="btn btn-primary">
							<span><i class="bi bi-pencil"></i></span>
						</button>
					</a>
				</td>
				<td>
					<a href="?controller=Pembelian&action=delete&id=<?php echo $Pembelian['IdPembelian'] ?>">
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
