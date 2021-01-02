<?php
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
   echo    "<script>
   window.location = '$base_url'+'?page=login';
   </script>";
}

$id_order = $_GET['ido'];

$queryorder = mysqli_query($koneksi, "SELECT * FROM tbl_customer,tbl_order WHERE tbl_customer.id_customer = tbl_order.id_customer AND id_order ='$id_order' ");
$order = mysqli_fetch_array($queryorder);
$id_customer = $order['id_customer'];

$id_biaya_kirim = $order['id_biaya_kirim'];
$queryKurir = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim JOIN tbl_jasa ON tbl_biaya_kirim.id_jasa = tbl_jasa.id_jasa JOIN tbl_kota ON tbl_biaya_kirim.id_kota = tbl_kota.id_kota WHERE tbl_biaya_kirim.id_biaya_kirim = $id_biaya_kirim");
$kurir = mysqli_fetch_array($queryKurir);
?>
<!-- Start All Title Box -->
<div class="all-title-box">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2>Detail Order</h2>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= $base_url; ?>?page=profile&menu=profile">My Account</a></li>
               <li class="breadcrumb-item text-capitalize"><a href="<?= $base_url; ?>?page=profile&menu=<?= $_GET['menu']; ?>"><?= $_GET['menu']; ?></a></li>
               <li class="breadcrumb-item active">Detail Order</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- End All Title Box -->

<!-- My Account Start -->
<div class="my-account-box-main">
   <div class="container">

      <div class="shadow border p-5">
         <?php if ($order['status_order'] == 'Kirim') : ?>
            <a href="<?= $base_url; ?>/aksi/aksi_selesai.php?ido=<?= $order['id_order']; ?>" class="btn btn-success font-weight-bold text-white">Konfirmasi Terima</a>
         <?php endif; ?>
         <h2 class="font-weight-bold text-center">Nota Pemesanan #IDP0<?= $order['id_order']; ?> </h2>
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
               <div class="col-sm-3 col-md-3 mt-3">
                  <div class="shadow p-3" style="border: 1px solid #d2d6de;">
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

<!-- My Account End -->