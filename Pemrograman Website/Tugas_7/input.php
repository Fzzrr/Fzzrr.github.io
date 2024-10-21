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

if (isset($_POST['tambah']) && $_SESSION['level'] == '2') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $query = "INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) 
              VALUES ('$npm', '$nama', '$alamat', '$jk', '$tgl_lhr', '$email')";
    mysqli_query($conn, $query);
    header('Location: data.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="input.css">
    <title>Input Data</title>
</head>
<body>
    <div class="container">
        <h1>INPUT USER</h1>
        <?php if ($_SESSION['level'] == '2'): ?>
        <table class="form">
            <form method="post">
                <tr>
                    <th>NPM: </th>
                    <td><input type="text" name="npm" required></td>
                </tr>

                <tr>
                    <th>Nama: </th>
                    <td><input type="text" name="nama" required></td>
                </tr>

                <tr>
                    <th>Alamat: </th>
                    <td><input type="text" name="alamat" required></td>
                </tr>

                <tr>
                    <th>Jenis Kelamin: </th>
                    <td><select name="jk">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select></td>
                </tr>

                <tr>
                    <th>Tanggal Lahir: </th>
                    <td><input type="date" name="tgl_lhr" required></td>
                </tr>

                <tr>
                    <th>Email: </th>
                    <td><input type="text" name="email" required></td>
                </tr>

                <tr>
                    <td colspan='2' style="text-align:center;"><button class="tambah" type="submit" name="tambah">Tambah Data</button></td>
                </tr>
            </form>
        </table>
        <?php endif; ?>
        </div>
</body>
<html>