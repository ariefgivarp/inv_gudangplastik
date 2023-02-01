<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
        <p class="h4">Data Supplier</p>

        <div class="position-relative">
            <div class="row">
                <div class="col">
                    <div class="card text-center mt-5">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="p-2">
                                    <h4>Tabel Data Supplier</h4>
                                </div>
                                <div class="p-2 "><a href="tambah_supplier.php" class="fa fa-plus" style="text-decoration:none"> Tambah Data</a></button></div>
                            </div>
                            <hr>
                            <div class="container mt-3">
                                <table class="table table-bordered border-primary" id="tabel-data">
                                    <thead class="table-primary" style="font-size:90%">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Supplier</th>
                                            <th>Nama Supplier</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include './../../config/koneksi.php';
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM i_supplier ORDER BY nama_supplier DESC");
                                        while ($d = mysqli_fetch_array($data)) {
                                            // $harga_beli = format_rupiah($d['harga_awal']);
                                            // $harga_jual = format_rupiah($d['harga_jual']);
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['kode_supplier']; ?></td>
                                                <td><?php echo $d['nama_supplier']; ?></td>
                                                <td><?php echo $d['no_telp']; ?></td>
                                                <td><?php echo $d['alamat']; ?></td>
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="edit" href="edit_supplier.php?id_supplier=<?php echo $d['id_supplier']; ?>"><span class="fa fa-pencil-square"></span></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Hapus" href="hapus_supplier.php?id_supplier=<?php echo $d['id_supplier']; ?>"><span class="fa fa-trash"></span></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <script>
                                        $(document).ready(function() {
                                            $('#tabel-data').DataTable();
                                        });
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
include '../layout/footer.php';
?>