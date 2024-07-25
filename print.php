<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";
 
error_reporting(0);
session_start();
if ($_SESSION['username'] == null || $_SESSION['password'] == null) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>SIPENA<</title>		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" type="image/png" href="images/Lambang.png"/>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script>
		function confirmDeleteNilai(delUrl) {
		  if (confirm("Menghapus Data nilai ini maka semua data nilai untuk alternatif yang bersangkutan akan terhapus!")) {
		    document.location = delUrl;
		  }
		}
		</script>

		<script>
		function confirmLogout(delUrl) {
		  if (confirm("Anda yakin keluar dari aplikasi?")) {
		    document.location = delUrl;
		  }
		}
		</script>
	</head>
	<body onload="window.print()">

		
            <center>
				<h3>Sistem Informasi Penilaian THL dengan Profile Matching</h3><HR></center>
            <table class="table">
            	<tr>
                	<th>No</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                </tr>
			<?php
			
			$nomor=1;	
			$sql=mysqli_query($koneksi, "SELECT * FROM tbl_hasil ORDER BY nilai DESC");
        	while ($data=mysqli_fetch_array ($sql)) 	
				{

				?>
			<tr>
                	<td><?php echo $nomor++; ?></td>
                    <td><?php echo $data["nama_karyawan"]; ?></td>
                    <td><?php echo number_format($data["nilai"],2,",","."); ?></td>
              </tr>
			<?php	

				}
			?>
			</table>
			<table>
				<tr>
					<td width="70%"></td>
					<td width="30%">
						<p>
							Gresik, <?php echo date("d-m-Y") ?><br>
							<justify>KEPALA DINAS <br><br><br><br></justify>
							(.........................................)
						</p>
					</td>
				</tr>
			</table>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>