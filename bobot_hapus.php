<?php
include 'config.php';

$selisih = $_GET['selisih'];
$query = mysqli_query($koneksi, "delete from tbl_bobot where selisih='$selisih'") or die(mysqli_error($koneksi));
if ($query) {
echo "<script>window.alert('bobot berhasil dihapus');
			window.location=(href='index.php?page=bobot')</script>";
}
?>