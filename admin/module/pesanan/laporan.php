<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
$start = $_GET['mulai'];
$end = $_GET['selesai'];


?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

   <title>laporan</title>
</head>

<body>
   <center>
      <h3>Laporan Penjualan</h3>
      <h4>Hero Fish</h4>
      <p>Per Tanggal <?= date('d M Y', strtotime($start)); ?> - <?= date('d M Y', strtotime($end)); ?> </p>
   </center>
   <a href="<?= $_SERVER['HTTP_REFERER']; ?>" class="btn btn-secondary"> Back </a>
   <a class="btn btn-primary" href="javascript:window.print()"> Print </a>
   <table class="table table-bordered text-right align-middle mt-3">
      <thead class="thead-dark table-success">
         <tr>
            <th>#</th>
            <th>Tanggal Pemesanan</th>
            <th>Nomor Nota</th>
            <th>Status</th>
            <th>Nama Pemesanan</th>
            <th>Produk </th>
            <th>Ongkir </th>
            <th>Total</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $no = 1;
         $kueri_order = mysqli_query($koneksi, "SELECT * FROM tbl_order,tbl_customer WHERE tbl_order.id_customer = tbl_customer.id_customer AND tbl_order.tgl_order BETWEEN '$start' AND '$end' ");
         while ($order = mysqli_fetch_array($kueri_order)) {
            $id_order = $order['id_order'];
            $Kueri_detail_orders = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order WHERE id_order = $id_order");
            $jmlh = mysqli_num_rows($Kueri_detail_orders);
            $total[$no++] =  $order['total_biaya'];

         ?>
            <tr>
               <td><?= $no++; ?></td>
               <td><?= date('d M Y', strtotime($order['tgl_order'])); ?></td>
               <td>#IDP0<?= $order['id_order']; ?></td>
               <td><?= $order['status_order']; ?></td>
               <td><?= $order['nama']; ?></td>
               <?php
               $id_order = $order['id_order'];
               $kuery_detail_produk = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order,tbl_barang WHERE tbl_detail_order.id_produk = tbl_barang.id_barang AND id_order = $id_order");


               ?>
               <td>
                  <ul>
                     <?php while ($dp = mysqli_fetch_array($kuery_detail_produk)) { ?>

                        <li> <?= $dp['nama_barang']; ?> (Rp. <?php echo number_format($dp['harga_satuan'], 0, '', '.'); ?>) x <?= $dp['jumlah_produk']; ?> = Rp. <?php echo number_format($dp['total_harga_produk'], 0, '', '.'); ?> </li>


                     <?php } ?>
                  </ul>
               </td>

               <td>Rp. <?php echo number_format($order['biaya_kirim'], 0, '', '.'); ?></td>
               <td>Rp. <?php echo number_format($order['total_biaya'], 0, '', '.'); ?></td>
            </tr>


         <?php
         } ?>
         <tr class="table-success">
            <td colspan="7">Total</td>

            <td>Rp. <?php echo number_format((empty($total)) ? 0 : array_sum($total), 0, '', '.'); ?></td>
         </tr>
      </tbody>
   </table>


   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>