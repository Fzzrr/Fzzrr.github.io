<?php 
session_start();
include('koneksi.php');

if(!isset($_SESSION['username'])){
    header('Location: index.php');
    exit;
}

$npm = $_SESSION['npm'];
$query = ($_SESSION['level'] == 1) 
    ? "SELECT * FROM identitas" : "SELECT * FROM identitas WHERE npm='$npm'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="tampil_data.css">
    <title>Data Identitas</title>
</head>
<body>
    <div class="container">
        <h1>DATA IDENTITAS</h1>
        <table>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['npm'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['jk'] ?></td>
                <td><?= $row['tgl_lhr'] ?></td>
                <td><?= $row['email'] ?></td>
            </tr>
            <?php } ?>
        </table>
        <button><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>