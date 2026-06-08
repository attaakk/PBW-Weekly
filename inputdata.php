<?php
        require 'fungsi.php';

        if(isset($_POST['kirim'])){
            if(tambahdata($_POST) > 0){
                echo "<script>
                        alert('Data Berhasil Ditambahkan!');
                        window.location.href = 'Mahasiswa.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Data Gagal Ditambahkan!');
                        window.location.href = 'Mahasiswa.php';
                    </script>";
            }
        
        }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>WEB SAYA </h2>
<table class="nav-menu" cellspacing="0">
        <tr>
        <!--  TR ADALAH BARIS, TD ADALAH KOLOM -->
        <td>    
            <a href="index.php">Home</a>
        </td>
        
        <td>
            <a href="Profile.php">Profile</a>
        </td>
        <td>
            <a href="Contact.php">Contact</a>
        </td>
        <td><a href="Mahasiswa.php">Mahasiswa</a></td>
    </tr>
</table>
    <h2>Input Data Mahasiswa</h2>
    <form action="" method="post">
        <table class="data-table" border="0" cellspacing="5px "> 
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required/></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="number" name="nim" id="nim" required/></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="prodi" required/></td>
            </tr>
            <tr> 
               <td><label for="email">Email</label></td>
               <td>:</td>
               <td><input type="email" name="email" id="email" required/></td>
            </tr>
            <tr>
                <td><label for="no_hp">No HP</label></td>
                <td>:</td>
                <td><input type="tel" name="no_hp" id="no_hp" required/></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="text" name="foto" id="foto" required/></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                <button type="submit" name="kirim">Kirim Data</button>
                </td>
            </tr>
        </table>

    </form>
    <hr/>
</body>
</html>