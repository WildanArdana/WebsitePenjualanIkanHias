<?php
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
    echo '<script>
    alert("Silahkan login terlebih dahulu");
    window.location="../../index.php"
    </script>';
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategori = $_GET['id_kategori'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kategori WHERE id_kategori='$idKategori'");

    if ($queryHapus) {
        echo "<script>
        // alert('Data Kategori Berhasil Di Hapus');
        </script>";
    } else {
        echo "<script>
        alert('Data Kategori Gagal Di Hapus');
        </script>";
    }

    echo "<script>
    window.location = '$admin_url'+'asset/adminweb.php?module=kategori';
    </script>";
}
