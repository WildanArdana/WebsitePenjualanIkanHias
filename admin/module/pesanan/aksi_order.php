<?php
include "../../../lib/koneksi.php";
include "../../../lib/config.php";

$id_order = $_GET['ido'];
$tgl_kirim = date("Y-m-d h:i:sa");
$status = 'Kirim';

$sql = mysqli_query($koneksi, "UPDATE tbl_order SET status_order = '$status', tgl_kirim = '$tgl_kirim' WHERE id_order = '$id_order' ");

if ($sql) {
   header("Location: $admin_url/asset/adminweb.php?module=detail_order&ido=$id_order");
} else {
   echo 'gagal';
}
