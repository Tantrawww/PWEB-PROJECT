<?php
session_start();
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

$username = $_POST['username'];
$password1 = $_POST['password1'];

$query_sql = "SELECT * from user where username = '$username' AND password_user = '$password1'";

$result = mysqli_query($koneksi, $query_sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Jika autentikasi berhasil, ambil ID pengguna dari hasil query
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $role = $row['role'];

        // Simpan ID pengguna dalam sesi
        $_SESSION['id'] = $id;

        if ($role == 'user') {
            // Redirect user to user page
            header("Location: coba2.html");
            exit();
        } elseif ($role == 'admin') {
            // Redirect admin to admin page
            header("Location: admindriver.html");
            exit();
        } else {
            echo "Invalid role.";
        }
    } else {
        echo "<center><h1>Email atau Password salah.</h1></center>";
    }
} else {
    // Penanganan kesalahan kueri
    echo "Error: " . mysqli_error($koneksi);
}
?>