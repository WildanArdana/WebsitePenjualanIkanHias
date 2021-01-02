<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";


    $kota = $_POST['kota'];
    $biaya = $_POST['biaya'];
    $jasa = $_POST['jasa'];

    $error = array();
    if (empty($kota)) {
        $error['kota'] = 'Kota kosong';
    }
    if (empty($jasa)) {
        $error['expedisi'] = 'Expedisi kosong';
    }
    if (empty($biaya)) {
        $error['biaya'] = 'Biaya kosong';
    } else {
        if (!is_numeric($biaya)) {
            $error['biaya'] = 'Biaya harus berupa angka';
        }
    }

    if (empty($error)) {
        $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_biaya_kirim (id_kota, biaya, id_jasa) VALUES ('$kota','$biaya','$jasa')");
        if ($QuerySimpan) {
            echo "
        <script>
            alert('Data berhasil disimpan');
            window.location = '$admin_url'+'asset/adminweb.php?module=ongkir';
        </script>";
        } else {
            echo "
        <script>
            alert('Data gagal disimpan');
            window.location = '$admin_url'+'asset/adminweb.php?module=tambah_ongkir';
        </script>";
        }
    } else {
        $_SESSION['error'] = $error;
        $_SESSION['post'] = $_POST;
        header("location: ../../asset/adminweb.php?module=tambah_ongkir");
    }
}
