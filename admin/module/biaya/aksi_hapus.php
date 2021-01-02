<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_biaya_kirim = $_GET['id_biaya_kirim'];

    $QueryHapus = mysqli_query($koneksi, "DELETE FROM tbl_biaya_kirim WHERE id_biaya_kirim = '$id_biaya_kirim'");
    if ($QueryHapus) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=ongkir';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location = '$admin_url'+'asset/adminweb.php?module=ongkir';
        </script>";
    }
}
