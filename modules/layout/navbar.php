<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo "Anda harus login dulu <br><a href='../../index.php'>Klik disini</a>";
    exit;
}

$id_user = $_SESSION["id_user"];
$user = $_SESSION["user"];
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UD. LANCAR PLASTIK</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<style>
    li {
        list-style: none;
        margin: 20px 0 20px 0;
    }

    a {
        text-decoration: none;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        margin-left: -300px;
        transition: 0.4s;
    }

    .active-main-content {
        margin-left: 250px;
    }

    .active-sidebar {
        margin-left: 0;
    }

    #main-content {
        transition: 0.4s;
    }
</style>

<body>
    <nav class="navbar" style="background-color: #2A3F54;">
        <div class=" container-fluid">
            <a class="text-white" href="../home/home.php">
                <h2 class=" p-3 text-white">UD. MAJU PLASTIK</h2>
            </a>
            <div class="btn-group">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./../../assets/img/av.png" alt="hugenerd" width="40" height="40" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">USERS</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Sign Out</a></li>
                </ul>
            </div>
        </div>


    </nav>
    <div class="sidebar p-4 fixed-left" id="sidebar" style="background-color: #2A3F54; font-size:20px;">

        <li class="m-4">
            <a class="text-white" href="../home/home.php">
                <i class="bi bi-house mr-2"></i>
                Beranda
            </a>
        </li>
        <li class="nav-item dropdown m-4">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"><i class="bi bi-file mr-2"></i> Data Barang</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../barang/barang.php">Data Barang</a></li>
                <li><a class="dropdown-item" href="../jenis_barang/jenis_barang.php">Tambah Jenis Barang</a></li>
                <li><a class="dropdown-item" href="../merek/merek.php">Tambah Merek</a></li>
            </ul>
        </li>
        <li class="m-4">
            <a class="text-white" href="../supplier/supplier.php">
                <i class="bi bi-newspaper mr-2"></i>
                Supplier
            </a>
        </li>
        <li class="nav-item dropdown m-4">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"><i class="bi bi-clipboard-data mr-2"></i> Laporan</span></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../barang_masuk/barang_masuk.php">Data Barang masuk</a></li>
                <li><a class="dropdown-item" href="../barang_keluar/barang_keluar.php">Data Barang Keluar</a></li>
                <li><a class="dropdown-item" href="../cetak/cetak_barang_masuk.php">Cetak Barang Masuk</a></li>
                <li><a class="dropdown-item" href="../cetak/cetak_barang_keluar.php">Cetak Barang Keluar</a></li>
            </ul>
        </li>
    </div>