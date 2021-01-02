<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_biaya_kirim = $_POST['id_biaya_kirim'];
    $kota = $_POST['kota'];
    $biaya = $_POST['biaya'];
    $jasa = $_POST['jasa'];

    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_biaya_kirim SET id_kota = '$kota', biaya = '$biaya', id_jasa = '$jasa' WHERE id_biaya_kirim = '$id_biaya_kirim'");
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
