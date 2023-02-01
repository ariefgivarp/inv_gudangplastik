<?php
include './../../config/koneksi.php';
       
if(isset($_POST['simpan'])){
    // ambil data dari formulir
        $id_merek  = mysqli_real_escape_string($koneksi, trim($_POST['id_merek']));
        $nama_merek = mysqli_real_escape_string($koneksi, trim($_POST['nama_merek']));


        // buat query update
        $sql = "UPDATE i_merek SET nama_merek='$nama_merek' WHERE id_merek = '$id_merek'";
        $query = mysqli_query($koneksi, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: merek.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }


    } else {
        die("Akses dilarang...");
    }

?>