<?php

// Koneksi ke database

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "Hotel";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {

    die("Koneksi gagal: " . $conn->connect_error);

}


// Query untuk mengambil data

$sql = "SELECT * FROM hotels";

$result = $conn->query($sql);

?>


<!DOCTYPE html>

<html>

<head>

    <title>Daftar Hotel</title>

</head>

<body>

    <h1>Daftar Hotel</h1>

    <table border="1">

        <tr>

            <th>ID Hotel</th>

            <th>Nama Hotel</th>

            <th>Jumlah Kamar</th>

            <th>Jumlah Bintang</th>

            <th>Lokasi</th>

        </tr>

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "<tr>

                        <td>{$row['id_hotel']}</td>

                        <td>{$row['nama_hotel']}</td>

                        <td>{$row['jumlah_kamar']}</td>

                        <td>{$row['jumlah_bintang']}</td>

                        <td>{$row['lokasi']}</td>

                      </tr>";

            }

        } else {

            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";

        }

        $conn->close();

        ?>

    </table>

</body>

</html>