<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";
?>
			<form class="form-horizontal" action="aspek_tambah.php" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Aspek</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Id Aspek:</label>
							<div class="col-sm-10">
								<input type="text" name="id_aspek" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama Aspek:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_aspek" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Bobot:</label>
							<div class="col-sm-10">
								<input type="text" name="bobot" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Bobot Core:</label>
							<div class="col-sm-10">
								<input type="text" name="bobot_core" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Bobot Secondary:</label>
							<div class="col-sm-10">
								<input type="text" name="bobot_secondary" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Naama Singkat:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_singkat" required class="form-control">
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
	$id_aspek	    		= $_POST['id_aspek'];
	$nama_aspek	    		= $_POST['nama_aspek'];
	$bobot 		    		= $_POST['bobot'];
	$bobot_core 		    = $_POST['bobot_core'];
	$bobot_secondary 		= $_POST['bobot_secondary'];
	$nama_singkat 		    = $_POST['nama_singkat'];

	$sql="insert into tbl_aspek values 
	('$id_aspek','$nama_aspek','$bobot','$bobot_core','$bobot_secondary','$nama_singkat')";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('aspek berhasil ditambah');
			window.location=(href='index.php?page=aspek')</script>";
	}}
?>

