<?php

include './../../config/koneksi.php';

if( isset($_GET['id_supplier']) ){

    // ambil id dari query string
    $id_supplier = $_GET['id_supplier'];

    // buat query hapus
    $sql = "DELETE FROM i_supplier WHERE id_supplier=$id_supplier";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: supplier.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>