<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Koneksi ke file SQLite yang ada di folder yang sama
try {
    $koneksi = new PDO("sqlite:PBW_Weekly.db");
    // Mengatur agar PDO menampilkan error jika query salah
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create users table if not exists
    $koneksi->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL
    )");
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// 2. Fungsi Tampil Data
function tampildata($query)
{
    global $koneksi;
    try {
        $result = $koneksi->query($query);
        // Mengambil data sebagai array asosiatif (nama kolom)
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

// 3. Fungsi Tambah Data
function tambahdata($data, $files)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    
    $namafoto = $files['name'];
    $tmpfoto = $files['tmp_name'];
    
    // Perbaikan: Gunakan double quotes agar variabel $namafoto terbaca, bukan teks '$namafoto'
    $path = "gambar/" . $namafoto; 

    if (move_uploaded_file($tmpfoto, $path)) {
        try {
            $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
                      VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$namafoto')";
            
            $stmt = $koneksi->prepare($query);
            $stmt->execute();
            return $stmt->rowCount(); // Mengembalikan jumlah baris yang terpengaruh (1 jika berhasil)
        } catch (PDOException $e) {
            echo "Error Database: " . $e->getMessage();
            return 0;
        }
    } else {
        echo "Foto gagal diupload ke folder";
        return 0;
    }
}

// 4. Fungsi Hapus Data
function hapusdata($id)
{
    global $koneksi;
    try {
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        $stmt = $koneksi->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $e) {
        return 0;
    }
}

// 5. Fungsi Ubah Data
function ubahdata($data, $id)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $foto = htmlspecialchars($data['foto']);

    try {
        $query = "UPDATE mahasiswa SET
                    nama = '$nama',
                    nim = '$nim',
                    jurusan = '$jurusan',
                    email = '$email',
                    no_hp = '$no_hp',
                    foto = '$foto'
                  WHERE id = $id";

        $stmt = $koneksi->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $e) {
        return 0;
    }
}

// 6. Fungsi Register
function register($data) {
    global $koneksi;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = $data["password"];
    $password_confirm = $data["password_confirm"];
    
    // Cek username sudah ada atau belum
    $stmt_check = $koneksi->prepare("SELECT username FROM users WHERE username = :username");
    $stmt_check->bindParam(':username', $username);
    $stmt_check->execute();
    
    if ($stmt_check->fetch()) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return false;
    }
    
    // Cek konfirmasi password
    if ($password !== $password_confirm) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }
    
    // Enkripsi password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    // Tambahkan user baru ke database
    try {
        $stmt_insert = $koneksi->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt_insert->bindParam(':username', $username);
        $stmt_insert->bindParam(':password', $password_hash);
        $stmt_insert->execute();
        
        return $stmt_insert->rowCount();
    } catch (PDOException $e) {
        return 0;
    }
}
?>