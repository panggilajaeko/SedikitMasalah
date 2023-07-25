<?php 
include './koneksi/koneksi.php';

$query = "SELECT * FROM tbl_lamaran";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi Pelamar</title>
</head>
<body>
    <h1>Tabel Seleksi Pelamar</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pendidikan Terakhir</th>
                <th>Status Seleksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$row["nama"]."</td>";
                    echo "<td>".$row["alamat"]."</td>";
                    echo "<td>".$row["pendidikan_terakhir"]."</td>";
                    echo "<td>".$row["status_seleksi"]."</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
