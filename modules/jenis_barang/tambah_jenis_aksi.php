<?php

include("./../../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    $jenis_barang  = mysqli_real_escape_string($mysqli, trim($_POST['jenis_barang']));
    
    // ambil data dari formulir

    $jenis_barang = $_POST['jenis_barang'];

    // buat query
    $sql = "insert into i_jenis values('', '$jenis_barang')";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: jenis_barang.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tambah_jenis.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>