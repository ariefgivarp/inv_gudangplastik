<?php

include './../../config/koneksi.php';

if( isset($_GET['id_jenis']) ){

    // ambil id dari query string
    $id_jenis = $_GET['id_jenis'];

    // buat query hapus
    $sql = "DELETE FROM i_jenis WHERE id_jenis=$id_jenis";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: jenis_barang.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>