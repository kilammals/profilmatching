<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";

$id_user = $_GET['id_user'];
$query=mysqli_query($koneksi, "select * from tbl_user where id_user='$id_user'");
$dataku=mysqli_fetch_array ($query);

?>
			<form class="form-horizontal" action="?page=user_edit" method="post" role="form">
			<input type=hidden name='id_user' value="<?php  echo $_GET['id_user']; ?>">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Aspek</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Username:</label>
							<div class="col-sm-10">
								<input type="text" name="username" value="<?php  echo $dataku['username']; ?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama:</label>
							<div class="col-sm-10">
								<input type="text" name="nama" value="<?php  echo $dataku['nama']; ?>" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Password:</label>
							<div class="col-sm-10">
								<input type="password" name="password" value="" required class="form-control">
							</div>
						</div>
						<br>
						<div class="form-action text-right">
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
						</div>

					</div>
				</div>
			</form>
<?php
if (isset($_POST['simpan'])) {
	$id_user	    	= $_POST['id_user'];
	$nama	    		= $_POST['nama'];
	$username 		    = $_POST['username'];
	$password 		    = md5($_POST['password']);
	
	$sql="UPDATE tbl_user SET nama='$nama', username='$username', password='$password' WHERE id_user='$id_user'";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('user berhasil diubah');
			window.location=(href='index.php?page=user')</script>";
	}}
?>

