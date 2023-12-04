<?php
$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "projectweb";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die("Error: " . mysqli_error($koneksi));

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
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h1>Detail Pemesanan</h1>
    </header>

    <section>
        <?php
        // Menambahkan logika yang melibatkan koneksi dan query database di sini
                
        session_start();
        if (isset($_SESSION["id"])) {
            $id = $_SESSION['id'];
            
            $query = "SELECT detail.tanggal_sewa, detail.jenis_kendaraan, detail.jenis_sewa, detail.tujuan
                    FROM detail
                    INNER JOIN user ON detail.id = user.id
                    WHERE detail.id = '$id'";

            $result = mysqli_query($koneksi, $query);

            // Check if the query was successful
            if (!$result) {
                die("Query error: " . mysqli_error($koneksi));
            }

            if (mysqli_num_rows($result) > 0) {
                // Output data in HTML table
                echo "<table border='1'>
                        <tr>
                            <th>Tanggal Sewa</th>
                            <th>Jenis Kendaraan</th> 
                            <th>Jenis Sewa</th>
                            <th>Tujuan</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>".$row['tanggal_sewa']."</td>
                            <td>".$row['jenis_kendaraan']."</td>
                            <td>".$row['jenis_sewa']."</td>
                            <td>".$row['tujuan']."</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "No data found.";
            }
        }
        ?>

    </section>

    <footer>
        &copy; 2023 Your Website
    </footer>
</body>
</html>