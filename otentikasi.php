<?php
include 'config.php';

session_start();

//tangkap data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


$loginadmin = mysqli_query($koneksi, "select * from tbl_user where username='$username' and password='$password'");
$q=mysqli_fetch_array ($loginadmin);

if (mysqli_num_rows($loginadmin) == 1) {
	//kalau user dan password sudah terdaftar di database
	//buat session dengan username dengan isi nama user yang login
	$_SESSION['username'] = $q['username'];
	$_SESSION['password'] = $q['password'];
	$_SESSION['nama']	  = $q['nama'];

	//redirect ke halaman index
	header('location:index.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	//header('location:index.php?error=4');
	echo "<script>alert('Username atau Password anda salah, silahkan coba lagi!'); window.location = 'index.php'</script>";
}
?>