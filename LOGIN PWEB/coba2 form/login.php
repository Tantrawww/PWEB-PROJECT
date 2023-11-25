<?php
// Menginisialisasi session
session_start();

// Memeriksa apakah pengguna sudah login sebelumnya, jika ya, alihkan ke halaman terproteksi
if(isset($_SESSION['username'])){
    header("Location: halaman_terproteksi.php");
    exit;
}

// Memeriksa apakah form login telah di-submit
if(isset($_POST['login'])){
    // Mendapatkan nilai yang dimasukkan oleh pengguna
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Fungsi untuk memvalidasi username dan password (Anda bisa mengganti logika validasi sesuai kebutuhan)
    function validateLogin($username, $password){
        // Lakukan validasi dengan database atau penyimpanan yang sesuai
        // Di sini, kami mengasumsikan username: "admin" dan password: "12345" sebagai nilainya yang benar
        if($username == "admin" && $password == "12345"){
            return true;
        }
        return false;
    }
    
    // Memvalidasi informasi login
    if(validateLogin($username, $password)){
        // Login berhasil
        // Simpan informasi dalam sesi
        $_SESSION['username'] = $username;
        
        // Anda juga bisa menambahkan informasi tambahan ke sesi seperti ID atau peran pengguna
        
        // Alihkan ke halaman terproteksi
        header("Location: halaman_terproteksi.php");
        exit;
    }
    else{
        // Login gagal
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    // Tampilkan pesan error (jika ada)
    if(isset($error)){
        echo "<p>$error</p>";
    }
    ?>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>