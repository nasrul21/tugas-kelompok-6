<?php include "views/templates/sidebar.php" ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
<?php foreach($data as $HakAkses) { ?>
<form class="form-horizontal" method="post" action="?controller=HakAkses&action=update">
	<legend>Form Input Hak Akses</legend>
	<input type="hidden" name="IdAkses" value=<?php echo $HakAkses['IdAkses'] ?> />
	<div class="form-group">
		<label for="NamaAkses" class="col-md-2">Nama Akses</label>
		<div class="col-md-10">
<input required type="text" class="form-control" id="NamaAkses" placeholder="Nama Akses" name="NamaAkses" value="<?php echo $HakAkses['NamaAkses'] ?>"/>
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="Keterangan" class="col-md-2">Keterangan</label>
		<div class="col-md-10">
<input required type="text" class="form-control" id="Keterangan" placeholder="Keterangan" name="Keterangan" value="<?php echo $HakAkses['Keterangan'] ?>" />
		</div>
	</div>
	<br />
	<div class="form-group">
		<div class="col-md-7 col-md-offset-2">
			<input type="submit" class="btn btn-primary" name="update" value="Update">
			<a class="btn btn-danger" href="?controller=HakAkses&action=index" role="button">Batal</a>
		</div>
	</div>
</form>
<?php } ?>
</div>
