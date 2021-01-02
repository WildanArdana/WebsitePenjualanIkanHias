<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idProduk = $_GET['id_barang'];


    $filegambar = $_GET['file_gambar'];

    // proses hapus file gambar produk di folder upload     
    $hapus_file = "../../upload/$filegambar";
    if (file_exists($hapus_file)) {
        unlink($hapus_file); // hapus file
    }

    if (file_exists($hapus_file)) {
        echo "
        <script> 
            alert('Data Produk Gagal di Hapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=produk';
        </script>";
    } else {

        $QueryHapus = mysqli_query($koneksi, "DELETE FROM tbl_barang WHERE id_barang = '$idProduk'");
        if ($QueryHapus) {
            echo "
        <script>
            alert('Data berhasil dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=produk';
        </script>";
        } else {
            echo "
        <script>
            alert('Data gagal dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=produk';
        </script>";
        }
    }
}
