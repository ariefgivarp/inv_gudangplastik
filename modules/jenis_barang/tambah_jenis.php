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
                                    <h4>Tambah Jenis Barang</h4>
                                </div>
                                <div class="p-2 "><a href="jenis_barang.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                            </div>
                            <hr>

                            <form action="tambah_jenis_aksi.php" method="post">
                                <div class="container mt-3">
                                    <table class="text-start">
                                        <tr>
                                            <td><label for="ex1" class="">Jenis Barang</label></td>
                                            <td>
                                                <div class="form-group row p-3 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="jenis_barang">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-danger" type="reset" onclick="location.href='jenis_barang.php'">Cancel</button>
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