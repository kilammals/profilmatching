<?php  
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "config.php";
 
//error_reporting(0);
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
		<title>PENA HARIS</title>		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" type="image/png" href="images/Lambang.png"/>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script>
		function confirmDeleteNilai(delUrl) {
		  if (confirm("Menghapus Data nilai ini maka semua data nilai untunk alteratif yang bersangkutan akan terhapus!")) {
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
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong>SPK PENILAIAN TUNJANGAN THL DENGAN METODE PROFILE MATCHING</strong></a>

								</header>

							<!-- Section -->
								<?php 
								$page=$_GET["page"];
									switch ($page) {
										case 'proses':
											include "mp.php";
											break;
										case 'aspek':
											include "aspek.php";
											break;
										case 'aspek_tambah':
											include "aspek_tambah.php";
											break;
										case 'aspek_edit':
											include "aspek_edit.php";
											break;
										case 'faktor':
											include "faktor.php";
											break;
										case 'faktor_tambah':
											include "faktor_tambah.php";
											break;
										case 'faktor_edit':
											include "faktor_edit.php";
											break;
										case 'bobot':
											include "bobot.php";
											break;
										case 'bobot_tambah':
											include "bobot_tambah.php";
											break;
										case 'bobot_edit':
											include "bobot_edit.php";
											break;
										case 'alternatif':
											include "alternatif.php";
											break;
										case 'alternatif_tambah':
											include "alternatif_tambah.php";
											break;
										case 'alternatif_edit':
											include "alternatif_edit.php";
											break;
										case 'nilai':
											include "nilai.php";
											break;
										case 'nilai_tambah':
											include "nilai_tambah.php";
											break;
										case 'nilai_edit':
											include "nilai_edit.php";
											break;
										case 'user':
											include "user.php";
											break;
										case 'user_tambah':
											include "user_tambah.php";
											break;
										case 'user_edit':
											include "user_edit.php";
											break;
										default:
											include "home.php";
											break;
									}

								 ?>
						</div>
					</div>

				<!-- Sidebar -->
					<?php  
						include "sidebar.php";
					?>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>