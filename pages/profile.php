<?php
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
   echo    "<script>
   window.location = '$base_url'+'?page=login';
   </script>";
}
?>
<!-- Start All Title Box -->
<div class="all-title-box">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2>My Account</h2>
            <ul class="breadcrumb">

               <li class="breadcrumb-item"><a href="<?= $base_url; ?>">My Account</a></li>
               <?php if (!empty($_GET['menu'])) : ?>
                  <li class="breadcrumb-item active text-capitalize"> <?= $_GET['menu']; ?></li>
               <?php endif; ?>

            </ul>
         </div>
      </div>
   </div>
</div>
<!-- End All Title Box -->

<!-- My Account Start -->
<div class="contact-box-main">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-sm-12">
            <div class="contact-info-left">
               <h2>My Account</h2>
               <div class="nav flex-column nav-pills" aria-orientation="vertical">
                  <a class="nav-link" href="<?= $base_url; ?>?page=profile&menu=akun"><i class="fa fw fa-user"> </i>&nbsp; Account Details</a>
                  <a class="nav-link" href="<?= $base_url; ?>?page=profile&menu=order"> <i class="fa fw fa-shopping-bag"> </i>&nbsp;My Orders</a>
                  <a class="nav-link" href="<?= $base_url; ?>?page=profile&menu=history"><i class="fa fw fa-history"> </i>&nbsp; Riwayat Order</a>
                  <a class="nav-link" href="<?= $base_url; ?>?page=profile&menu=topup"><i class="fa fw fa-credit-card"> </i>&nbsp; Top Up Saldo</a>
                  <a class="nav-link" href="<?= $base_url; ?>/aksi/aksi_logout.php"><i class="fa fa-sign-out-alt"> </i> &nbsp; Logout</a>
               </div>
            </div>
         </div>
         <div class="col-lg-8 col-sm-12">
            <div class="contact-form-right">
               <div class="tab-content">
                  <?php
                  if (isset($_GET['menu'])) {
                     if ($_GET['menu'] == "akun") {
                        include "pages/profile/profile.php";
                     } elseif ($_GET['menu'] == "order") {
                        include "pages/profile/order.php";
                     } elseif ($_GET['menu'] == "history") {
                        include "pages/profile/history.php";
                     } elseif ($_GET['menu'] == "topup") {
                        include "pages/profile/topup.php";
                     } else {
                        include "pages/profile/profile.php";
                     }
                  } else {
                     include "pages/profile/profile.php";
                  }

                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- My Account End -->