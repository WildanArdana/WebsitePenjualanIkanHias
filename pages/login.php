<!-- Start All Title Box -->
<div class="all-title-box">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2>Login Akun</h2>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
               <li class="breadcrumb-item active"> Login Akun</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- End All Title Box -->

<!-- Start Login -->
<div class="contact-box-main">
   <div class="container p-5 border">
      <center>
         <div class="contact-form-right">
            <h2>Login Akun</h2>
            <p>Belum punya akun? <a class="text-danger" href="<?= $base_url; ?>?page=daftar">Daftar</a></p>
            <form action="<?= $base_url; ?>/aksi/<?= (isset($_GET['checkout'])) ? 'aksi_login.php?checkout' : 'aksi_login.php'; ?>" method="post">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required data-error="Please enter username">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="password" class="form-control" id="email" name="password" placeholder="Password" required data-error="Please enter your password">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>

                  <div class="col-md-12">

                     <div class="submit-button text-center">
                        <button class="btn hvr-hover" id="submit" type="submit">Login</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </center>
   </div>
</div>

<!-- End Cart -->