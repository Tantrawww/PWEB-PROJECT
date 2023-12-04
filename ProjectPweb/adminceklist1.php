<?php
// Koneksi ke database
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        section {
            margin: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        footer {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .search-bar {
        margin-bottom: 20px;
        margin-left: 10px;
        padding: 10px;
        border-radius: 5px;
        }

        .search-bar h3 {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: bold;
        }

        .search-bar input[type="text"] {
        width: 20%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        }

        .search-bar button[type="submit"] {
        padding: 10px 20px;
        margin-left: 8px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Detail Driver & Kendaraan</h1>
    </header>
    <div class="search-bar">
        <h3>Cari Driver</h3>
        <form action="" method="post";>
            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." 
            autocomplete="off" id="keyword">
            <button type="submit" name="cari" id="tombol_cari">Cari!</button> 
        </form>
    </div>
    
    <section>

        <?php
        if ($koneksi->connect_error) {
            die("Koneksi Gagal: " . $koneksi->connect_error);
        }

        // Query untuk tabel driver
        $driver_query = "SELECT * FROM driver";
        $driver_result = $koneksi->query($driver_query);

        // Query untuk tabel kendaraan
        $kendaraan_query = "SELECT * FROM kendaraan";
        $kendaraan_result = $koneksi->query($kendaraan_query);

        //jika tombol cari di click
        if (isset($_POST["cari"])){
            $driver_result = cari($_POST["keyword"]);
        }

        // Menampilkan data tabel driver
        echo "<h2>Data Driver</h2>";
        if ($driver_result->num_rows > 0) {
            echo "<div id='container'>
                        <table border='1'>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nomor Lisensi</th>
                            </tr>
                        
                    </div>";
                    
            while ($row = $driver_result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["namadriver"] . "</td>
                        <td>" . $row["nomorlisensi"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data driver.";
        }
        ?>

        <?php
        // Menampilkan data tabel kendaraan
        echo "<h2>Data Kendaraan</h2>";
        if ($kendaraan_result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nomor Polisi</th>
                        <th>Kapasitas</th>
                        <th>Jenis Kendaraan</th>
                        <th>Ketersediaan</th>
                    </tr>";
            while ($row = $kendaraan_result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nomorpolisi"] . "</td>
                        <td>" . $row["kapasitas"] . "</td>
                        <td>" . $row["jeniskendaraan"] . "</td>
                        <td>" . $row["ketersediaan"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data kendaraan.";
        }
        function cari($keyword){
            global $koneksi;
            $query = "SELECT * FROM driver WHERE namadriver LIKE '%$keyword%'";
            $queryresult = $koneksi->query($query);

            return $queryresult;

        }

        // Tutup koneksi
        $koneksi->close();
        ?>

        <!DOCTYPE html>
        <html>
        <body>
            <Script src="js/script.js"></Script>
        </body>
        </html>
    </section>
    
    <footer>
        &copy; 2023 Tantra Jaya Trans
    </footer>
</body>
</html>
