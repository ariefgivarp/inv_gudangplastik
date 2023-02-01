<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
    <p class="h2">Tambah Data</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Tambah Data Supplier</h4>
                            </div>
                            <div class="p-2 "><a href="supplier.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                        </div>
                        <hr>

                        <form action="tambah_supplier_aksi.php" method="post">
                            <?php
                            include './../../config/koneksi.php';
                            require_once './../../config/fungsi_rupiah.php';

                            $query = mysqli_query($koneksi, "SELECT max(kode_supplier) as kodeTerbesar FROM i_supplier");
                            $data = mysqli_fetch_array($query);
                            $kodeBarang = $data['kodeTerbesar'];

                            $urutan = (int) substr($kodeBarang, 4, 4);

                            $urutan++;
                            $huruf = "SPR";
                            $kodeBarang = $huruf . sprintf("%04s", $urutan);

                            ?>
                            <div class="container mt-3">
                                <table class="text-start">
                                    <tr>
                                        <td><label for="ex1" class="">Kode Supplier</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="kode_supplier" required="required" value="<?php echo $kodeBarang ?>" readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Nama Supplier</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="nama_supplier">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">No Telp</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="numeric" name="no_telp">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Alamat</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="alamat">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-danger" type="reset" onclick="location.href='supplier.php'">Cancel</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
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