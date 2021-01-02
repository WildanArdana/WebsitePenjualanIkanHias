<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
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
                <div class="card">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">List Biaya</h3>
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
                                                <th>Kota</th>
                                                <th>Biaya</th>
                                                <th>Jasa Kirim</th>
                                                <th style="width: 110px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $QueryKategori = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim");
                                        while ($row = mysqli_fetch_array($QueryKategori)) {
                                            $id_kota = $row['id_kota'];
                                            $QueryKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota WHERE id_kota =  $id_kota ");
                                            $kota = mysqli_fetch_array($QueryKota);
                                            $id_jasa = $row['id_jasa'];
                                            $QueryJasa = mysqli_query($koneksi, "SELECT * FROM tbl_jasa WHERE id_jasa =  $id_jasa ");
                                            $jasa = mysqli_fetch_array($QueryJasa);
                                        ?>
                                            <tr>
                                                <td><?= $kota['nama_kota']; ?></td>
                                                <td><?= $row['biaya']; ?></td>
                                                <td><?= $jasa['nama_jasa']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= $admin_url; ?>asset/adminweb.php?module=edit_ongkir&id_biaya_kirim=<?= $row['id_biaya_kirim']; ?>">
                                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                                        </a>
                                                        <a href="<?= $admin_url; ?>module/biaya/aksi_hapus.php?id_biaya_kirim=<?= $row['id_biaya_kirim']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
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
                                <a href="adminweb.php?module=tambah_ongkir" class="btn btn-sm btn-info btn-flat pull-left">Tambah Biaya</a>
                                <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>