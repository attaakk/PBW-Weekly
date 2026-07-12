<?php
require 'fungsi.php';

// Jika sudah login, redirect ke index
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan user baru!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Registrasi Pengguna Baru</h1>
        <hr>
        
        <table class="nav-menu" cellspacing="0"> 
            <tr>
                <td><a href="index.php">Home</a></td>
                <td><a href="login.php">Login</a></td>
            </tr>
        </table>
        
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username :</label><br>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password :</label><br>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password_confirm">Konfirmasi Password :</label><br>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
            </div>
            <br>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
