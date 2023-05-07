<div class="col-md-6 mx-auto">
<?php
session_start();
if (isset($_SESSION['error'])) { 
?>
<div class="alert alert-danger" role="alert">
	<?php echo $_SESSION['error'] ?>
</div>
<?php 
}
session_destroy();
?>
<form class="form-horizontal" method="post" action="?controller=Login&action=login">
	<legend>Form Login Sistem Informasi Penjualan</legend>
	<div class="form-group">
		<label for="NamaPengguna" class="col-md-12">Nama Pengguna</label>
		<div class="col-md-12">
			<input required type="text" class="form-control" id="NamaPengguna" placeholder="Nama Pengguna" name="NamaPengguna" />
		</div>
	</div>
	<br />
	<div class="form-group">
		<label for="Password" class="col-md-12">Password</label>
		<div class="col-md-12">
			<input required type="password" class="form-control" id="Password" placeholder="Password" name="Password" />
		</div>
	</div>
	<br />
	<div class="form-group">
		<div class="col-md-7 col-md-offset-2">
			<input type="submit" class="btn btn-primary" name="login" value="Login">
		</div>
	</div>
</form>
</div>
