<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hostname = "localhost";
        $user = "root";
        $password = "";
        $db_name = "projectweb";
    

        $koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

        $username = $_POST['username'];
        $password1 = $_POST['password1'];

        if($username === 'username' && $password1 === 'password1') {
            echo "<script>
			alert('Login Berhasil');
			window.location = 'loginpage.html';
		    </script>";
        
        
        }
        else {
            echo "Login Gabisa ANJENG";
        }
    }
?>
