<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
<form class="form-horizontal" method="post" action="?controller=Penjualan&action=save">
	<legend>Form Input Penjualan</legend>
	<div class="form-group">
		<label for="JumlahPenjualan" class="col-md-2">JumlahPenjualan</label>
		<div class="col-md-10">
			<input required type="text" class="form-control" id="JumlahPenjualan" placeholder="JumlahPenjualan" name="JumlahPenjualan" />
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="HargaJual" class="col-md-2">HargaJual</label>
		<div class="col-md-10">
			<input required type="text" class="form-control" id="HargaJual" placeholder="HargaJual" name="HargaJual" />
		</div>
	</div>
	<br />
<input type="hidden" class="form-control" id="IdPengguna" placeholder="IdPengguna" name="IdPengguna" value="<?php echo $_SESSION['user']['IdPengguna'] ?>" />
	<br />
	<div class="form-group">
		<div class="col-md-7 col-md-offset-2">
			<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
			<a class="btn btn-danger" href="?controller=Penjualan&action=index" role="button">Batal</a>
		</div>
	</div>
</form>
