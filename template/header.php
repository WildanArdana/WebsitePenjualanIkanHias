<?php
include 'lib/config.php';
include 'lib/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Hero FISH</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= $base_url; ?>/asset/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= $base_url; ?>/asset/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>/asset/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>/asset/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>/asset/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>/asset/css/custom.css">

    <!--[if lt IE 9]>
      <script src="<?= $base_url; ?>/asset/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?= $base_url; ?>/asset/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?= $base_url; ?>"><img src="<?= $base_url; ?>/asset/images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item <?= ($_GET['page'] == '') ? 'active' : ''; ?>"><a class="nav-link" href="<?= $base_url; ?>">Home</a></li>
                        <li class="dropdown megamenu-fw <?= ($_GET['page'] == 'shop' || $_GET['page'] == 'detailproduk') ? 'active' : ''; ?>">
                            <a href="#" class="nav-link  dropdown-toggle" data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">ALL</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="<?= $base_url; ?>?page=shop">All Produk</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                        $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                        while ($kat = mysqli_fetch_array($kueriKategori)) {
                                        ?>
                                            <div class="col-menu col-md-3">
                                                <h6 class="title"><?= $kat['nama_kategori']; ?></h6>
                                                <div class="content">
                                                    <ul class="menu-col">
                                                        <?php
                                                        $id_kategori =  $kat['id_kategori'];
                                                        $kueriProduk = mysqli_query($koneksi, "SELECT * FROM `tbl_barang` WHERE `id_kategori` =  $id_kategori ");
                                                        while ($pro = mysqli_fetch_array($kueriProduk)) {
                                                        ?>
                                                            <li><a href="<?= $base_url; ?>?page=detailproduk&produk=<?= $pro['id_barang']; ?>"><?= $pro['nama_barang']; ?></a></li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown <?= ($_GET['page'] == 'cart' || $_GET['page'] == 'checkout') ? 'active' : ''; ?>">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Shop</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $base_url; ?>?page=cart">Cart</a></li>
                                <li><a href="<?= $base_url; ?>?page=checkout">Checkout</a></li>
                                <li><a href="<?= $base_url; ?>?page=profile">My Account</a></li>
                            </ul>
                        </li>
                        <?php

                        if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) { ?>
                            <li class="nav-item <?= ($_GET['page'] == 'daftar') ? 'active' : ''; ?>"><a class="nav-link" href="<?= $base_url; ?>?page=daftar">Daftar</a></li>
                            <li class="nav-item <?= ($_GET['page'] == 'login') ? 'active' : ''; ?>"><a class="nav-link" href="<?= $base_url; ?>?page=login">Login</a></li>
                        <?php
                        } else {
                            $user = $_SESSION['namauser'];
                            $queryMember = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username ='$user' ");
                            $user = mysqli_fetch_array($queryMember);
                        ?>
                            <li class="dropdown <?= ($_GET['page'] == 'profile' || $_GET['page'] == 'detail_order') ? 'active' : ''; ?>">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $user['username']; ?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= $base_url; ?>?page=profile">My Account</a></li>
                                    <li><a href="<?= $base_url; ?>?page=profile&menu=order">My Order</a></li>
                                    <li><a href="<?= $base_url; ?>?page=profile&menu=history">Riwayat Order</a></li>
                                    <li><a href="<?= $base_url; ?>?page=profile&menu=topup">Top Up Saldo</a></li>
                                </ul>
                            </li>
                            <!-- <li class="nav-item <?= ($_GET['page'] == 'profile') ? 'active' : ''; ?>"><a class="nav-link" href="<?= $base_url; ?>?page=profile"><?= $user['username']; ?></a></li> -->
                            <li class="nav-item "><a class="nav-link" href="<?= $base_url; ?>/aksi/aksi_logout.php">Logout</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <?php
                $sid = session_id();
                $kueriCart =  mysqli_query($koneksi, "SELECT * FROM tbl_keranjang,tbl_barang WHERE tbl_keranjang.id_session = '$sid' AND  tbl_keranjang.id_barang = tbl_barang.id_barang ");
                $jml = mysqli_num_rows($kueriCart);
                ?>
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge"><?= $jml; ?></span>
                            </a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>

            <?php if (!empty($jml)) : ?>
                <!-- Start Side Menu -->
                <div class="side">
                    <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                    <li class="cart-box">
                        <ul class="cart-list">
                            <?php
                            $i = 0;
                            while ($card = mysqli_fetch_array($kueriCart)) {
                                $subtotal = $card['harga'] *  $card['jumlah'];
                                $i++;
                                $hargatotal[$i] = $subtotal;
                            ?>
                                <li>
                                    <a href="#" class="photo"><img src="<?= $admin_url; ?>/upload/<?= $card['foto_barang']; ?>" class="cart-thumb" alt="" /></a>
                                    <h6><a href="#"><?= $card['nama_barang']; ?> </a></h6>
                                    <p><?= $card['jumlah']; ?>x - <span class="price">Rp. <?= number_format($card['harga_barang'], 0, '', '.'); ?></span></p>
                                </li>

                            <?php
                            }
                            ?>
                            <li class="total">
                                <a href="<?= $base_url; ?>?page=cart" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                                <span class="float-right"><strong>Total</strong>: Rp. <?php echo number_format(array_sum($hargatotal), 0, '', '.'); ?></span>
                            </li>
                        </ul>
                    </li>
                </div>
            <?php endif; ?>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->