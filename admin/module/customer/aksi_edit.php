<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $id_customer = $_POST['id_customer'];
    $status = $_POST['status'];

    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_customer SET status = '$status' WHERE id_customer = '$id_customer'");
    if ($QueryEdit) {
        echo "
        <script>
            alert('Data berhasil dirubah');
            window.location = '$admin_url'+'asset/adminweb.php?module=customer';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dirubah');
            window.location = '$admin_url'+'asset/adminweb.php?module=customer';
        </script>";
    }
}
