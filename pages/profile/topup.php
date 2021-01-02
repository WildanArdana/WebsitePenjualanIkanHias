<div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
   <h1>Top Up Saldo</h1>
   <p>Saldo Anda Saat ini : Rp. <?= number_format($user['saldo'], 0, '', '.'); ?></p>

   <!-- Button trigger modal -->
   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#topup">
      Top Up
   </button>

   <!-- Modal -->
   <div class="modal fade" id="topup" tabindex="-1" role="dialog" aria-labelledby="topupTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <form action="<?= $base_url; ?>/aksi/aksi_topup.php" method="POST">
               <input type="hidden" name="id_customer" id="id_customer" value="<?= $user['id_customer']; ?>">
               <div class="modal-header">
                  <h5 class="modal-title" id="topupTitle">Top Up</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <input type="hidden" name="id_customer" id="id_customer" value="<?= $user['id_customer']; ?>">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <input type="text" class="form-control" id="rupiah" name="isi_saldo" placeholder="Rp. <?= number_format($user['saldo'], 0, '', '.'); ?>" required data-error="Please enter saldo">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="submit_saldo">Save changes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>