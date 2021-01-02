<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
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
        <div class="card">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Kota</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kota</th>
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $QueryMerk = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                while ($row = mysqli_fetch_array($QueryMerk)) {
                                ?>
                                    <tr>
                                        <td><?= $row['id_kota']; ?></td>
                                        <td><?= $row['nama_kota']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= $admin_url; ?>asset/adminweb.php?module=edit_kota&id_kota=<?= $row['id_kota']; ?>">
                                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a href="<?= $admin_url; ?>module/kota/aksi_hapus.php?id_kota=<?= $row['id_kota']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                                    <button class="btn btn-danger"><i class="fa fa-power-off"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="adminweb.php?module=tambah_kota" class="btn btn-sm btn-info btn-flat pull-left">Tambah Kota</a>
                        <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>