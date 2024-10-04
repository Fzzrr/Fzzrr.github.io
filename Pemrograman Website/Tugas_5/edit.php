<?php
include 'config.php';
if(isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $sql = "SELECT * FROM identitas WHERE npm='$npm'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    $sql = "UPDATE identitas SET 
            nama='$nama', 
            alamat='$alamat', 
            tgl_lahir='$tgl_lahir',
            jk='$jk',
            email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <form action="" method="post">
        NPM: <input type="text" name="npm" value="<?php echo $row['npm']; ?>" readonly><br>
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
        Tgl Lahir: <input type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>"><br>
        JK: <input type="text" name="jk" value="<?php echo $row['jk']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>

        <input type="submit" value="Update">
    </form>
</body>

</html>