<?php
if (isset($_POST['simpan'])) {

    $jml_faktor=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_faktor"));
    echo $jml_faktor;
    for ($i=0; $i <$jml_faktor ; $i++) { 

        $faktor=$_POST["faktor"];
        $nilai=$_POST["nilai"];
        $id_karyawan        = $_POST['id_karyawan'];
        
        $sql = "insert into tbl_sample values
        ('','$id_karyawan', '$faktor[$i]', '$nilai[$i]')";
        $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    }
    
    if ($query) {        
    echo "<script>window.alert('Nilai berhasil di tambah');
            window.location=(href='index.php?page=nilai')</script>";
    }
}else{
    ?>
            <form class="form-horizontal" action="?page=nilai_tambah" method="post" role="form">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Nilai Alternatif</h2></div>
                    <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label text-right">Alternatif:</label>
                        <div class="col-sm-3">
                            <select name='id_karyawan' class='required select'>
                            <option value=''>Pilih Alternatif</option>
                            <?php 
                            $tampil=mysqli_query($koneksi, "SELECT * FROM tbl_karyawan ORDER BY id_karyawan asc");
                            while($r=mysqli_fetch_array ($tampil)){
                            echo "<option value=$r[id_karyawan]>$r[id_karyawan] $r[nama_karyawan]</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    
                    <?php  
                        $q=mysqli_query($koneksi, "SELECT * FROM tbl_faktor ORDER BY id_faktor");
                        while($r=mysqli_fetch_array ($q))
                        {
                            $no=1;
                            $faktor="faktor".$no;
                            $nilai="nilai".$no;
                            ?>
                            <div class="form-group">
                            <input type="hidden" name="faktor[]" value="<?php echo $r[id_faktor] ?>">
                            <label class="col-sm-2 control-label text-right"><?php echo $r["nama_faktor"]; ?></label>
                            <div class="col-sm-4">
                            <div class="col-sm-10">
                                <input type="text" name="nilai[]" required class="form-control" placeholder="nilai">
                            </div>
                            </div>
                        </div>
                        <?php 
                        $no++;
                        }

                    ?>

                    <div class="form-action text-right">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
                    </div>

                </div>
            </div>
        </form>
        
<?php  } ?>
    