<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$id_order = $_GET['ido'];

$queryorder = mysqli_query($koneksi, "SELECT * FROM tbl_customer,tbl_order WHERE tbl_customer.id_customer = tbl_order.id_customer AND id_order ='$id_order' ");
$order = mysqli_fetch_array($queryorder);
$id_customer = $order['id_customer'];

$id_biaya_kirim = $order['id_biaya_kirim'];
$queryKurir = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim JOIN tbl_jasa ON tbl_biaya_kirim.id_jasa = tbl_jasa.id_jasa JOIN tbl_kota ON tbl_biaya_kirim.id_kota = tbl_kota.id_kota WHERE tbl_biaya_kirim.id_biaya_kirim = $id_biaya_kirim");
$kurir = mysqli_fetch_array($queryKurir);
?>
<div class="content-body">

   <div class="container-fluid mt-3">
      <div class="content-wrapper">
         <section class="content-header">
            <h2>
               Detail Order
            </h2>
         </section>

         <section class="content">
            <div class="card">

               <div class="col-md-12">
                  <div class="box box-info">
                     <div class="box-header with-border">
                        <a href="<?= $admin_url; ?>asset/adminweb.php?module=pesanan" class="btn btn-primary text-white">Back</a>
                        <a href="<?= $admin_url; ?>module/pesanan/aksi_order.php?ido=<?= $id_order; ?>" class="btn btn-success text-white float-right" style="float:right; margin-left:10px; <?= ($order['status_order'] == 'Kirim') ? 'cursor: default; pointer-events: none; text-decoration: none; color:grey; ' : ''; ?>"> Kirim Produk Pesanan</a>
                        <h3 class="box-title">Rincian Pemesanan</h3>
                        <hr>
                     </div>
                     <div class="box-body">
                        <dt>No Pemesanan</dt>
                        <dd>#IDP0<?= $order['id_order']; ?></dd>
                        <dd>Status Order : (<?= $order['status_order']; ?>)</dd>
                        <dd>Tanggal Pemesanan : <?= date('d M Y', strtotime($order['tgl_order'])); ?></dd>
                        <dd>Tanggal Pengiriman :
                           <?= ($order['tgl_kirim'] == null) ? '-' : date('d M Y', strtotime($order['tgl_kirim'])); ?>
                        </dd>
                        <hr>
                        <dt>Alamat Pengiriman</dt>
                        <dd><?= $order['nama']; ?></dd>
                        <dd> <?= $order['no_hp']; ?></dd>
                        <dd> <?= $order['alamat']; ?></dd>
                        <hr>
                        <dt> Status Pengiriman</dt>
                        <dd> Pengiriman - <?= $kurir['nama_jasa']; ?> : Rp. <?php echo number_format($order['biaya_kirim'], 0, '', '.'); ?></dd>
                        <dd> Tujuan Kota - <?= $kurir['nama_kota']; ?></dd>
                        <hr>
                        <dt>Produk Pemesanan</dt>
                        <div class="row">
                           <?php
                           $id_order = $order['id_order'];
                           $query_produk = mysqli_query(
                              $koneksi,
                              "SELECT * FROM tbl_barang JOIN tbl_detail_order ON tbl_barang.id_barang = tbl_detail_order.id_produk  WHERE tbl_detail_order.id_order = '$id_order' "
                           );
                           while ($dp = mysqli_fetch_assoc($query_produk)) {

                           ?>
                              <div class="col-sm-3 col-md-2 mt-2">
                                 <div class="shadow p-3" style="border: 1px solid #d2d6de; height: 300px;">
                                    <span class="info-box-icon"> <img src="<?php echo $admin_url . 'upload/' . $dp['foto_barang']; ?>" class="w-100" /></span>
                                    <div class="info-box-content mt-3">
                                       <dd class="font-weight-bold"><?= $dp['nama_barang']; ?></dd>
                                       <dd>Jumlah : <?= $dp['jumlah_produk']; ?>x</dd>
                                       <dd>Harga Satuan : Rp. <?php echo number_format($dp['harga_satuan'], 0, '', '.'); ?></dd>
                                       <dd>Sub Total untuk Produk : Rp. <?php echo number_format($dp['total_harga_produk'], 0, '', '.'); ?></dd>
                                    </div><!-- /.info-box-content -->
                                 </div><!-- /.info-box -->
                              </div><!-- /.col -->
                           <?php
                           } ?>
                        </div><!-- /.row -->
                        <hr>
                        <dt> Catatan</dt>
                        <dd> <?= (!empty($order['invoice'])) ? $order['invoice'] : '-'; ?></dd>
                        <hr>
                        <dt>Detail Pembayaran</dt>
                        <dd>Total Produk : Rp. <?php echo number_format($order['biaya_kirim'], 0, '', '.'); ?></dd>
                        <dd>Total Pengiriman : Rp. <?php echo number_format($order['biaya_produk'], 0, '', '.'); ?></dd>
                        <dd>Total Pembayaran (<?= $order['status_bayar']; ?>): Rp. <?php echo number_format($order['total_biaya'], 0, '', '.'); ?></dd>
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
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Laporan Pemesanan</h4>
               </div>
               <form action="../admin/module/pesanan/aksi_laporan.php" method="post">
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