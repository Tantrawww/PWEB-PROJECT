<?php
// Koneksi ke database
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

// Periksa koneksi
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

//tombol cari untuk mencari driver

echo "<h3>Cari Driver</h3>";
?>
<!DOCTYPE html>
<html>
<form action="" method="post";>
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." 
    autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol_cari">Cari!</button> 
</form>
</html>

<?php

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
                <td>" . $row["id_driver"] . "</td>
                <td>" . $row["nama_driver"] . "</td>
                <td>" . $row["nomor_lisensi"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data driver.";
}

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
                <td>" . $row["id_kendaraan"] . "</td>
                <td>" . $row["nomor_polisi"] . "</td>
                <td>" . $row["kapasitas"] . "</td>
                <td>" . $row["jenis_kendaraan"] . "</td>
                <td>" . $row["ketersediaan"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data kendaraan.";
}

function cari($keyword){
    global $koneksi;
    $query = "SELECT * FROM driver WHERE nama_driver LIKE '%$keyword%'";
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