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
    <th>No. HP<th>
    <th>Foto</th>
    </tr>

    <tr>
    <td algin="center">1</td>
    <td>Sulthan Attallah</td>
    <td algin="center">13182420115</td>
    <td algin="center">Informatika</td>
    <td algin="center">att@gmail.com</td>
    <td>08581234567</td>
    <td><img src="assets/images/fotoke1.jpg" width="70px" height="70px"/></td>
    <td>
        <a href="ubahdata.php"><button>Edit</button></a> | <a href="hapusdata.php"><button>Hapus</button></a>
    </td>
    </tr>
        </strong>
    </table>
</h3>
</div>
</body>
</html>