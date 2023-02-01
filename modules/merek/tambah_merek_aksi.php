<?php

include("./../../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    $nama_merek  = mysqli_real_escape_string($mysqli, trim($_POST['nama_merek']));
    
    // ambil data dari formulir

    $nama_merek = $_POST['nama_merek'];

    // buat query
    $sql = "insert into i_merek values('', '$nama_merek')";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: merek.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tambah_merek.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>