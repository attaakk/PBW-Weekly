<?php

    require 'fungsi.php';
    
    $id = $_GET['id'];

    if(hapusdata($id) > 0){
        echo "<script>
                    alert('Data Berhasil Dihapus!');
                    window.location.href = 'Mahasiswa.php';
                </script>";
            } else {
                echo "<script>
                        alert('Data Gagal Dihapus!');
                        window.location.href = 'Mahasiswa.php';
                    </script>";
            }

?>