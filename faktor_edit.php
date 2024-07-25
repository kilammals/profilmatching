<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";

$id_faktor = $_GET['id_faktor'];
$query=mysqli_query($koneksi, "select * from tbl_faktor, tbl_aspek where tbl_faktor.id_faktor='$id_faktor' AND tbl_faktor.aspek=tbl_aspek.id_aspek");
$dataku=mysqli_fetch_array ($query);

?>
			<form class="form-horizontal" action="?page=faktor_edit" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Data Aspek</h2></div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Id Faktor:</label>
							<div class="col-sm-10">
								<input type="text" name="id_faktor" value="<?php  echo $_GET['id_faktor']; ?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Nama Faktor:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_faktor" value="<?php  echo $dataku['nama_faktor']; ?>" required class="form-control">
							</div>
						</div>

						<div class="form-group">
                        <label class="col-sm-2 control-label text-right">Nama Aspek</label>
                            <div class="col-sm-4">
                                <select name='aspek' data-placeholder="Pilih Aspek" class="required select">
                                <option value="<?php echo $dataku['id_aspek'] ?>"><?php echo $dataku["nama_aspek"] ?></option>
                                    <?php
                                    $query = "SELECT * FROM tbl_aspek";
                                    $hasil = mysqli_query($koneksi, $query);
                                    while ($d = mysqli_fetch_array ($hasil)) 
                                    {
                                        echo "<option value='$d[id_aspek]'>".$d['nama_aspek']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Target:</label>
							<div class="col-sm-10">
								<input type="text" name="target" value="<?php  echo $dataku['target']; ?>" required class="form-control">
							</div>
						</div>

						<div class="form-group">
                        <label class="col-sm-2 control-label text-right">Jenis</label>
                            <div class="col-sm-4">
                                <select name='jenis' data-placeholder="Pilih Jenis" class="required select">
                                <?php  
                                	if($dataku["jenis"]==1){
                                		$jenis="Core";
                                	}elseif($dataku["jenis"]==2){
                                		$jenis="Secondary";
                                	}
                                ?>
                                	<option value="<?php echo $dataku['jenis'] ?>"><?php echo $jenis ?></option>
                                    <option value="1">Core</option>
                                    <option value="2">Secondary</option>
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
	$id_faktor	    = $_POST['id_faktor'];
	$nama_faktor	= $_POST['nama_faktor'];
	$aspek 		    = $_POST['aspek'];
	$target 		= $_POST['target'];
	$jenis 		    = $_POST['jenis'];

	$sql="UPDATE tbl_faktor SET nama_faktor='$nama_faktor', aspek='$aspek', target='$target', jenis='$jenis' WHERE id_faktor='$id_faktor'";
	$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	if ($query) {
	echo "<script>window.alert('Faktor berhasil diubah');
			window.location=(href='index.php?page=faktor')</script>";
	}}
?>

