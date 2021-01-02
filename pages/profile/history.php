<div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
   <div class="table-responsive">
      <table class="table table-bordered">

         <thead>
            <tr>
               <th>ID Order</th>
               <th>Status</th>
               <th>Tanggal Order</th>
               <th>Status Pembayaran</th>
               <th style="width: 110px">Aksi</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $id_customer = $user['id_customer'];
            $kueri_order = mysqli_query($koneksi, "SELECT * FROM tbl_order,tbl_customer WHERE tbl_order.id_customer = tbl_customer.id_customer AND tbl_customer.id_customer =$id_customer AND tbl_order.status_order = 'Selesai'");
            while ($pro = mysqli_fetch_array($kueri_order)) {
            ?>
               <tr>
                  <td>#IDP0<?php echo $pro['id_order']; ?></td>
                  <td><?php echo $pro['status_order']; ?></td>
                  <td><?php echo $pro['tgl_order']; ?></td>
                  <td><?php echo $pro['status_bayar']; ?></td>
                  <td>
                     <div class="btn-group">
                        <a href="<?php $base_url; ?>?page=detail_order&menu=<?= $_GET['menu']; ?>&ido=<?php echo $pro['id_order']; ?>" class="btn btn-success">&nbsp; Detail Order</button></a>
                     </div>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>

   </div>
</div>