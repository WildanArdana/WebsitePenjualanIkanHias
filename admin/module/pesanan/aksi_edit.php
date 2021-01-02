<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $invoice = $_POST['invoice'];
    $status = $_POST['status'];

    $QueryDO = mysqli_query($koneksi, "SELECT id_order FROM tbl_detail_order WHERE invoice = '$invoice'");
    while ($row = mysqli_fetch_array($QueryDO)) {
        $id_order = $row['id_order'];
        $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_order SET status_order = '$status' WHERE id_order = '$id_order'");
        if ($QueryEdit) {
            echo "
            <script>
                alert('Data berhasil dirubah');
                window.location = '$admin_url'+'adminweb.php?module=pesanan';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal dirubah');
                window.location = '$admin_url'+'adminweb.php?module=pesanan';
            </script>";
        }
    }
}
