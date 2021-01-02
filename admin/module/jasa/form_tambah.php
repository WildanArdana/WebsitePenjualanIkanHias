<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
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
                        <h3 class="box-title">Tambah Jasa</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../module/jasa/aksi_simpan.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="namaJasa" class="col-sm-2 control-label">Nama Jasa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namaJasa" name="namaJasa" placeholder="Nama Jasa">
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