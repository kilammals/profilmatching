<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";

$id_karyawan = $_GET['id_karyawan'];
$query=mysqli_query($koneksi, "select * from tbl_karyawan where id_karyawan='$id_karyawan'");
$dataku=mysqli_fetch_array ($query);

?>
			<form class="form-horizontal" action="?page=alternatif_edit" method="post" role="form">
			<input type=hidden name='selisih' value="<?php  echo $_GET['selisih']; ?>">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Alternatif</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Id Alternatif:</label>
							<div class="col-sm-10">
								<input type="text" name="id_alternatif" value="<?php  echo $_GET['id_karyawan']; ?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Alternatif:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_alternatif" value="<?php  echo $dataku['nama_karyawan']; ?>" required class="form-control">
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
	$id_alternatif	    		= $_POST['id_alternatif'];
	$nama_alternatif 		    = strtoupper($_POST['nama_alternatif']);

	$sql="UPDATE tbl_karyawan SET nama_karyawan='$nama_alternatif' WHERE id_karyawan='$id_alternatif'";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('alternatif berhasil diubah');
			window.location=(href='index.php?page=alternatif')</script>";
	}}
?>

