<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    $sql = "INSERT INTO identitas (npm, nama, alamat, tgl_lahir, jk, email) 
            VALUES ('$npm', '$nama', '$alamat', '$tgl_lahir', '$jk', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>