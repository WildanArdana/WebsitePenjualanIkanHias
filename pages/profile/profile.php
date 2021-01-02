<div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
   <h1>Account Details</h1>
   <form action="<?= $base_url; ?>/aksi/aksi_edit_profile.php" method="POST">
      <input type="hidden" name="id_customer" id="id_customer" value="<?= $user['id_customer']; ?>">
      <div class="row">
         <div class="col-md-12">
            <div class="form-group">
               <input type="text" class="form-control" id="username" name="username" placeholder="Username" required data-error="Please enter username" value="<?= $user['username']; ?>">
               <div class="help-block with-errors"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <input type="text" class="form-control" id="email" name="email" placeholder="Email" required data-error="Please enter your email" value="<?= $user['email']; ?>">
               <div class="help-block with-errors"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <input type="text" class="form-control" id="email" name="nama_lengkap" placeholder="Nama lengkap" required data-error="Please enter your name" value="<?= $user['nama']; ?>">
               <div class="help-block with-errors"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <input type="text" class="form-control" id="email" name="hp" placeholder="Nomor Handphone" required data-error="Please enter your phone" value="<?= $user['no_hp']; ?>">
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
                     <option value="<?= $kt['id_kota']; ?>" <?= ($user['id_kota'] == $kt['id_kota']) ? 'selected' : ''; ?>><?= $kt['nama_kota']; ?></option>
                  <?php
                  }
                  ?>
               </select>
               <div class="help-block with-errors"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <input type="text" class="form-control" id="text" name="alamat" placeholder="Alamat" required data-error="Please enter your address" value="<?= $user['alamat']; ?>">
               <div class="help-block with-errors"></div>
            </div>
         </div>

         <div class="col-md-12">
            <button class="btn btn-danger" type="submit" name="edit_profile">Update</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#changePassword">
               Change Password
            </button>
         </div>
      </div>
   </form>
   <!-- Modal -->
   <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <form action="<?= $base_url; ?>/aksi/aksi_edit_profile.php" method="POST">
               <input type="hidden" name="id_customer" id="id_customer" value="<?= $user['id_customer']; ?>">
               <div class="modal-header">
                  <h4 class="modal-title" id="changePasswordLabel">Change password</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password_lama" placeholder="Password Lama" required data-error="Please enter your old password">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password_baru" placeholder="Password Baru" required data-error="Please enter your new password">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="cp">Change</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>