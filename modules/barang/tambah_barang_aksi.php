<?php

include("./../../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    $kode_barang  = mysqli_real_escape_string($mysqli, trim($_POST['kode_barang']));
    $nama_barang  = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
    $harga_beli = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_beli'])));
    $harga_jual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_jual'])));
    $satuan     = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));
    // ambil data dari formulir
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $nama_merek = $_POST['nama_merek'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];

    // buat query
    $sql = "insert into i_plastik values('', '$kode_barang', '$nama_barang', '$jenis_barang', '$nama_merek', '$harga_beli', '$harga_jual', '$satuan', '$stok', NOW())";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: barang.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tambah_barang.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>