<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    if ($_POST) {
        $namaGambar = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $path = "../../upload/" . $namaGambar;

        $idKategori = $_POST['idKategori'];
        $namaProduk = $_POST['namaProduk'];
        $deskripsiProduk = $_POST['deskripsiProduk'];
        $hargaProduk = $_POST['hargaProduk'];
        $slide = $_POST['slide'];
        $rekomendasi = $_POST['rekomendasi'];

        if (empty($kategori)) {
            $error['kategori'] = 'Kategori kosong';
        }
        if (empty($namaProduk)) {
            $error['namaProduk'] = 'Nama produk kosong';
        } else {
            if (strlen($namaProduk) < 10) {
                $error['namaProduk'] = "Minimal 10 huruf";
            };
        }
        if (empty($namaGambar)) {
            $error['namaGambar'] = 'Gambar kosong';
        }
        if (empty($deskripsiProduk)) {
            $error['deskripsiProduk'] = 'Deskripsi produk kosong';
        } else {
            if (strlen($deskripsiProduk) < 20) {
                $error['deskripsiProduk'] = "Minimal 20 huruf";
            };
        }
        if (empty($hargaProduk)) {
            $error['hargaProduk'] = 'Harga produk kosong';
        } else {
            if (!is_numeric($hargaProduk)) {
                $error['hargaProduk'] = 'Harga produk harus berupa angka';
            }
        }
        if (empty($slide)) {
            $error['slide'] = 'Pilih salah satu';
        }
        if (empty($rekomendasi)) {
            $error['rekomendasi'] = 'Pilih salah satu';
        }

        
            if ($tipe_file == "image/jpeg" || $tipe_file = "image/png") {
                if ($ukuran_file <= 1000000) {
                    if (move_uploaded_file($tmp_file, $path)) {
                        $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_barang (id_kategori, nama_barang, harga_barang, foto_barang, deskripsi_barang, slide, rekomendasi) VALUES ('$idKategori','$namaProduk','$hargaProduk','$namaGambar','$deskripsiProduk','$slide','$rekomendasi')");
                        if ($QuerySimpan) {
                            echo "
                    <script>
                        alert('Data berhasil disimpan');
                        window.location = '$admin_url'+'asset/adminweb.php?module=produk';
                    </script>";
                        } else {
                            echo "
                    <script>
                        alert('Data gagal disimpan');
                        window.location = '$admin_url'+'asset/adminweb.php?module=tambah_produk';
                    </script>";
                        }
                    } else {
                        echo "
                <script>
                    alert('Data gambar gagal');
                    window.location = '$admin_url'+'asset/adminweb.php?module=tambah_produk';
                </script>";
                    }
                } else {
                    echo "
            <script>
                alert('Data gambar terlalu besar');
                window.location = '$admin_url'+'asset/adminweb.php?module=tambah_produk';
            </script>";
                }
            } else {
                echo "
        <script>
            alert('Type gambar salah');
            window.location = '$admin_url'+'asset/adminweb.php?module=tambah_produk';
        </script>";
            }
        
     
}
}