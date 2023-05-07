<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
<form class="form-horizontal" method="post" action="?controller=Barang&action=save">
	<legend>Form Input Barang</legend>
	<div class="form-group">
		<label for="NamaBarang" class="col-md-2">Nama Barang</label>
		<div class="col-md-10">
			<input required type="text" class="form-control" id="NamaBarang" placeholder="Nama Barang" name="NamaBarang" />
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="Keterangan" class="col-md-2">Keterangan</label>
		<div class="col-md-10">
			<input required type="text" class="form-control" id="Keterangan" placeholder="Keterangan" name="Keterangan" />
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="Satuan" class="col-md-2">Satuan</label>
		<div class="col-md-10">
			<input required type="text" class="form-control" id="Satuan" placeholder="Satuan" name="Satuan" />
		</div>
	</div>
	<br />
<input type="hidden" class="form-control" id="IdPengguna" placeholder="IdPengguna" name="IdPengguna" value="<?php echo $_SESSION['user']['IdPengguna'] ?>" />
	<br />
	<div class="form-group">
		<div class="col-md-7 col-md-offset-2">
			<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
			<a class="btn btn-danger" href="?controller=Barang&action=index" role="button">Batal</a>
		</div>
	</div>
</form>
