<?php
require 'fungsi.php';

// Jika sudah login, redirect ke index
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    global $koneksi;
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cek username
    if ($row) {
        // Cek password
        if (password_verify($password, $row["password"])) {
            // Set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <hr>
        
        <table class="nav-menu" cellspacing="0"> 
            <tr>
                <td><a href="index.php">Home</a></td>
                <td><a href="register.php">Register</a></td>
            </tr>
        </table>

        <?php if(isset($error)) : ?>
            <p style="color: red; font-style: italic;">Username / Password salah!</p>
        <?php endif; ?>
        
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
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
