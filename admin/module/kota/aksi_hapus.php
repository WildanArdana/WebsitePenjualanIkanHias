<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_kota = $_GET['id_kota'];

    $QueryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kota WHERE id_kota = '$id_kota'");
    if ($QueryHapus) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=kota';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=kota';
        </script>";
    }
}
