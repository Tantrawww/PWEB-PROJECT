<?php
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

// Mulai sesi
session_start();

// Ambil ID pengguna dari sesi
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Persiapkan statement SQL untuk menghapus akun
    $sql = "DELETE FROM user WHERE id = ?";

    // Persiapkan prepared statement
    $stmt = $koneksi->prepare($sql);

    // Bind parameter ke prepared statement
    $stmt->bind_param("i", $id);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo 
        "<script>
        alert('Akun berhasil dihapus.');
        </script>";

        // Hancurkan sesi setelah penghapusan akun
        $_SESSION = array();
        session_destroy();
        header("Location: loginpage.html");

        exit();
    } else {
        echo "Gagal menghapus akun: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "ID pengguna tidak valid.";
}
?>