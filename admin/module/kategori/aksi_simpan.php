<?php
session_start();

if (empty($_SESSION['username']) and empty([$_SESSION['passuser']])) {
    echo '<script>
    alert("silahkan login terlebih dahulu");
    window.location="../../index.php"
    </script>';
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $namaKategori = $_POST['namaKategori'];
    if($namaKategori==""){
         echo "<script>
        alert('Data Kategori harus Di Masukan');
        window.location = '$admin_url'+'asset/adminweb.php?module=tambah_kategori';
        </script>";
    }else{


    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kategori (nama_kategori) VALUES ('$namaKategori')");
    

    if ($querySimpan) {
        echo "<script>
        // alert('Data Kategori Berhasil Masuk');
        window.location = '$admin_url'+'asset/adminweb.php?module=kategori';
        </script>";
    } else {
        echo "<script>
        alert('Data Kategori Gagal Di Masukan');
        window.location = '$admin_url'+'asset/adminweb.php?module=tambah_kategori';
        </script>";
    }
}
}
?>