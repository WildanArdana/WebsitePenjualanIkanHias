<?php
include "../lib/koneksi.php";
include "../lib/config.php";
session_start();
$sid = session_id();
$biaya_ongkir = $_POST['biaya_ongkir'];
$total_harga_produk = $_POST['total_harga_produk'];


$sql_k = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE id_session='$sid' ");
$cek_keranjang = mysqli_num_rows($sql_k);

if (empty($cek_keranjang)) {
   echo    "<script>
    alert('Keranjang kosong!'); 
    window.location = '$base_url'+'?page=checkout';
    </script>";
} else {


   if (empty($biaya_ongkir)) {
      echo    "<script>
    alert('Pilih Kurir!'); 
    window.location = '$base_url'+'?page=checkout';
    </script>";
   } else {

      $username = $_SESSION['namauser'];

      $kueriCustomer = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username='$username' ");
      $u = mysqli_fetch_array($kueriCustomer);
      $id_user = $u['id_customer'];

      $saldo = $u['saldo'];
      $total_bayar = $biaya_ongkir + $total_harga_produk;
      $sisa_saldo = $saldo - $total_bayar;

      if ($sisa_saldo <= 0) {
         echo    "<script>
        alert('Saldo Anda Tidak Cukup!'); 
        window.location = '$base_url'+'?page=checkout';
        </script>";
      } else {
         $sql = mysqli_query($koneksi, "UPDATE tbl_customer SET saldo = '$sisa_saldo' WHERE id_customer = '$id_user' ");

         $status_order =  'Proses';
         $tgl_order = date('Y-m-d h:i:sa');
         $id_customer = $id_user;
         $invoice = $_POST['invoice'];
         $status_bayar = 'Lunas';
         $id_biaya_kirim = $_POST['id_biaya_kirim'];
         $biaya_kirim = $biaya_ongkir;
         $biaya_produk = $total_harga_produk;
         $total_biaya = $biaya_kirim +  $biaya_produk;


         $sql_order = mysqli_query($koneksi, "INSERT INTO tbl_order(status_order,tgl_order,id_customer,invoice,status_bayar,id_biaya_kirim,biaya_kirim,biaya_produk,total_biaya) 
                                    VALUES ('$status_order','$tgl_order','$id_customer','$invoice','$status_bayar','$id_biaya_kirim','$biaya_kirim','$biaya_produk','$total_biaya')");
         if ($sql_order) {
            echo    "<script>
                window.location = 'aksi_detail_order.php';
                </script>";
         } else {
            echo    "<script>alert
                alert('Gagal!'); 
                window.location = '$base_url'+'?page=checkout';
                </script>";
         }
      }
   }
}
