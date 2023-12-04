<?php

$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("". mysqli_error($koneksi));

$keyword = $_GET ["keyword"];

$driver_query = "SELECT * FROM driver WHERE namadriver LIKE '%$keyword%'";
$driver_result = $koneksi->query($driver_query);


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