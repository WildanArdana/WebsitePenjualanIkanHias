<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hero Fish</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="gradient-6">
                <div class="brand-logo">
                    <a href="index.html">
                        <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                        <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                        <span class="brand-title">
                            <h3>
                                <font face="Courier New" color="white">Hero Fish</font>
                            </h3>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <?php
                        $sql_notif = mysqli_query($koneksi, "SELECT * FROM tbl_notifikasi_admin WHERE status_notif = 'belum terbaca'");
                        $jml = mysqli_num_rows($sql_notif);
                        ?>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2"><?= $jml; ?></span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><?= $jml; ?> New Notifications</span>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php
                                        while ($ntf = mysqli_fetch_array($sql_notif)) {
                                            if ($ntf['type_notif'] == '1') {
                                                $icon = 'fa-dollar text-white';
                                            } else  if ($ntf['type_notif'] == '2') {
                                                $icon = 'fa-shopping-cart text-white';
                                            }

                                        ?>
                                            <li>
                                                <a href="<?= $admin_url; ?>module/pesanan/aksi_notif.php?id_notif=<?= $ntf['id_notif']; ?>&id_order=<?= $ntf['id_order']; ?>">
                                                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="fa <?= $icon; ?> "></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading"><?= $ntf['judul_notif']; ?></h6>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>


                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                                <span>English</span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="../index.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="adminweb.php?module=home" aria-expanded="false">
                            <i class="fa fa-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="adminweb.php?module=customer" aria-expanded="false">
                            <i class="fa fa-user menu-icon"></i><span class="nav-text">Customer</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=pesanan" aria-expanded="false">
                            <i class="fa fa-shopping-cart menu-icon"></i><span class="nav-text">Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=kategori" aria-expanded="false">
                            <i class="fa fa-th menu-icon"></i><span class="nav-text">Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=produk" aria-expanded="false">
                            <i class="fa fa-bars menu-icon"></i><span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=kota" aria-expanded="false">
                            <i class="fa fa-bank menu-icon"></i><span class="nav-text">Kota</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=jasa" aria-expanded="false">
                            <i class="fa fa-motorcycle menu-icon"></i><span class="nav-text">Jasa Kirim</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=ongkir" aria-expanded="false">
                            <i class="fa fa-money menu-icon"></i><span class="nav-text">Biaya Kirim</span>
                        </a>
                    </li>
                    <li>
                        <a href="../module/logout/logout.php" aria-expanded="false">
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        //home
        if ($_GET['module'] == 'home') {
            include "../module/home/home.php";
            //kategori
        } elseif ($_GET['module'] == 'kategori') {
            include "../module/kategori/list_kategori.php";
        } elseif ($_GET['module'] == 'tambah_kategori') {
            include "../module/kategori/form_tambah.php";
        } elseif ($_GET['module'] == 'edit_kategori') {
            include "../module/kategori/form_edit.php";
            //
        } elseif ($_GET['module'] == 'merk') {
            include "module/merk/list_merk.php";
        } elseif ($_GET['module'] == 'tambah_merk') {
            include "module/merk/form_tambah.php";
        } elseif ($_GET['module'] == 'edit_merk') {
            include "module/merk/form_edit.php";
            //produk
        } elseif ($_GET['module'] == 'produk') {
            include "../module/produk/list_produk.php";
        } elseif ($_GET['module'] == 'tambah_produk') {
            include "../module/produk/form_tambah.php";
        } elseif ($_GET['module'] == 'edit_produk') {
            include "../module/produk/form_edit.php";
            //kota
        } elseif ($_GET['module'] == 'kota') {
            include "../module/kota/list_kota.php";
        } elseif ($_GET['module'] == 'tambah_kota') {
            include "../module/kota/form_tambah.php";
        } elseif ($_GET['module'] == 'edit_kota') {
            include "../module/kota/form_edit.php";
            //jasa kirim
        } elseif ($_GET['module'] == 'jasa') {
            include "../module/jasa/list_jasa.php";
        } elseif ($_GET['module'] == 'tambah_jasa') {
            include "../module/jasa/form_tambah.php";
        } elseif ($_GET['module'] == 'edit_jasa') {
            include "../module/jasa/form_edit.php";
            //biaya kirim
        } elseif ($_GET['module'] == 'ongkir') {
            include "../module/biaya/list_ongkir.php";
        } elseif ($_GET['module'] == 'tambah_ongkir') {
            include "../module/biaya/form_tambah.php";
        } elseif ($_GET['module'] == 'edit_ongkir') {
            include "../module/biaya/form_edit.php";
            //customer
        } elseif ($_GET['module'] == 'customer') {
            include "../module/customer/list_customer.php";
        } elseif ($_GET['module'] == 'edit_customer') {
            include "../module/customer/edit_customer.php";
            // pesanan
        } elseif ($_GET['module'] == 'pesanan') {
            include "../module/pesanan/list_pesanan.php";
        } elseif ($_GET['module'] == 'edit_pesanan') {
            include "../module/pesanan/form_edit.php";
        } elseif ($_GET['module'] == 'detail_order') {
            include "../module/pesanan/detail_order.php";
        } else {
            include "../module/home/home.php";
        } ?>
        <!--**********************************
            Footer start
        ***********************************-->
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <script src="plugins/common/common.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/gleek.js"></script>
        <script src="js/styleSwitcher.js"></script>

        <!-- Chartjs -->
        <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
        <!-- Circle progress -->
        <script src="./plugins/circle-progress/circle-progress.min.js"></script>
        <!-- Datamap -->
        <script src="./plugins/d3v3/index.js"></script>
        <script src="./plugins/topojson/topojson.min.js"></script>
        <script src="./plugins/datamaps/datamaps.world.min.js"></script>
        <!-- Morrisjs -->
        <script src="./plugins/raphael/raphael.min.js"></script>
        <script src="./plugins/morris/morris.min.js"></script>
        <!-- Pignose Calender -->
        <script src="./plugins/moment/moment.min.js"></script>
        <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <!-- ChartistJS -->
        <script src="./plugins/chartist/js/chartist.min.js"></script>
        <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



        <script src="./js/dashboard/dashboard-1.js"></script>
        <!-- Rupiah -->
        <script src="<?= $base_url; ?>/asset/js/rupiah.js"></script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#img").change(function() {
                readURL(this);
            });
        </script>

</body>

</html>