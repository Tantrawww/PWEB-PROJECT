<?php
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

$password1 = $_POST['password1'];
$hashedPassword = password_hash($password1, PASSWORD_DEFAULT);

if (isset($_POST["submit"])) {
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	$cek_user = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
	$cek_login = mysqli_num_rows($cek_user);

	if ($cek_login > 0) {
		echo "<script>
			alert('username telah terdaftar');
			window.location = 'signup.php';
		</script>";
	}
	else {
		if ($password1 != $password2) {
			echo "<script>
			alert('konfirmasi password tidak sesuai');
			window.location = 'signup.php';
		    </script>";
		}
		else {
			mysqli_query($koneksi,"INSERT INTO user VALUE('','$username','$password1','user')");
			echo "<script>
			alert('Data berhasil dikirim');
			window.location = 'loginpage.html';
		    </script>";
		}
	}

}
?>