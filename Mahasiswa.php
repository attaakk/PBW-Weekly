<?php
require 'fungsi.php';

// Membuat tabel mahasiswa otomatis jika belum ada di file SQLite
$koneksi->exec("CREATE TABLE IF NOT EXISTS mahasiswa (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nama TEXT NOT NULL,
    nim TEXT NOT NULL,
    jurusan TEXT NOT NULL,
    email TEXT,
    no_hp TEXT,
    foto TEXT
)");

$qmahasiswa = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($qmahasiswa);
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
            <td><a href="index.php">Home</a></td>
            <td><a href="Profile.php">Profile</a></td>
            <td><a href="Contact.php">Contact</a></td>
            <td><a href="Mahasiswa.php">Mahasiswa</a></td>
        </tr>
    </table>
    
    <h3>Data Mahasiswa</h3>
    <a href="inputdata.php">
        <button>Tambah Data</button>
    </a>
    <br><br>

    <table class="data-table" border="1" cellspacing="0" cellpadding="10px"> 
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
            $no = 1;
            foreach($mahasiswas as $mhs){
        ?>
            <tr>
                <td align="center"><?= $no ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td align="center"><?= $mhs['nim'] ?></td>
                <td align="center"><?= $mhs['jurusan'] ?></td>
                <td align="center"><?= $mhs['email'] ?></td>
                <td><?= $mhs['no_hp'] ?></td>
                <td><img src="gambar/<?= $mhs['foto'] ?>" width="120px" height="90px" alt="foto"/></td>
                <td>
                    <a href="ubahdata.php?id=<?= $mhs['id'] ?>"><button>Edit</button></a> | 
                    <a href="hapusdata.php?id=<?= $mhs['id'] ?>" onclick="return confirm('Yakinnn kah manizz?')"><button>Hapus</button></a>
                </td>
            </tr>
        <?php
            $no++;
            }
        ?>
    </table>
    </div>
</body>
</html>