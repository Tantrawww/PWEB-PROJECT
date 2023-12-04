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
        $mylist = $_POST['mylist'];
        $jenissewa = $_POST['jenissewa'];
        $jeniskendaraan = $_POST['jeniskendaraan'];
        $date = $_POST['date'];

        mysqli_query($koneksi,"INSERT INTO detail value ('','$date','$jeniskendaraan','$jenissewa','$mylist','$id')");
            echo "<script>
            alert('Data berhasil dikirim');
            window.location = 'detailpemesanan.php';
            </script>";
    }
}    
?>