<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db-promatch";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database :  '.mysqli_connect_error();
}
$nomor=0;
?>
