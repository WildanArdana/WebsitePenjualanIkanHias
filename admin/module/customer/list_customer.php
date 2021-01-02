<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
?>
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="content-wrapper">
            <section class="content-header">
                <h2>
                    Manajemen Customer
                </h2>
            </section>

            <section class="content">
                <div class="card">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">List Customer</h3>
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
                                                <th>Nama Member</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>No Telp</th>
                                                <th>Kota</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $QueryKategori = mysqli_query($koneksi, "SELECT * FROM tbl_customer tm INNER JOIN tbl_kota tk ON tm.id_kota = tk.id_kota GROUP BY tm.id_customer ASC");
                                            while ($row = mysqli_fetch_array($QueryKategori)) {
                                            ?>
                                                <tr>
                                                    <td><?= $row['nama']; ?></td>
                                                    <td><?= $row['username']; ?></td>
                                                    <td><?= $row['email']; ?></td>
                                                    <td><?= $row['no_hp']; ?></td>
                                                    <td><?= $row['nama_kota']; ?></td>
                                                    <td><?= $row['alamat']; ?></td>
                                                    <td>
                                                        <?= ($row['status'] == 1) ? 'active' : 'inactive'; ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?= $admin_url; ?>adminweb.php?module=edit_customer&id_customer=<?= $row['id_customer']; ?>">
                                                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>