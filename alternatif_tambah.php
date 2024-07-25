<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";
?>
			<form class="form-horizontal" action="?page=alternatif_tambah" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Alternatif</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Id Alternatif:</label>
							<div class="col-sm-10">
								<input type="text" name="id_alternatif" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama Alternatif:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_alternatif" required class="form-control">
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
	$id_alternatif	     = $_POST['id_alternatif'];
	$nama_alternatif 	 = strtoupper($_POST['nama_alternatif']);
	
	$sql="insert into tbl_karyawan values 
	('$id_alternatif','$nama_alternatif')";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('Alternatif berhasil ditambah');
			window.location=(href='index.php?page=alternatif')</script>";
	}}
?>

