<?php
 include "../../lib/config.php";
 include "../../lib/koneksi.php";

$id_jasa = $_GET['id_jasa'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_jasa WHERE id_jasa = '$id_jasa'");
$row = mysqli_fetch_array($QueryEdit);
$id_jasa = $row['id_jasa'];
$nama_jasa = $row['nama_jasa'];
?>
<div class="content-body">
    
    <div class="container-fluid mt-3">
    <div class="content-wrapper">
<section class="content-header">
<h2>
    Manajemen Jasa
</h2>
</section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Jasa</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../module/jasa/aksi_edit.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_jasa" class="col-sm-2 control-label">Nama Jasa</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id_jasa" value="<?= $id_jasa; ?>">
                                    <input type="text" class="form-control" name="nama_jasa" value="<?= $nama_jasa; ?>">
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