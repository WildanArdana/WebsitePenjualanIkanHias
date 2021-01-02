<?php
$id_produk = $_GET['produk'];
$kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id_barang = '$id_produk'");
$pro = mysqli_fetch_array($kueriProduk);

$id_kategori = $pro['id_kategori'];
$kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE id_kategori = '$id_kategori'");
$kat = mysqli_fetch_array($kueriKategori);
?>

<!-- Start All Title Box -->
<div class="all-title-box">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2>Produk Detail</h2>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= $base_url; ?>?page=shop">Produk</a></li>
               <li class="breadcrumb-item active">Produk Detail </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
   <div class="container">
      <div class="row">
         <div class="col-xl-5 col-lg-5 col-md-6">
            <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
               <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active"> <img class="d-block w-100" src="<?= $admin_url; ?>/upload/<?= $pro['foto_barang']; ?>" alt="First slide"> </div>
               </div>
            </div>
         </div>
         <div class="col-xl-7 col-lg-7 col-md-6">
            <div class="single-product-details">
               <h2><?= $pro['nama_barang']; ?></h2>
               <h5>Rp. <?= number_format($pro['harga_barang'], 0, '', '.'); ?></h5>
               <p class="available-stock"><span> Kategori <a href="<?= $base_url; ?>?page=shop&category=<?= $id_kategori ?>"> <?= $kat['nama_kategori']; ?> </a></span>
                  <!-- <p class="available-stock"><span> More than 10 available / <a href="#">8 sold </a></span> -->
                  <p>
                     <h4>Short Description:</h4>
                     <p><?= $pro['deskripsi_barang']; ?> </p>

                     <form action="<?= $base_url; ?>/aksi/aksi_keranjang.php" method="GET">
                        <input type="hidden" name="prod" value="<?= $pro['id_barang']; ?>">
                        <input type="hidden" name="harga" value="<?= $pro['harga_barang']; ?>">
                        <div class="price-box-bar">
                           <div class="cart-and-bay-btn">
                              <button class="btn hvr-hover text-white" type="submit">Add to cart</button>
                              <!-- <a class="btn hvr-hover" data-fancybox-close="" href="<?= $base_url; ?>/aksi/aksi_keranjang.php?prod=<?= $pro['id_barang']; ?>&harga=<?= $pro['harga_barang']; ?>">Add to cart</a> -->
                           </div>
                        </div>
                     </form>
                  </p>
            </div>
         </div>
      </div>

      <div class="row my-5">
         <div class="col-lg-12">
            <div class="title-all text-center">
               <h1>Featured Products</h1>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
            </div>
            <div class="featured-products-box owl-carousel owl-theme">
               <?php
               $kueriProduks = mysqli_query($koneksi, "SELECT * FROM tbl_barang");
               while ($pros = mysqli_fetch_array($kueriProduks)) {
               ?>
                  <div class="item m-5">
                     <div class="products-single fix">
                        <div class="box-img-hover">
                           <img src="<?= $admin_url; ?>/upload/<?= $pros['foto_barang']; ?>" class="img-fluid" alt="Image">
                           <div class="mask-icon">
                              <ul>
                                 <li><a href="<?= $base_url; ?>?page=detailproduk&produk=<?= $pros['id_barang']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                              </ul>
                              <a class="cart" href="<?= $base_url; ?>/aksi/aksi_keranjang.php?prod=<?= $pros['id_barang']; ?>&harga=<?= $pros['harga_barang']; ?>">Add to Cart</a>
                           </div>
                        </div>
                        <div class="why-text">
                           <h4><?= $pros['nama_barang']; ?></h4>
                           <h5>Rp. <?= number_format($pros['harga_barang'], 0, '', '.'); ?></h5>
                        </div>
                     </div>
                  </div>
               <?php
               } ?>

            </div>
         </div>
      </div>

   </div>
</div>
<!-- End Cart -->