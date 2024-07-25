<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";
?>
			<form class="form-horizontal" action="?page=user_tambah" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data User</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Username:</label>
							<div class="col-sm-10">
								<input type="text" name="username" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama:</label>
							<div class="col-sm-10">
								<input type="text" name="nama" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Password:</label>
							<div class="col-sm-10">
								<input type="password" name="password" required class="form-control">
							</div>
						</div>

						
						<div class="form-action text-right">
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
						</div>

					</div>
				</div>
			</form>
<?php
if (isset($_POST['simpan'])) {
	$username	    	= $_POST['username'];
	$nama	    		= $_POST['nama'];
	$password 		    = md5($_POST['password']);


	$sql="insert into tbl_user values 
	('','$username','$password','$nama')";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('User berhasil ditambah');
			window.location=(href='index.php?page=user')</script>";
	}}
?>

