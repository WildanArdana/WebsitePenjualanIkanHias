<!-- Start All Title Box -->
<div class="all-title-box">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2>Cart</h2>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="">Shop</a></li>
               <li class="breadcrumb-item active">Cart</li>
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
         <div class="col-lg-12">
            <div class="table-main table-responsive">
               <table class="table border">
                  <thead>
                     <tr>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $sid = session_id();
                     $kueriCart =  mysqli_query($koneksi, "SELECT * FROM tbl_keranjang,tbl_barang WHERE tbl_keranjang.id_session = '$sid' AND  tbl_keranjang.id_barang = tbl_barang.id_barang ");
                     $jml = mysqli_num_rows($kueriCart);
                     ?>
                     <?php if (empty($jml)) : ?>
                        <tr>
                           <td colspan="6">
                              <center>Keranjang Kosong</center>
                           </td>
                        </tr>
                     <?php else : ?>
                        <?php
                        $i = 0;
                        while ($card = mysqli_fetch_array($kueriCart)) {
                           $subtotal = $card['harga'] *  $card['jumlah'];
                           $i++;
                           $hargatotal[$i] = $subtotal;
                        ?>
                           <tr>
                              <td class="thumbnail-img">
                                 <a href="<?= $base_url; ?>?page=detailproduk&produk=<?= $card['id_barang']; ?>">
                                    <img class="img-fluid" src="<?= $admin_url ?>/upload/<?= $card['foto_barang']; ?>" alt="" />
                                 </a>
                              </td>
                              <td class="name-pr">
                                 <a href="<?= $base_url; ?>?page=detailproduk&produk=<?= $card['id_barang']; ?>">
                                    <?= $card['nama_barang']; ?>
                                 </a>
                              </td>
                              <td class="price-pr">
                                 <p>Rp. <?= number_format($card['harga_barang'], 0, '', '.'); ?></p>
                              </td>

                              <td class="quantity-box">
                                 <p><?= $card['jumlah']; ?></p>
                                 <!-- <input type="number" size="4" value="0" min="0" step="1" class="c-input-text qty text"> -->
                              </td>
                              <td class="total-pr">
                                 <p>
                                    Rp. <?= number_format($card['jumlah'] * $card['harga_barang'], 0, '', '.'); ?>
                                 </p>
                              </td>
                              <td class="remove-pr">
                                 <a href="<?= $base_url; ?>/aksi/aksi_keranjang.php?prod=<?= $card['id_barang']; ?>&delete">
                                    <i class="fas fa-times"></i>
                                 </a>
                              </td>
                           </tr>
                        <?php
                        }
                        ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <!-- <div class="row my-5">
         <div class="col-lg-6 col-sm-6">
            <div class="coupon-box">
               <div class="input-group input-group-sm">
                  <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                  <div class="input-group-append">
                     <button class="btn btn-theme" type="button">Apply Coupon</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-sm-6">
            <div class="update-box">
               <input value="Update Cart" type="submit">
            </div>
         </div>
      </div> -->
      <?php if (!empty($jml)) : ?>
         <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12 border p-3">
               <div class="order-box">
                  <h3>Order summary</h3>
                  <div class="d-flex">
                     <h4>Sub Total</h4>
                     <div class="ml-auto font-weight-bold"> Rp. <?php echo number_format(array_sum($hargatotal), 0, '', '.'); ?> </div>
                  </div>
                  <hr class="my-1">
                  <div class="d-flex">
                     <h4>Coupon Discount</h4>
                     <div class="ml-auto font-weight-bold"> Rp. 0 </div>
                  </div>
                  <hr>
                  <div class="d-flex gr-total">
                     <h5>Grand Total</h5>
                     <div class="ml-auto h5"> Rp. <?php echo number_format(array_sum($hargatotal), 0, '', '.'); ?> </div>
                  </div>
               </div>
            </div>
            <div class="col-12 d-flex shopping-box mt-3">
               <button class="ml-auto btn hvr-hover text-white" onclick="window.location.href='<?= $base_url; ?>?page=checkout'" <?= (empty($jml)) ? 'disabled' :  ''; ?>>Checkout</button>
            </div>
         </div>
      <?php endif; ?>
   </div>
</div>
<!-- End Cart -->