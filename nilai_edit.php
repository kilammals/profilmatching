<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";

$id_sample = $_GET['id_sample'];
$query=mysqli_query($koneksi, "select * from tbl_sample, tbl_faktor, tbl_karyawan where tbl_sample.id_sample='$id_sample' AND tbl_sample.faktor=tbl_faktor.id_faktor AND tbl_sample.karyawan=tbl_karyawan.id_karyawan");
$dataku=mysqli_fetch_array ($query);

?>
			<form class="form-horizontal" action="?page=nilai_edit" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Nilai</h2></div>
					<div class="panel-body">
						
						<input type="hidden" name="id_sample" value="<?php  echo $_GET['id_sample']; ?>" class="form-control" readonly>
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Id Karyawan:</label>
							<div class="col-sm-10">
								<input type="text" name="id_karyawan" value="<?php  echo $dataku['id_karyawan']; ?>" required class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama Karyawan:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_karyawan" value="<?php  echo $dataku['nama_karyawan']; ?>" required class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama faktor:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_faktor" value="<?php  echo $dataku['nama_faktor']; ?>" required class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nilai:</label>
							<div class="col-sm-10">
								<input type="text" name="nilai" value="<?php  echo $dataku['nilai']; ?>" required class="form-control">
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
	$id_sample	    = $_POST['id_sample'];
	$nilai			= $_POST['nilai'];
	

	$sql="UPDATE tbl_sample SET nilai='$nilai' WHERE id_sample='$id_sample'";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('Nilai berhasil diubah');
			window.location=(href='index.php?page=nilai')</script>";
	}}
?>

