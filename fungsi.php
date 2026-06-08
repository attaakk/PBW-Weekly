<?php
        $koneksi = mysqli_connect("localhost", "root", "", "PBW_Weekly");


        // $query = "SELECT * FROM mahasiswa";
        function tampildata($query){
            global $koneksi;
            $result = mysqli_query($koneksi, $query);
            $row = [];

            while ($mhs = mysqli_fetch_assoc($result)){
                $row[] = $mhs;
            }

            return $row;
        }
        function tambahdata($data){
            global $koneksi;

            $nama = htmlspecialchars($data['nama']);
            $nim = htmlspecialchars($data['nim']);
            $jurusan = htmlspecialchars($data['jurusan']);
            $email = htmlspecialchars($data['email']);
            $no_hp = htmlspecialchars($data['no_hp']);
            $foto = ($data['foto']);

            $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
            VALUES ('$nama','$nim','$jurusan','$email','$no_hp','$foto')";
            mysqli_query($koneksi, $query);

            return mysqli_affected_rows($koneksi);
        }
        
        
        // ?masih error karna database belm d buat

?>