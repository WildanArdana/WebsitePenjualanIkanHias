<?php
include "../lib/koneksi.php";
include "../lib/config.php";

session_start();
$sid = session_id();

$username = $_SESSION['namauser'];
$query_customer = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username='$username' ");
$u = mysqli_fetch_array($query_customer);
$id_user = $u['id_customer'];
$nama_member = $u['nama'];



$query_last_order = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE id_customer = '$id_user' ORDER BY id_order DESC LIMIT 1");
$last = mysqli_fetch_array($query_last_order);
$id_order = $last['id_order'];
$total_bayar = $last['total_biaya'];


$query_keranjang = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE id_session = '$sid'");

while ($k = mysqli_fetch_array($query_keranjang)) {
    $id_produk = $k['id_barang'];
    $qty_produk = $k['jumlah'];
    $harga = $k['harga'];
    $total_harga = $qty_produk  * $harga;

    $query_masuk = mysqli_query($koneksi, "INSERT INTO tbl_detail_order(id_order,id_produk,jumlah_produk,harga_satuan,total_harga_produk) 
    VALUES ('$id_order','$id_produk','$qty_produk','$harga','$total_harga')");
}


// $tgl_masuk = date("Y-m-d h:i:sa");
// $sql_saldo_sementara = mysqli_query($koneksi, "INSERT INTO tbl_saldo_admin(id_order,tgl_masuk,nominal_masuk)VALUES('$id_order','$tgl_masuk','$total_bayar')");

if ($query_masuk) {
    $judul_notif = 'Ada orderan masuk! dari ' . $nama_member;
    mysqli_query($koneksi, "INSERT INTO tbl_notifikasi_admin (judul_notif,type_notif,status_notif,id_order)VALUES('$judul_notif','2','belum terbaca','$id_order') ");

    session_regenerate_id();

    echo    "<script>
    window.location = '$base_url'+'?page=detail_order&menu=order&ido=$id_order';
    </script>";
} else {
    echo    "<script>
    alert('Gagal!'); 
    window.location = '$base_url'+'?page=checkout';
    </script>";
}
