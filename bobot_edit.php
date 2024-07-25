<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";

$selisih = $_GET['selisih'];
$query=mysqli_query($koneksi, "select * from tbl_bobot where selisih='$selisih'");
$dataku=mysqli_fetch_array ($query);

?>
			<form class="form-horizontal" action="?page=bobot_edit" method="post" role="form">
			<input type=hidden name='selisih' value="<?php  echo $_GET['selisih']; ?>">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Bobot</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Selisih:</label>
							<div class="col-sm-10">
								<input type="text" name="selisih" value="<?php  echo $_GET['selisih']; ?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Bobot:</label>
							<div class="col-sm-10">
								<input type="text" name="bobot" value="<?php  echo $dataku['bobot']; ?>" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Keterangan:</label>
							<div class="col-sm-10">
								<input type="text" name="keterangan" value="<?php  echo $dataku['keterangan']; ?>" required class="form-control">
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
	$selisih	    		= $_POST['selisih'];
	$bobot 		    		= $_POST['bobot'];
	$keterangan 		    = $_POST['keterangan'];


	$sql="UPDATE tbl_bobot SET bobot='$bobot', keterangan='$keterangan' WHERE selisih='$selisih'";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('bobot berhasil diubah');
			window.location=(href='index.php?page=bobot')</script>";
	}}
?>

