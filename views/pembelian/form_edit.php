<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
<?php foreach($data as $Pembelian) { ?>
<form class="form-horizontal" method="post" action="?controller=Pembelian&action=update">
	<legend>Form Update Pembelian</legend>
	<input type="hidden" name="IdPembelian" value=<?php echo $Pembelian['IdPembelian'] ?> />
	<div class="form-group">
		<label for="JumlahPembelian" class="col-md-2">JumlahPembelian</label>
		<div class="col-md-10">
<input required type="text" class="form-control" id="JumlahPembelian" placeholder="JumlahPembelian" name="JumlahPembelian" value="<?php echo $Pembelian['JumlahPembelian'] ?>" />
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="HargaBeli" class="col-md-2">HargaBeli</label>
		<div class="col-md-10">
<input required type="text" class="form-control" id="HargaBeli" placeholder="HargaBeli" name="HargaBeli" value="<?php echo $Pembelian['HargaBeli'] ?>" />
		</div>
	</div>
	<br />
<input type="hidden" class="form-control" id="IdPengguna" placeholder="IdPengguna" name="IdPengguna" value="<?php echo $_SESSION['user']['IdPengguna'] ?>" />
	<br />
	<div class="form-group">
		<div class="col-md-7 col-md-offset-2">
			<input type="submit" class="btn btn-primary" name="update" value="Update">
			<a class="btn btn-danger" href="?controller=Pembelian&action=index" role="button">Batal</a>
		</div>
	</div>
</form>
<?php } ?>
