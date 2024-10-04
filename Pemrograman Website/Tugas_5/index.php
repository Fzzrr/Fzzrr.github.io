<?php
include 'config.php';

if(isset($_GET['delete'])){
    $npm = $_GET["delete"];
    $sql = "DELETE FROM identitas WHERE npm = '$npm'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted succesfully";
    }
    else{
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "SELECT * FROM identitas";
$result = $conn->query($sql);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Identitas Mahasiswa</h1>
    <table>
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>

        <tr>
            <td><?php echo $row['npm']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['tgl_lahir']; ?></td>
            <td><?php echo $row['jk']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="edit.php?npm=<?php echo $row['npm'];?>">Edit</a>
                <a href="?delete=<?php echo $row['npm']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>

        <h2>Tambah Data</h2>
        <form action="insert.php" method="post">
            NPM: <input type="text" name="npm"><br>
            Nama: <input type="text" name="nama"><br>
            Alamat: <input type="text" name="alamat"><br>
            Tgl Lahir: <input type="date" name="tgl_lahir"><br>
            JK: <input type="text" name="jk"><br>
            Email: <input type="email" name="email"><br>
            <input type="submit" value="tambah">
        </form>
    </table>
</body>

</html>