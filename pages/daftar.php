<!-- Start All Title Box -->
<div class="all-title-box">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2>Daftar Akun</h2>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
               <li class="breadcrumb-item active"> Daftar Akun</li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- End All Title Box -->

<!-- Start Daftar  -->
<div class="contact-box-main">
   <div class="container p-5 border">
      <center>
         <div class="contact-form-right">
            <h2>Daftar Akun</h2>
            <p>Sudah punya akun? <a class="text-danger" href="<?= $base_url; ?>?page=login">Login</a></p>
            <form action="<?= $base_url; ?>/aksi/aksi_daftar.php" method="post">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required data-error="Please enter username">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your email">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" id="email" name="nama_lengkap" placeholder="Nama lengkap" required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" id="email" name="hp" placeholder="Nomor Handphone" required data-error="Please enter your phone">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <select name="kota" class="form-control">
                           <?php
                           $sql_kota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                           while ($kt = mysqli_fetch_array($sql_kota)) {
                           ?>
                              <option value="<?= $kt['id_kota']; ?>"><?= $kt['nama_kota']; ?></option>
                           <?php
                           }
                           ?>
                        </select>
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" id="text" name="alamat" placeholder="Alamat" required data-error="Please enter your address">
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
                        <button class="btn hvr-hover" id="submit" type="submit">Daftar</button>
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