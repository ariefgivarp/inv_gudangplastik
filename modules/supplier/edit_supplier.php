<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
        <p class="h2">Edit Data</p>

        <div class="position-relative">
            <div class="row">
                <div class="col">
                    <div class="card text-center mt-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="p-2">
                                    <h4>Edit Data Supplier</h4>
                                </div>
                                <div class="p-2 "><a href="supplier.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                            </div>
                            <hr>

                            <form action="edit_supplier_aksi.php" method="post" autocomplete="on">
                                <?php
                                include './../../config/koneksi.php';
                                require_once './../../config/fungsi_rupiah.php';

                                if (isset($_GET['id_supplier'])) {
                                    $query = mysqli_query($koneksi, "select * from i_supplier where id_supplier='$_GET[id_supplier]'")
                                        or die('Ada kesalahan pada query tampil Data  : ' . mysqli_error($mysqli));
                                    $d  = mysqli_fetch_assoc($query);
                                }
                                ?>
                                <div class="container mt-3">
                                    <table class="text-start">
                                        <tr>
                                            <td><label for="ex1" class="">Kode Supplier</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="kode_supplier" required="required" value="<?php echo $d['kode_supplier']; ?>" readonly>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">Nama Supplier</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="nama_supplier" value="<?php echo $d['nama_supplier']; ?>">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">No Telp</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="numeric" name="no_telp" value="<?php echo $d['no_telp']; ?>">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">Alamat</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-danger" type="reset" onclick="location.href='supplier.php'">Cancel</button>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-success" name="simpan">Submit</button>
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