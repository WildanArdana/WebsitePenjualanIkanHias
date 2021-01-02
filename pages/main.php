<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-left">
            <img src="<?= $base_url; ?>/asset/images/banner/2.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="<?= $base_url; ?>/asset/images/banner/3.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-right">
            <img src="<?= $base_url; ?>/asset/images/banner/5.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->



<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <a class="active btn btn-dark" href="<?= $base_url; ?>">All</a>
                        <a class="btn btn-danger" href="<?= $base_url; ?>?produk=top">Top featured</a>
                        <!-- <a href="<?= $base_url; ?>?produk=best">Best seller</a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <?php
            if (empty($_GET['produk'])) {
                $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_barang ORDER BY `id_barang` DESC");
            } else {
                if ($_GET['produk'] == 'top') {
                    $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE rekomendasi = 'Y' ");
                }
            }

            while ($pro = mysqli_fetch_array($kueriProduk)) {
            ?>
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="<?= $admin_url; ?>/upload/<?= $pro['foto_barang']; ?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="<?= $base_url; ?>?page=detailproduk&produk=<?= $pro['id_barang']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="<?= $base_url; ?>/aksi/aksi_keranjang.php?prod=<?= $pro['id_barang']; ?>&harga=<?= $pro['harga_barang']; ?>">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?= $pro['nama_barang']; ?></h4>
                            <h5>Rp. <?= number_format($pro['harga_barang'], 0, '', '.'); ?></h5>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Produk</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_barang ORDER BY `id_barang` DESC");
            while ($pro = mysqli_fetch_array($kueriProduk)) {
            ?>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid w-100" src="<?= $admin_url; ?>/upload/<?= $pro['foto_barang']; ?>" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3><?= $pro['nama_barang']; ?></h3>
                                <p><?= $pro['deskripsi_barang']; ?></p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
        </div>
    </div>
</div>
<!-- End Blog  -->