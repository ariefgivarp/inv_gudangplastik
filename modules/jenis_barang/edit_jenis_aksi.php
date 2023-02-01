<?php
include './../../config/koneksi.php';
       
if(isset($_POST['simpan'])){
    // ambil data dari formulir
        $id_jenis  = mysqli_real_escape_string($koneksi, trim($_POST['id_jenis']));
        $jenis_barang = mysqli_real_escape_string($koneksi, trim($_POST['jenis_barang']));


        // buat query update
        $sql = "UPDATE i_jenis SET jenis_barang='$jenis_barang' WHERE id_jenis = '$id_jenis'";
        $query = mysqli_query($koneksi, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: jenis_barang.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }


    } else {
        die("Akses dilarang...");
    }

?>