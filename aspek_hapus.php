<?php
include 'config.php';

$id_aspek = $_GET['id_aspek'];
$query = mysqli_query($koneksi, "delete from tbl_aspek where id_aspek='$id_aspek'") or die(mysqli_error($koneksi));
if ($query) {
echo "<script>window.alert('aspek berhasil dihapus');
			window.location=(href='index.php?page=aspek')</script>";
}
?>