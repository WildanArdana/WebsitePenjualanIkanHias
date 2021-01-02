<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_kota = $_POST['id_kota'];
    $nama_kota = $_POST['nama_kota'];

    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_kota SET nama_kota = '$nama_kota' WHERE id_kota = '$id_kota'");
    if ($QueryEdit) {
        echo "
        <script>
            alert('Data berhasil dirubah');
            window.location = '$admin_url'+'asset/adminweb.php?module=kota';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dirubah');
            window.location = '$admin_url'+'asset/adminweb.php?module=edit_kota&id_kota='+'$id_kota';
        </script>";
    }
}
