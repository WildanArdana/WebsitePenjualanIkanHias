<?php
include "../lib/config.php";
include "../lib/koneksi.php";

session_start();
$username = $_SESSION['namauser'];
$sql_customer = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username='$username' ");
$u = mysqli_fetch_array($sql_customer);
$nama_customer = $u['nama'];


$id_order = $_GET['ido'];
$status = 'Selesai';
$tgl_masuk = date("Y-m-d h:i:sa");

$sql = mysqli_query($koneksi, "UPDATE tbl_order SET status_order = '$status' WHERE id_order = '$id_order' ");

if ($sql) {
    $judul_notif = 'Pesanan sudah diterima oleh ' . $nama_customer;
    mysqli_query($koneksi, "INSERT INTO tbl_notifikasi_admin (judul_notif,type_notif,status_notif,id_order)VALUES('$judul_notif','1','belum terbaca','$id_order') ");

    echo    "<script>
    alert('Konfirmasi Berhasil!'); 
    window.location = '$base_url'+'?page=detail_order&ido='+'$id_order';
    </script>";
} else {
    echo 'gagal';
}
