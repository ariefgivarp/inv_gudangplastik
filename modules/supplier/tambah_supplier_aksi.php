<?php

include("./../../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    $kode_supplier  = mysqli_real_escape_string($mysqli, trim($_POST['kode_supplier']));
    $nama_supplier  = mysqli_real_escape_string($mysqli, trim($_POST['nama_supplier']));
    // ambil data dari formulir
    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];


    // buat query
    $sql = "insert into i_supplier values('', '$kode_supplier', '$nama_supplier', '$no_telp', '$alamat')";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: supplier.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tambah_supplier.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>