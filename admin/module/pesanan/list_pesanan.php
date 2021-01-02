<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
?>
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="content-wrapper">
            <section class="content-header">
                <h2>
                    Manajemen Pesanan
                </h2>
            </section>

            <section class="content">
                <div class="card">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">List Pesanan</h3>
                                <div class="box-tools pull-right">
                                    <a class="btn btn-success text-white" data-toggle="modal" data-target="#laporan">Cetak Laporan</a>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>ID Order</th>
                                                <th>Dari</th>
                                                <th>Status</th>
                                                <th>Tanggal Order</th>
                                                <th>Status Pembayaran</th>
                                                <th style="width: 110px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $kueri_order = mysqli_query($koneksi, "SELECT * FROM tbl_order,tbl_customer WHERE tbl_order.id_customer = tbl_customer.id_customer");
                                            while ($pro = mysqli_fetch_array($kueri_order)) {
                                            ?>
                                                <tr>
                                                    <td>#IDP0<?php echo $pro['id_order']; ?></td>
                                                    <td><a href="<?php $admin_url; ?>adminweb.php?module=detail_member&idm=<?php echo $pro['id_customer']; ?>"><?php echo $pro['username']; ?></a> </td>
                                                    <td><?php echo $pro['status_order']; ?></td>
                                                    <td><?php echo $pro['tgl_order']; ?></td>
                                                    <td><?php echo $pro['status_bayar']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?php $admin_url; ?>adminweb.php?module=detail_order&ido=<?php echo $pro['id_order']; ?>" class="btn btn-primary"><i class='fa fa-archive'></i>&nbsp; Detail Order</button></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-footer clearfix">
                                    <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade" id="laporan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Laporan Pemesanan</h4>
                    </div>
                    <form action="<?= $admin_url; ?>module/pesanan/laporan.php" method="get">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="mulai" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="selesai" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>