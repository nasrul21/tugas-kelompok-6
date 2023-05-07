<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
<?php foreach($data as $Penjualan) { ?>
<form class="form-horizontal" method="post" action="?controller=Penjualan&action=update">
	<legend>Form Update Penjualan</legend>
	<input type="hidden" name="IdPenjualan" value=<?php echo $Penjualan['IdPenjualan'] ?> />
	<div class="form-group">
		<label for="JumlahPenjualan" class="col-md-2">Nama Penjualan</label>
		<div class="col-md-10">
<input required type="text" class="form-control" id="JumlahPenjualan" placeholder="Nama Penjualan" name="JumlahPenjualan" value="<?php echo $Penjualan['JumlahPenjualan'] ?>"/>
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="HargaJual" class="col-md-2">HargaJual</label>
		<div class="col-md-10">
<input required type="text" class="form-control" id="HargaJual" placeholder="HargaJual" name="HargaJual" value="<?php echo $Penjualan['HargaJual'] ?>" />
		</div>
	</div>
	<br />
<input type="hidden" class="form-control" id="IdPengguna" placeholder="IdPengguna" name="IdPengguna" value="<?php echo $_SESSION['user']['IdPengguna'] ?>" />
	<br />
	<div class="form-group">
		<div class="col-md-7 col-md-offset-2">
			<input type="submit" class="btn btn-primary" name="update" value="Update">
			<a class="btn btn-danger" href="?controller=Penjualan&action=index" role="button">Batal</a>
		</div>
	</div>
</form>
<?php } ?>
