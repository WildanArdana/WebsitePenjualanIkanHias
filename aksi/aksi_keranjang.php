<?php
session_start();
include "../lib/koneksi.php";
include "../lib/config.php";

$sid = session_id();
$id_prod = $_GET['prod'];
$harga = $_GET['harga'];
$tanggal = date('dd-mm-yyyy');


if (isset($_GET['minus'])) {

   $sql = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE id_barang ='$id_prod' AND id_session = '$sid' ");
   $to = mysqli_fetch_assoc($sql);
   $jml = $to['jumlah'];
   if ($jml <= 1) {
      mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE id_barang ='$id_prod' AND id_session = '$sid'  ");
   } else {
      mysqli_query($koneksi, "UPDATE tbl_keranjang SET jumlah = jumlah - 1 WHERE id_barang ='$id_prod' AND id_session = '$sid'  ");
   }
} else if (isset($_GET['delete'])) {
   mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE id_barang ='$id_prod' AND id_session = '$sid'  ");
} else {


   $sql = mysqli_query($koneksi, "SELECT id_barang FROM tbl_keranjang WHERE id_barang ='$id_prod' AND id_session = '$sid' ");
   $ketemu = mysqli_num_rows($sql);

   if (empty($ketemu)) {
      if (isset($_GET['jumlahs'])) {
         $jumlah = $_GET['jumlahs'];
      } else {
         $jumlah = 1;
      }
      mysqli_query($koneksi, "INSERT INTO tbl_keranjang (status_keranjang, id_barang, jumlah, harga, id_session) VALUES ('P','$id_prod',$jumlah,'$harga','$sid')");
   } else {
      mysqli_query($koneksi, "UPDATE tbl_keranjang SET jumlah = jumlah + 1 WHERE id_barang ='$id_prod' AND id_session = '$sid'  ");
   }
}
$prev_url = $_SERVER['HTTP_REFERER'];
header("Location: $prev_url");
