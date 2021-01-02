<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_jasa = $_GET['id_jasa'];

    $QueryHapus = mysqli_query($koneksi, "DELETE FROM tbl_jasa WHERE id_jasa = '$id_jasa'");
    if ($QueryHapus) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=jasa';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=jasa';
        </script>";
    }
}
