<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";
?>
			<form class="form-horizontal" action="?page=bobot_tambah" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Bobot</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Selisih:</label>
							<div class="col-sm-10">
								<input type="text" name="selisih" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Bobot:</label>
							<div class="col-sm-10">
								<input type="text" name="bobot" required class="form-control">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Keterangan:</label>
							<div class="col-sm-10">
								<input type="text" name="keterangan" required class="form-control">
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
	
	$sql="insert into tbl_bobot values 
	('$selisih','$bobot','$keterangan')";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('Bobot berhasil ditambah');
			window.location=(href='index.php?page=bobot')</script>";
	}}
?>

