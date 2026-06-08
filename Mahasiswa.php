<?php
        require 'fungsi.php';
        // $koneksi = mysqli_connect("localhost", "root", "", "PBW_Weekly");
        $qmahasiswa = "SELECT * FROM mahasiswa";

        $mahasiswas = tampildata($qmahasiswa);


        // ?masih error karna database belm d buat

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Selamat Datang Mahasigma</h1>

<table class="nav-menu" border="1" cellspacing="0" cellpadding="10px"> 
    <tr>
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
<h3>Data Mahasiswa</h3>
<a href="inputdata.php" Tambah Data>
    <button>Tambah Data</button>
</a>
<br>
<br>
  <table class="data-table" border="1" cellspacing="0" cellpadding="10px"> 
    <tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Jurusan</th>
    <th>Email</th>
    <th>No. HP</th>
    <th>Foto</th>
    </tr>
    <?php
        $no = 1;
        foreach($mahasiswas as $mhs){

    ?>

        <tr>
            <td algin="center"><?=  $no?></td>
            <td><?php echo $mhs[1]?></td>
            <td algin="center"><?=  $mhs[2]?></td>
            <td algin="center"><?=  $mhs[3]?></td>
            <td algin="center"><?=  $mhs[4]?></td>
            <td><?=  $mhs[5]?></td>
            <td><img src="gambar/<?= $mhs[6] ?>" width="120px" height="90px" alt="foto"/></td>
            <td>
                <a href="ubahdata.php"><button>Edit</button></a> | <a href="hapusdata.php"><button>Hapus</button></a>
            </td>
        </tr>
    <?php
        $no++;
        }
    ?>
        </strong>
    </table>
</h3>
</div>
</body>
</html>