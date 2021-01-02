<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $_POST = $_SESSION['post'];
    unset($_SESSION['error']);
    unset($_SESSION['post']);
}

?>
<div class="content-body">
    
    <div class="container-fluid mt-3">
    <div class="content-wrapper">
<section class="content-header">
<h2>
    Manajemen Biaya
</h2>
</section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Biaya</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../module/biaya/aksi_simpan.php" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kota" class="col-sm-2 control-label">List Kota</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kota">
                                        <option value="">Pilih Kota</option>
                                        <?php
                                        include "../assets/lib/koneksi.php";
                                        $QueryKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                        while ($kota = mysqli_fetch_array($QueryKota)) {
                                        ?>
                                            <option value="<?= $kota['id_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <p class="text-red"><?php echo isset($error['kota']) ? $error['kota'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jasa" class="col-sm-2 control-label">List Jasa Kirim</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jasa">
                                        <option value="">Pilih Jasa Kirim</option>
                                        <?php
                                        include "../assets/lib/koneksi.php";
                                        $QueryJasa = mysqli_query($koneksi, "SELECT * FROM tbl_jasa");
                                        while ($jasa = mysqli_fetch_array($QueryJasa)) {
                                        ?>
                                            <option value="<?= $jasa['id_jasa']; ?>"><?= $jasa['nama_jasa']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <p class="text-red"><?php echo isset($error['expedisi']) ? $error['expedisi'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="biaya" class="col-sm-2 control-label">Biaya</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="biaya" placeholder="0">
                                    <p class="text-red"><?php echo isset($error['biaya']) ? $error['biaya'] : ''; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>