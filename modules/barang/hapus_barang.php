<?php

include './../../config/koneksi.php';

if( isset($_GET['id_barang']) ){

    // ambil id dari query string
    $id_barang = $_GET['id_barang'];

    // buat query hapus
    $sql = "DELETE FROM i_plastik WHERE id_barang=$id_barang";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: barang.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>