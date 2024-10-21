<?php
session_start();
include('koneksi.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if($user){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $user['level'];
        $_SESSION['npm'] = $user['npm'];

        if($user['level'] == '1'){
            header('location: tampil_data.php');
        } else {
            header('location: home.php');
        }
    } else {
        echo "<script>alert('Login gagal! Username atau password salah.' );</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="" method="POST">
            <label>Username</label><br>
            <input type="text" name="username" required><br>

            <label>Password</label><br>
            <input type="password" name="password" required><br>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <p>
        <b>User</b><br>
        username: user1 <br>
        password: password1 <br>

        <b>admin</b> <br>
        username: admin1 <br>
        password: passadmin <br>
    </p>
</body>
</html>