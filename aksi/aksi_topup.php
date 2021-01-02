<?php

include "../lib/config.php";
include "../lib/koneksi.php";

$id_customer = $_POST['id_customer'];

if (isset($_POST['submit_saldo'])) {

   $saldo_masuks = trim($_POST['isi_saldo']);



   if (empty($saldo_masuks)) {
      echo    "<script>
    alert('Silahkan isi Nominal!'); 
    window.location = '$base_url'+'?page=profile';
    </script>";
   } else {

      //mengjilangkan caracter Rp dan . pada data harga.
      $saldo_masuk = preg_replace('/\D/', '', $saldo_masuks);

      $sql = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE id_customer = '$id_customer'");
      $nom = mysqli_fetch_array($sql);

      $sisa_saldo = $nom['saldo'];

      $saldo = $sisa_saldo + $saldo_masuk;

      $querySaldo = mysqli_query(
         $koneksi,
         "UPDATE tbl_customer 
            SET 
            saldo = '$saldo'
        WHERE id_customer ='$id_customer' "
      );
      if ($querySaldo) {
         echo    "<script>
         alert('Saldo Berhasil di Top Up!'); 
         window.location = '$base_url'+'?page=profile&menu=topup';
         </script>";
      }
   }
}
