<?php

if (!isset($_SESSION)) {
   session_start();
}


include "lib/koneksi.php";

include "template/header.php";

if (isset($_GET['page'])) {

   if ($_GET['page'] == "home") {
      include "pages/main.php";
   } elseif ($_GET['page'] == "shop") {
      include "pages/shop.php";
   } elseif ($_GET['page'] == "detailproduk") {
      include "pages/detailproduk.php";
   } elseif ($_GET['page'] == "login") {
      include "pages/login.php";
   } elseif ($_GET['page'] == "daftar") {
      include "pages/daftar.php";
   } elseif ($_GET['page'] == "cart") {
      include "pages/cart.php";
   } elseif ($_GET['page'] == "checkout") {
      include "pages/checkout.php";
   } elseif ($_GET['page'] == "profile") {
      include "pages/profile.php";
   } elseif ($_GET['page'] == "password") {
      include "pages/password.php";
   } elseif ($_GET['page'] == "transaksi") {
      include "pages/transaksi.php";
   } elseif ($_GET['page'] == "detail_order") {
      include "pages/detail_order.php";
   } elseif ($_GET['page'] == "saldo") {
      include "pages/saldo.php";
   } elseif ($_GET['page'] == "riwayat") {
      include "pages/transaksi.php";
   } else {
      include "pages/main.php";
   }
} else {
   include "pages/main.php";
}
include "template/footer.php";
