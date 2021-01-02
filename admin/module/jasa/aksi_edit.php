<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_jasa = $_POST['id_jasa'];
    $nama_jasa = $_POST['nama_jasa'];

    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_jasa SET nama_jasa = '$nama_jasa' WHERE id_jasa = '$id_jasa'");
    if ($QueryEdit) {
        echo "
        <script>
            alert('Data berhasil dirubah');
            window.location = '$admin_url'+'asset/adminweb.php?module=jasa';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dirubah');
            window.location = '$admin_url'+'asset/adminweb.php?module=edit_jasa&id_jasa='+'$id_jasa';
        </script>";
    }
}
