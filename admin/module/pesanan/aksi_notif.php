<?php
include "../../../lib/koneksi.php";
include "../../../lib/config.php";

$id_notif = $_GET['id_notif'];
$sql_notif = mysqli_query($koneksi, "SELECT * FROM tbl_notifikasi_admin WHERE id_notif = $id_notif ");
$n = mysqli_fetch_assoc($sql_notif);
$id_order = $n['id_order'];

$update = mysqli_query($koneksi, "UPDATE tbl_notifikasi_admin SET status_notif = 'sudah terbaca' WHERE id_notif='$id_notif'");


if ($update) {
   if ($n['type_notif'] == '1') {
      header("Location: $admin_url/asset/adminweb.php?module=detail_order&ido=$id_order");
   } else  if ($n['type_notif'] == '2') {
      header("Location: $admin_url/asset/adminweb.php?module=detail_order&ido=$id_order");
   }
} else {
   echo 'gagal';
}
