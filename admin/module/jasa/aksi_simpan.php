<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $namaJasa = $_POST['namaJasa'];

    $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_jasa (nama_jasa) VALUES ('$namaJasa')");
    if ($QuerySimpan) {
        echo "
    <script>
        alert('Data berhasil disimpan');
        window.location = '$admin_url'+'asset/adminweb.php?module=jasa';
    </script>";
    } else {
        echo "
    <script>
        alert('Data gagal disimpan');
        window.location = '$admin_url'+'asset/adminweb.php?module=tambah_jasa';
    </script>";
    }
}
