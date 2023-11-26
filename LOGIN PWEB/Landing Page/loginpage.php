<?php
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

$username = $_POST['username'];
$password1 = $_POST['password1'];

$query_sql = "SELECT * from user where username = '$username' AND password_user = '$password1'";

$result = mysqli_query($koneksi, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: landingpage.html");
} else {
    echo"<center><h1>Email atau Password salah.<h1>";
}



?>
