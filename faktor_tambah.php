<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";
?>
			<form class="form-horizontal" action="?page=faktor_tambah" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data faktor</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Id Faktor:</label>
							<div class="col-sm-10">
								<input type="text" name="id_faktor" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama Faktor:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_faktor" required class="form-control">
							</div>
						</div>

						<div class="form-group">
                        <label class="col-sm-2 control-label text-right">Aspek:</label>
                        <div class="col-sm-3">
                            <select name='aspek' class='required select'>
                            <option value=''>Pilih Aspek</option>
                            <?php 
                            $tampil=mysqli_query($koneksi, "SELECT * FROM tbl_aspek ORDER BY id_aspek asc");
                            while($r=mysqli_fetch_array ($tampil)){
                            echo "<option value=$r[id_aspek]>$r[nama_aspek]</option>";
                            }
                            ?>
                            </select>
                        </div>
                    	</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Target:</label>
							<div class="col-sm-10">
								<input type="text" name="target" required class="form-control">
							</div>
						</div>

						<div class="form-group">
                        <label class="col-sm-2 control-label text-right">Jenis:</label>
                        <div class="col-sm-3">
                            <select name='jenis' class='required select'>
                            <option value=''>Pilih Jenis</option>
                            <option value='1'>Core</option>
                            <option value='2'>Secondary</option>
                            </select>
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
	$id_faktor	    		= $_POST['id_faktor'];
	$nama_faktor	    	= $_POST['nama_faktor'];
	$aspek 		    		= $_POST['aspek'];
	$target 		        = $_POST['target'];
	$jenis 		            = $_POST['jenis'];

	$sql="insert into tbl_faktor values 
	('$id_faktor','$aspek','$nama_faktor','$target','$jenis')";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('faktor berhasil ditambah');
			window.location=(href='index.php?page=faktor')</script>";
	}}
?>

