<?php
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

session_start();

if (isset($_SESSION["id"])) {
	if (isset($_POST["submit"])) {
		$id = $_SESSION['id'];
		$new_password = $_POST['new_password'];
		$new_password2 = $_POST['new_password2'];
		
		
		$cek_user = mysqli_query($koneksi,"SELECT password_user FROM user WHERE id = '$id'");
		$cek_login = mysqli_num_rows($cek_user);

		if ($new_password != $new_password2) {
			echo "<script>
			alert('konfirmasi password tidak sesuai');
			
			</script>";
		}
		else {
			mysqli_query($koneksi,"UPDATE user SET password_user = '$new_password' WHERE id= '$id'");
			echo "<script>
			alert('Data berhasil dikirim');
			window.location = 'loginpage.html';
			</script>";
		}	

	}
}
?>