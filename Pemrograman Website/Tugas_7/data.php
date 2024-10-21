<?php
session_start();
include('koneksi.php');

if ($_SESSION['level'] != '2') {
    header('Location: index.php');
    exit;
}

if ($_SESSION['level'] == '1') {
    header('Location: tampil_data.php');
    exit;
}

// Proses delete data
if (isset($_GET['delete']) && $_SESSION['level'] == '2') {
    $npm = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM identitas WHERE npm = '$npm'");
    header('Location: data.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="data.css">
    <title>Data User - Admin</title>
</head>
<body>
    <div class="container1">
    <h1>DATA USER</h1>
    <table>
        <tr>
            <th class="table">No.</th>
            <th class="table">NPM</th>
            <th class="table">Nama</th>
            <th class="table">Alamat</th>
            <th class="table">Jenis Kelamin</th>
            <th class="table">Tanggal Lahir</th>
            <th class="table">Email</th>
            <?php if ($_SESSION['level'] == '2'): ?>
            <th class="table">Aksi</th>
            <?php endif; ?>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM identitas");
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td class='table'> " . $no++ . "</td>
                    <td class='table'>{$row['npm']}</td>
                    <td class='table'>{$row['nama']}</td>
                    <td class='table'>{$row['alamat']}</td>
                    <td class='table'>{$row['jk']}</td>
                    <td class='table'>{$row['tgl_lhr']}</td>
                    <td class='table'>{$row['email']}</td>
                    <td class='table'>
                        <button class='edit'><a href='edit.php?npm={$row['npm']}'>Edit</a></button>
                        <button class='delete'><a href='data.php?delete={$row['npm']}' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a></button>
                    </td>
                  </tr>";
        }
        ?>
        </table>
        <button class="input"><a href="input.php">Input</a></button>
        <button class="logout"><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>
