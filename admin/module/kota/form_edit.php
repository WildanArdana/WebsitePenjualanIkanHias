<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$id_kota = $_GET['id_kota'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_kota WHERE id_kota = '$id_kota'");
$row = mysqli_fetch_array($QueryEdit);
$id_kota = $row['id_kota'];
$nama_kota = $row['nama_kota'];
?>
<div class="content-body">
    
    <div class="container-fluid mt-3">
    <div class="content-wrapper">
<section class="content-header">
<h2>
    Manajemen Kota
</h2>
</section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Kota</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../module/kota/aksi_edit.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_kota" class="col-sm-2 control-label">Nama Kota</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id_kota" value="<?= $id_kota; ?>">
                                    <input type="text" class="form-control" name="nama_kota" value="<?= $nama_kota; ?>">
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