<?php
session_start();
include "../../../lib/config.php";
include "../../../lib/koneksi.php";

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {


    //menghilangkan caracter Rp dan . pada data harga.
    $hargaProduk = preg_replace('/\D/', '', $_POST['hargaProduk']);

    //amvil semua data yang dikirm dari form
    //data gambar
    $nama_file = $_FILES['gambar_produk']['name'];
    $ukuran_file = $_FILES['gambar_produk']['size'];
    $tipe_file = $_FILES['gambar_produk']['type'];
    $tmp_file = $_FILES['gambar_produk']['tmp_name'];
    //data selain gambar
    $idproduk = $_POST['id_barang'];
    $idKategori = $_POST['kategori'];
    $namaProduk = $_POST['namaProduk'];
    $deskripsi = $_POST['deskripsiProduk'];
    $slide = $_POST['slide'];
    $rekomendasi = $_POST['rekomendasi'];

    //buat acak random untuk temp gambar.
    $a1 = str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5);
    $a2 = str_shuffle($a1);
    //outputnya angka dan huruf random sebanyak 10 karakter
    $random = substr($a2, 0, 10);
    $np = preg_replace('/ /', '_', $namaProduk);

    $gambar = $np . "_" . $random . $nama_file;
    // set path folder tempat menyimapn gambarnya
    $path = "../../upload/" . $gambar;


    // jika tidak diupdate
    $queryPro = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id_barang = '$idproduk'");
    $pro = mysqli_fetch_array($queryPro);
    if ($nama_file == null) {
        // poses jika gambar tak di update
        $queryEdit = mysqli_query(
            $koneksi,
            "UPDATE tbl_barang 
                SET id_kategori = '$idKategori',
                    nama_barang = '$namaProduk',
                    harga_barang = '$hargaProduk',
                    deskripsi_barang = '$deskripsi',
                    slide = '$slide',
                    rekomendasi   ='$rekomendasi'
                WHERE id_barang ='$idproduk' "
        );

        echo "
        <script> 
            alert('Berhasil di Update!');
            window.location = '$admin_url'+'asset/adminweb.php?module=produk';
        </script>";

        // jika gambar diupdate
    } elseif ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
        $filegambar = $pro['foto_barang'];
        //hapus file gambar yang akan di update di folder
        $hapus_file = "../../upload/$filegambar";
        if (file_exists($hapus_file)) {
            unlink($hapus_file); // hapus file
        }

        //cek apakah file masih ada jika tidak update gambar gagal
        if (file_exists($hapus_file)) {
            echo "
                <script> 
                    alert('Gambar produk gagal di Update!');
                    window.location = '$admin_url'+'asset/adminweb.php?module=produk';
                </script>";
        } else { //jika file gambar sebelumnya sudah di hapus lanjutkan

            if ($ukuran_file <= 1000000) {
                if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di update atau tidak
                    //proses simapn ke database
                    $queryEdit = mysqli_query(
                        $koneksi,
                        "UPDATE tbl_barang 
                            SET id_kategori = '$idKategori',
                                nama_barang = '$namaProduk',
                                harga_barang = '$hargaProduk',
                                foto_barang = '$gambar',
                                deskripsi_barang = '$deskripsi',
                                slide = '$slide',
                                rekomendasi   ='$rekomendasi'
                            WHERE id_barang ='$idproduk' "
                    );
                    // Jika query berhasil maka akan tampil alrt dan halaman akan kembali ke daftar produk
                    if ($queryEdit) {
                        echo    "<script>
                                        alert('Data Produk Berhasil diUpdate!'); 
                                        window.location = '$admin_url'+'asset/adminweb.php?module=produk';
                                        </script>";
                        //jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah produk
                    } else {
                        echo    "<script>alert
                                        ('Data Produk gagal Gagal DiUpdate');
                                        window.location = '$admin_url'+'asset/adminweb.php?module=edit_produk&id_produk='+'$idproduk';
                                        </script>";
                    }
                } else {
                    //jika gambar gagal di ulpoad, Lakukan:
                    echo    "<script>alert
                                ('Data gambar Gagal Dimasukkan');
                                window.location = '$admin_url'+'asset/adminweb.php?module=edit_produk&id_produk='+'$idproduk';
                                </script>";
                }
            } else {
                //jika gambar melebihi ukuran, Lakukan:
                echo    "<script>alert
                            ('Data gambar Gagal Dimasukkan karena Ukuran Melebihi 1MB');
                            window.location = '$admin_url'+'asset/adminweb.php?module=edit_produk&id_produk='+'$idproduk';
                            </script>";
            }
        }
    } else {
        //jika tipe file yang diupload bukan JPG atau PNG
        echo    "<script>alert
                        ('Data gambar Gagal Dimasukkan karena Tidak Berekstensi JPG/JPEG/PNG');
                        window.location = '$admin_url'+'asset/adminweb.php?module=edit_produk&id_produk='+'$idproduk';
                        </script>";
    }
}
