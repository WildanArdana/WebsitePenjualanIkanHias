 <!-- Start All Title Box -->
 <div class="all-title-box">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <h2>Produk</h2>
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
                <li class="breadcrumb-item active">Produk</li>
             </ul>
          </div>
       </div>
    </div>
 </div>
 <!-- End All Title Box -->

 <!-- Start Shop Page  -->
 <div class="shop-box-inner">
    <div class="container">
       <div class="row">
          <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
             <div class="product-categori">
                <div class="search-product">
                   <form action="#">
                      <input class="form-control" placeholder="Search here..." type="text">
                      <button type="submit"> <i class="fa fa-search"></i> </button>
                   </form>
                </div>
                <div class="filter-sidebar-left">
                   <div class="title-left">
                      <h3>Sort By</h3>
                   </div>
                   <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                      <a href="<?= $base_url; ?>?page=shop" class="list-group-item list-group-item-action"> Default </a>
                      <a href="<?= $base_url; ?>?page=shop&sortby=high" class="list-group-item list-group-item-action"> High Price → Low Price </a>
                      <a href="<?= $base_url; ?>?page=shop&sortby=low" class="list-group-item list-group-item-action"> Low Price → High Price</a>
                   </div>
                </div>
                <div class="filter-sidebar-left">
                   <div class="title-left">
                      <h3>Categories</h3>
                   </div>
                   <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                      <?php
                        $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                        while ($kat = mysqli_fetch_array($kueriKategori)) {
                        ?>
                         <?php
                           $id_kategori = $kat['id_kategori'];
                           $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE  id_kategori = $id_kategori");
                           $pro = mysqli_num_rows($kueriProduk);
                           ?>
                         <a href="<?= $base_url; ?>?page=shop&category=<?= $id_kategori ?>" class="list-group-item list-group-item-action"> <?= $kat['nama_kategori']; ?> <small class="text-muted">(<?= $pro; ?>) </small></a>
                      <?php
                        }
                        ?>
                   </div>
                </div>


             </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
             <div class="right-product-box">
                <div class="product-item-filter row">
                   <div class="col-12 col-sm-8 text-center text-sm-left">
                      <div class="toolbar-sorter-right">

                         <!-- <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option data-display="Select">Nothing</option>
                            <option value="2">High Price → High Price</option>
                            <option value="3">Low Price → High Price</option>
                         </select> -->
                      </div>
                      <p>Showing all 4 results</p>
                   </div>
                </div>

                <div class="row product-categorie-box">
                   <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                         <div class="row">
                            <?php
                              if (!empty($_GET['sortby'])) {
                                 if ($_GET['sortby'] == 'high') {
                                    $sortby = 'ORDER BY `harga_barang` DESC';
                                 } else if ($_GET['sortby'] == 'low') {
                                    $sortby = 'ORDER BY `harga_barang` ASC';
                                 }
                              } else {
                                 $sortby = '';
                              }


                              if (!empty($_GET['category'])) {

                                 $idk = $_GET['category'];
                                 $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id_kategori = '$idk' $sortby");
                              } else {
                                 $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_barang $sortby");
                              }

                              while ($pro = mysqli_fetch_array($kueriProduk)) {
                              ?>
                               <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                  <div class="products-single fix">
                                     <div class="box-img-hover">
                                        <div class="type-lb">
                                           <p class="sale">Sale</p>
                                        </div>
                                        <img src="<?= $base_url; ?>/admin/upload/<?= $pro['foto_barang']; ?>" class="img-fluid" alt="Image">
                                        <div class="mask-icon">
                                           <ul>
                                              <li><a href="<?= $base_url; ?>?page=detailproduk&produk=<?= $pro['id_barang']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
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
                </div>

             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- End Shop Page -->