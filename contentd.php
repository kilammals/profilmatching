<?php
if ($_GET['aksi']==proses) {
mysqli_query($koneksi, "TRUNCATE hasil");
$jum=$_POST['jum'];
echo "Jum $jum <hr>";
		   for ($i=0; $i<$jum; $i++){
		   
            $id = $_POST['id'][$i];
            $nx= $_POST['nx'][$i];
            $ny = $_POST['ny'][$i];
		   
		   $simpanm="Insert into hasil values 
		   ('$id','$nx','$ny')";
		   $hasil=mysqli_query($koneksi, $simpanm);   
      echo "$id , $nx , $ny <br>";     

            }
      echo "Proses Defuzzifikasi Selesai..!";
}

//============================================================================================================================= proses fuzzifikasi

	function derajat_keanggotaan($nilai, $bawah, $tengah, $atas)
		{
			$selisih=$atas-$bawah;	
			if($nilai<$bawah)
				{
					$DA=0;	
				}
			elseif(($nilai>=$bawah) && ($nilai<=$tengah))
				{
					if($bawah<=0)
						{
							$DA=1;
						}
					else
						{
							$DA=($nilai-$bawah) / ($tengah-$bawah);	
						}
				}
			elseif(($nilai>$tengah) && ($nilai<=$atas))
				{
					$DA=($atas-$nilai) / ($atas-$tengah);	
				}	
			elseif($nilai>$atas)
				{
					$DA=0;	
				}
			return $DA;	
				
		}
	function derajat_keanggotaan1($nilai, $bawah, $tengah, $atas)
		{
			$selisih=$atas-$bawah;	
			if($nilai<$bawah)
				{
					$DA=0;	
				}
			elseif(($nilai>=$bawah) && ($nilai<=$tengah))
				{
					if($bawah<=0)
						{
							$DA=1;
						}
					else
						{
							$DA=($nilai-$bawah) / ($tengah-$bawah);	
						}
				}
			elseif(($nilai>$tengah) && ($nilai<=$atas))
				{
					$DA=($atas-$nilai) / ($atas-$tengah);	
				}	
			elseif($nilai>$atas)
				{
					$DA=0;	
				}
			return $DA;	
				
		}
	$variabel		=1;
	$variabel1		=2;
	
	$sql_variabel	="SELECT * FROM tbl_variabel WHERE id='$variabel'";
	$hasil_variabel	=mysqli_query($koneksi, $sql_variabel);
	$row_variabel	=mysqli_fetch_assoc($hasil_variabel);
	
	$sql_variabel1	="SELECT * FROM tbl_variabel WHERE id='$variabel1'";
	$hasil_variabel1	=mysqli_query($koneksi, $sql_variabel1);
	$row_variabel1	=mysqli_fetch_assoc($hasil_variabel1);
	
	$sql			="SELECT * FROM tbl_himpunan";
	$hasil			=mysqli_query($koneksi, $sql);
	$jumkol			=mysqli_num_rows($hasil);
	
echo "<h2>Defuzzifikasi</h2>"; ?>

<table border="1" cellpadding="3" width="95%">
	<tr bgcolor="#9DC5FF">
    	<td width="2%" rowspan="2"><strong>ID</strong></td>
        <td rowspan="2"><strong>Nama</strong></td>
        <td width="10%" rowspan="2"><strong>Nilai (x)</strong></td>
        <td width="10%" rowspan="2"><strong>Minat Belajar (y)</strong></td>
        <td colspan="3" align="center"><strong>Derajat Keanggotaan (&#956;[x])</strong></td>
        <td colspan="3" align="center"><strong>Derajat Keanggotaan (&#956;[y])</strong></td>
        <td align="center" rowspan="2"><strong>&#956;[x]</strong></td>
        <td align="center" rowspan="2"><strong>&#956;[y]</strong></td>
        <td align="center" rowspan="2"><strong>Z atau Fire Strenght</strong></td>
        <td align="center" rowspan="2"><strong>Keterangan</strong></td>

  </tr>
	<tr bgcolor="#9DC5FF">
	<?php
			$sql	="SELECT * FROM tbl_himpunan WHERE kelompok='$variabel'";
			$hasil	=mysqli_query($koneksi, $sql);
			while($row=mysqli_fetch_assoc($hasil))
				{
		?>	
	  <td><strong><?php echo $row['nama_himpunan'];?></strong></td>
 <?php
				}

			$sql1	="SELECT * FROM tbl_himpunan WHERE kelompok='$variabel1'";
			$hasil1	=mysqli_query($koneksi, $sql1);
			while($row1=mysqli_fetch_assoc($hasil1))
				{
		?>	
	  <td><strong><?php echo $row1['nama_himpunan'];?></strong></td>
 <?php
				}
		?>
  </tr>

    <?php
    		$sql ="SELECT * FROM tbl_data";
			$hasil	=mysqli_query($koneksi, $sql);
			$jum=mysqli_num_rows($hasil);
			while($row=mysqli_fetch_assoc($hasil))
				{
	?>
                    
	<tr>
	  <td><?php echo $row['id']; ?> </td>
	  <td><?php echo $row['nama']; ?></td>
	  <td><?php echo $row['nilai']; ?></td>
      <td><?php echo $row['minat_belajar']; ?></td>
      <?php
	  		$sql2	="SELECT * FROM tbl_himpunan WHERE kelompok='$variabel'";
			$hasil2	=mysqli_query($koneksi, $sql2);
			while($row2=mysqli_fetch_assoc($hasil2))
				{
			
			
		?>	
        <td >
		<?php echo  number_format(derajat_keanggotaan($row[$row_variabel['field_akses']], $row2['bawah'], $row2['tengah'], $row2['atas']),2,",",".");
		?>
		</td>
        <?php
				}

	  		$sql21	="SELECT * FROM tbl_himpunan WHERE kelompok='$variabel1'";
			$hasil21	=mysqli_query($koneksi, $sql21);
			while($row21=mysqli_fetch_assoc($hasil21))
				{
		?>	
        <td >
		<?php 
		echo number_format(derajat_keanggotaan1($row[$row_variabel1['field_akses']], $row21['bawah'], $row21['tengah'], $row21['atas']),2,",",".");
		?>
		</td>
        <?php
		
		}
			$sqld	="SELECT * FROM hasil_fuzzy WHERE idsiswa='$row[id]' and idhimpunan >= '1' and idhimpunan <= '3' ORDER BY f DESC LIMIT 1";
			$hasild	=mysqli_query($koneksi, $sqld);
			while($rowd=mysqli_fetch_array ($hasild))
				{
		$nx=$rowd[f];
		$hx=$rowd[idhimpunan];

		echo "<td>$rowd[f]</td>"; 
		}
			$sqld1		="SELECT * FROM hasil_fuzzy WHERE idsiswa='$row[id]' and idhimpunan >= '4' and idhimpunan <= '6' ORDER BY f DESC LIMIT 1";
			$hasild1	=mysqli_query($koneksi, $sqld1);
			while($rowd1=mysqli_fetch_array ($hasild1))
				{
		$ny=$rowd1[f];
		$hy=$rowd1[idhimpunan];
				
		echo "<td>$rowd1[f]</td>"; 
		}
		$zz=$nx+$ny;
		$zzz=$zz/2;
		$zzz=number_format($zzz,2,",",".");
		echo "<td>$zzz</td>";
		
		if ($hx == '3' && $hy == '6') { $ket='Lulus';}
		if ($hx == '2' && $hy == '6') { $ket='Lulus';}
		if ($hx == '3' && $hy == '4') { $ket='Lulus';}
		if ($hx == '1' && $hy == '6') { $ket='Dipertimbangkan';}
		if ($hx == '2' && $hy == '5' ) { $ket='Dipertimbangkan';}
		if ($hx == '1' && $hy == '4' ) { $ket='Gagal';}
		if ($hx == '2' && $hy == '4' ) { $ket='Gagal';}
				
		echo "<td>$ket</td>";
?>        
        
  </tr>
  <?php
				}

  ?>
</table>

Keterangan : <br />
&#956;[x] = Derajat Keanggotaan &#956;[x] bernilai paling tinggi <br />
&#956;[y] = Derajat Keanggotaan &#956;[y] bernilai paling tinggi <br />
Z atau Fire Strenght = ( &#956;[x] + &#956;[y] ) / 2 <br />
