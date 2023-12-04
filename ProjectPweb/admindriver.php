<?php

$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

session_start();
if (isset($_SESSION["id"])) {
	$id = $_SESSION['id'];

    if (isset($_POST["submit"])) {
        $namadriver = $_POST['namadriver'];
        $nomorlisensi = $_POST['nomorlisensi'];

        mysqli_query($koneksi,"INSERT INTO driver value ('','$namadriver', '$nomorlisensi')");
            echo "<script>
            alert('Data berhasil dikirim');
            window.location = 'adminkendaraan.html';    
            </script>";
    }
}    
?>