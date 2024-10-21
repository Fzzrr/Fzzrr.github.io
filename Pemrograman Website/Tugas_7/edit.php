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

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    // Fetch user data based on NPM
    $result = mysqli_query($conn, "SELECT * FROM identitas WHERE npm='$npm'");
    $user = mysqli_fetch_assoc($result);
    
    if (!$user) {
        // Handle case where user is not found
        echo "User not found!";
        exit;
    }
} else {
    echo "NPM not specified!";
    exit;
}

if (isset($_POST['update']) && $_SESSION['level'] == '2') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE identitas set nama='$nama', alamat='$alamat', jk='$jk', tgl_lhr='$tgl_lhr', email='$email' WHERE npm='$npm'";
    mysqli_query($conn, $updateQuery);
    header('Location: data.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="edit.css">
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h1>EDIT USER</h1>
        <?php if ($_SESSION['level'] == '2'): ?>
        <table class="form">
            <form method="post">
                <tr>
                    <th>NPM: </th>
                    <td><input type="text" name="npm" value="<?= $user['npm'] ?>" readonly></td>
                </tr>

                <tr>
                    <th>Nama: </th>
                    <td><input type="text" name="nama" value="<?= $user['nama'] ?>" required></td>
                </tr>

                <tr>
                    <th>Alamat: </th>
                    <td><input type="text" name="alamat" value="<?= $user['alamat'] ?>" required></td>
                </tr>

                <tr>
                    <th>Jenis Kelamin: </th>
                    <td><select name="jk">
                        <option value="L" <?= $user['jk'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= $user['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select></td>
                </tr>

                <tr>
                    <th>Tanggal Lahir: </th>
                    <td><input type="date" name="tgl_lhr" value="<?= $user['tgl_lhr'] ?>" required></td>
                </tr>

                <tr>
                    <th>Email: </th>
                    <td><input type="text" name="email" value="<?= $user['email'] ?>" required></td>
                </tr>

                <tr>
                    <td colspan='2' style="text-align:center;"><button class="update" type="submit" name="update">Update</button></td>
                </tr>
            </form>
        </table>
        <button class="kembali"><a href="data.php">Kembali</a></button>
        <?php endif; ?>
        </div>
</body>
<html>