<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$invoice = $_GET['invoice'];
$QueryEdit = mysqli_query($koneksi, "SELECT do.invoice as invoice, o.status_order as status FROM tbl_Detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order WHERE do.invoice = '$invoice'");
$rowEdit = mysqli_fetch_array($QueryEdit);

if ($rowEdit['status'] == 'P') {
    $status = 'Dalam Proses';
} elseif ($rowEdit['status'] == 'K') {
    $status = 'Dalam Pengiriman';
} elseif ($rowEdit['status'] == 'S') {
    $status = 'Selesai';
}
$inv = $rowEdit['invoice'];

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pesanan
            <small>Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li class="active">Kategori</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Pesanan</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../admin/module/pesanan/aksi_edit.php" method="POST">
                        <div class="box-body">
                            <?php echo isset($message['edit']) ? $message['edit'] : ''; ?>
                            <div class="form-group">
                                <label for="invoice" class="col-sm-2 control-label">Invoice</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $inv; ?>" disabled>
                                    <input type="hidden" class="form-control" name="invoice" value="<?= $inv; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Pesanan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status">
                                        <option value="<?= $rowEdit['status_order']; ?>"><?= $status; ?></option>
                                        <option value="P">Sedang DiProses</option>
                                        <option value="K">Sedang DiKirim</option>
                                        <option value="S">Pesanan Sudah Selesai</option>
                                    </select>
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

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Pesanan</h3>
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
                                        <th colspan="2">Items</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $QueryCart = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order INNER JOIN tbl_produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");
                                    while ($row = mysqli_fetch_array($QueryCart)) {
                                    ?>
                                        <tr>
                                            <td class="cart_product" style="margin: 10px 20px">
                                                <img src="<?= $base_url; ?>admin/upload/<?= $row['gambar'] ?>" width="150">
                                            </td>
                                            <td class="cart_description">
                                                <h4><?= $row['nama_produk'] ?></h4>
                                            </td>
                                            <td class="cart_price">
                                                <p>Rp <?= number_format($row['harga']) ?></p>
                                            </td>
                                            <td class="cart_quantity">
                                                <p><?= $row['jumlah'] ?></p>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">Rp <?= number_format($row['harga'] * $row['jumlah']) ?></p>
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