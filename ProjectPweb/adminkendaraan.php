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
        $nomorpolisi = $_POST['nomorpolisi'];
        $jeniskendaraan = $_POST['jeniskendaraan'];
        $kapasitas = $_POST['kapasitas'];
        $ketersediaan = $_POST['ketersediaan'];

        mysqli_query($koneksi,"INSERT INTO kendaraan value ('','$nomorpolisi', '$kapasitas', '$jeniskendaraan', '$ketersediaan')");
            echo "<script>
            alert('Data berhasil dikirim');
            window.location = 'adminceklist.php';    
            </script>";
    }
}    
?>