<?php
        require 'fungsi.php';

        $id = $_GET['id'];
        $query = "SELECT * FROM mahasiswa WHERE id = $id";
        $mhs = tampildata($query)[0];

        if(isset($_POST['kirim'])){

        ///ketika ada data yang di edit ke db kirim notif nya 
            if(ubahdata($_POST, $id) > 0){
                echo "<script>
                        alert('Data Berhasil Diubah!');
                        window.location.href = 'Mahasiswa.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Data Gagal Diubah!');
                        window.location.href = 'Mahasiswa.php';
                    </script>";
            }
        
        }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Mahasiswa</title>
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
    <h2>Ubah Data Mahasiswa</h2>
    <form action="" method="post">
        <table class="data-table" border="0" cellspacing="5px "> 
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?=  $mhs[1] ?>" required/></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="number" name="nim" id="nim" value="<?=  $mhs[2] ?>" required/></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="prodi" value="<?=  $mhs[3] ?>" required/></td>
            </tr>
            <tr> 
               <td><label for="email">Email</label></td>
               <td>:</td>
               <td><input type="email" name="email" id="email" value="<?=  $mhs[4] ?>" required/></td>
            </tr>
            <tr>
                <td><label for="no_hp">No HP</label></td>
                <td>:</td>
                <td><input type="tel" name="no_hp" id="no_hp" value="<?=  $mhs[5] ?>" required/></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="text" name="foto" id="foto" value="<?=  $mhs[6] ?>" required/></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                <button type="submit" name="kirim">Ubah Data</button>
                </td>
            </tr>
        </table>

    </form>
    <hr/>
</body>
</html>