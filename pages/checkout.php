<?php
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
   echo    "<script>
   window.location = '$base_url'+'?page=login&checkout';
   </script>";
}
?>


<!-- Start All Title Box -->
<div class="all-title-box">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2>Checkout</h2>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Shop</a></li>
               <li class="breadcrumb-item active">Checkout</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
   <div class="container">

      <div class="row">
         <div class="col-sm-6 col-lg-6 mb-3">
            <div class="checkout-address">
               <div class="title-left">
                  <h3>Data Customer</h3>
               </div>
               <form class="needs-validation" novalidate>
                  <div class="mb-3">
                     <label for="username">username</label>
                     <div class="input-group">
                        <input type="text" class="form-control border-0" id="username" value="<?= $user['username']; ?>" disabled>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="nama">Nama Lengkap</label>
                     <div class="input-group">
                        <input type="text" class="form-control border-0" id="nama" value="<?= $user['nama']; ?>" disabled>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="hp">No Telp</label>
                     <div class="input-group">
                        <input type="text" class="form-control border-0" id="hp" value="<?= $user['no_hp']; ?>" disabled>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="email">Email</label>
                     <div class="input-group">
                        <input type="text" class="form-control border-0" id="email" value="<?= $user['email']; ?>" disabled>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="alamat">Alamat</label>
                     <div class="input-group">
                        <input type="text" class="form-control border-0" id="alamat" value="<?= $user['alamat']; ?>" disabled>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="kota">Kota</label>
                     <?php
                     $id_kota = $user['id_kota'];
                     $kueriKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota WHERE id_kota = $id_kota");
                     $kota = mysqli_fetch_array($kueriKota);
                     ?>
                     <div class="input-group">
                        <input type="text" class="form-control border-0" id="kota" value="<?= $kota['nama_kota']; ?>" disabled>
                     </div>
                  </div>

                  <hr class="mb-4">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" id="same-address" checked>
                     <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" class="custom-control-input" id="save-info" checked>
                     <label class="custom-control-label" for="save-info">Save this information for next time</label>
                  </div>
                  <hr class="mb-4">
                  <div class="title"> <span>Payment</span> </div>
                  <div class="d-block my-3">
                     <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Pay-Saldo (Rp. <?= number_format($user['saldo'], 0, '', '.'); ?>)</label>
                     </div>
                     <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" required disabled>
                        <label class="custom-control-label" for="credit">Credit card</label>
                     </div>
                     <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required disabled>
                        <label class="custom-control-label" for="debit">Debit card</label>
                     </div>
                     <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required disabled>
                        <label class="custom-control-label" for="paypal">Paypal</label>
                     </div>
                  </div>

                  <hr class="mb-1">
               </form>
            </div>
         </div>
         <div class="col-sm-6 col-lg-6 mb-3">
            <div class="row">
               <div class="col-md-12 col-lg-12">
                  <div class="shipping-method-box">
                     <div class="title-left">
                        <h3>Shipping Method (yang tersedia)</h3>
                     </div>
                     <form action="" method="POST">
                        <div class="mb-4 row">
                           <div class="mb-3 col-6">
                              <select class="wide w-100 custom-control" id="country" name="ongkir">
                                 <option value="" data-display="Select">Choose...</option>
                                 <?php
                                 $id_kota = $user['id_kota'];
                                 $kueriOngkir = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim,tbl_jasa WHERE id_kota = $id_kota AND tbl_biaya_kirim.id_jasa = tbl_jasa.id_jasa");
                                 while ($ongkir = mysqli_fetch_array($kueriOngkir)) {

                                 ?>
                                    <option value="<?= $ongkir['id_biaya_kirim']; ?>"><?= $ongkir['nama_jasa']; ?> (Rp. <?= number_format($ongkir['biaya'], 0, '', '.'); ?>) </option>
                                 <?php
                                 } ?>
                              </select>
                           </div>
                           <div class="col-4">
                              <button type="submit" class="ml-auto btn hvr-hover text-white">Pilih</button>
                           </div>

                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-md-12 col-lg-12">
                  <div class="odr-box">
                     <div class="title-left">
                        <h3>Shopping cart</h3>
                     </div>
                     <div class="rounded p-2 bg-light">
                        <?php
                        $sid = session_id();
                        $kueriCart =  mysqli_query($koneksi, "SELECT * FROM tbl_keranjang,tbl_barang WHERE tbl_keranjang.id_session = '$sid' AND  tbl_keranjang.id_barang = tbl_barang.id_barang ");
                        $jml = mysqli_num_rows($kueriCart);
                        ?>
                        <?php
                        $i = 0;
                        while ($card = mysqli_fetch_array($kueriCart)) {
                           $subtotal = $card['harga'] *  $card['jumlah'];
                           $i++;
                           $hargatotal[$i] = $subtotal;
                        ?>
                           <div class="media mb-2 border-bottom">
                              <div class="media-body"> <a href="detail.html"> <?= $card['nama_barang']; ?></a>
                                 <div class="small text-muted">Price: Rp. <?= number_format($card['harga_barang'], 0, '', '.'); ?> <span class="mx-2">|</span> Qty: <?= $card['jumlah']; ?> <span class="mx-2">|</span> Subtotal: Rp. <?= number_format($card['jumlah'] * $card['harga_barang'], 0, '', '.'); ?></div>
                              </div>
                           </div>
                        <?php
                        }
                        ?>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-12">
                  <div class="order-box">
                     <div class="title-left">
                        <h3>Your order</h3>
                     </div>
                     <div class="d-flex">
                        <div class="font-weight-bold">Product</div>
                        <div class="ml-auto font-weight-bold">Total</div>
                     </div>
                     <hr class="my-1">
                     <div class="d-flex">
                        <h4>Sub Total</h4>
                        <div class="ml-auto font-weight-bold">
                           <?php
                           if (empty($hargatotal)) {
                              $hargatotal[0] = 0;
                           }
                           ?>
                           Rp. <?php echo number_format($total_harga_produk = array_sum($hargatotal), 0, '', '.'); ?>
                        </div>
                     </div>
                     <div class="d-flex">
                        <h4>Discount</h4>
                        <div class="ml-auto font-weight-bold"> Rp. 0 </div>
                     </div>
                     <hr class="my-1">
                     <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <?php
                        if (!empty($_POST['ongkir'])) {
                           $id_biaya_kirim = $_POST['ongkir'];
                           $kueriBiayaKirim = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim WHERE id_biaya_kirim = '$id_biaya_kirim' ");
                           $bk = mysqli_fetch_array($kueriBiayaKirim);
                        }
                        ?>
                        <div class="ml-auto font-weight-bold">Rp. <?php echo number_format($ongkir = (!empty($_POST['ongkir'])) ? $bk['biaya'] : 0, 0, '', '.'); ?></div>
                     </div>
                     <hr>
                     <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5">Rp. <?php echo number_format($total_harga_produk + $ongkir, 0, '', '.'); ?> </div>
                     </div>
                     <hr>
                  </div>
               </div>
               <div class="col-sm-12 col-lg-12 mb-3">
                  <div class="checkout-address">
                     <form action="aksi/aksi_order.php" method="POST">
                        <div class="mb-3">
                           <label for="invoice">Catatan</label>
                           <div class="input-group">
                              <textarea class="form-control w-100" name="invoice" id="invoice" cols="30" rows="10"></textarea>
                           </div>
                        </div>
                        <input type="hidden" name="id_biaya_kirim" value="<?= $bk['id_biaya_kirim']; ?>">
                        <input type="hidden" name="total_harga_produk" value="<?= $total_harga_produk; ?>">
                        <input type="hidden" name="biaya_ongkir" value="<?= $ongkir; ?>">

                        <button class="ml-auto btn hvr-hover text-white" type="submit" style="float: right;" name="submit">Place Order</button>
                        <!-- <button class="ml-auto btn hvr-hover text-white" onclick="window.location.href='<?= $base_url; ?>?page=checkout'" <?= (empty($_POST['ongkir']) || empty($jml)) ? 'disabled' :  ''; ?>>Place Order</button> -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>
<!-- End Cart -->