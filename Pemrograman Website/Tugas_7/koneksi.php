<?php
$host = "localhost:3306";
$user = "root";
$password ="";
$database = "mhs";

$conn = new mysqli($host, $user, $password, $database);
if(!$conn){
    die("Koneksi gagal" . mysqli_connect_error());
}