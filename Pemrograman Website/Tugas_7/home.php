<?php 
session_start();
include('koneksi.php');

if($_SESSION['level'] != '2'){
    header('location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>Admin Home</title>
</head>
<body>
    <div class="container">
        <h1> Selamat datang, Admin!</h1>
        <button><a href="input.php">Input data user</a></button>
        <button><a href="data.php">Lihat data user</a></button>
        <button><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>