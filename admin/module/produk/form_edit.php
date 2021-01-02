<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $_POST = $_SESSION['post'];
    unset($_SESSION['error']);
    unset($_SESSION['post']);
}

$idProduk = $_GET['id_barang'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id_barang = '$idProduk'");
$row = mysqli_fetch_array($QueryEdit);
$idProduk = $row['id_barang'];
$idKategori = $row['id_kategori'];
$namaProduk = $row['nama_barang'];
$deskripsiProduk = $row['deskripsi_barang'];
$hargaProduk = $row['harga_barang'];
$namaGambar = $row['foto_barang'];
$slide = $row['slide'];
$rekomendasi = $row['rekomendasi'];
?>
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="content-wrapper">
            <section class="content-header">
                <h2>
                    Manajemen Produk
                </h2>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Produk</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <form class="form-horizontal" action="<?= $admin_url; ?>module/produk/aksi_edit.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="id_barang" value="<?= $idProduk; ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="kategori" class="col-sm-2 control-label">List Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="kategori">
                                                <option value="">Pilih Kategori</option>
                                                <?php
                                                include "../../lib/koneksi.php";
                                                $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                                while ($kategori = mysqli_fetch_array($kueriKategori)) {
                                                ?>
                                                    <option value="<?= $kategori['id_kategori']; ?>" <?= ($idKategori == $kategori['id_kategori']) ? 'selected="selected"' : ''; ?>><?= $kategori['nama_kategori']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaProduk" class="col-sm-2 control-label">Nama Produk</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="namaProduk" value="<?= $namaProduk; ?>">
                                            <p class="text-red"><?php echo isset($error['namaProduk']) ? $error['namaProduk'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar" class="col-sm-2 control-label">Gambar</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="img-preview" id="preview" src="<?= $admin_url; ?>upload/<?= $namaGambar; ?>" alt="<?= $namaGambar; ?>" width="300px">
                                            </div>
                                            <div class="col-8">
                                                <input type="file" id="img" name="gambar_produk" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsiProduk" class="col-sm-2 control-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="deskripsiProduk"><?= $deskripsiProduk; ?></textarea>
                                            <p class="text-red"><?php echo isset($error['deskripsiProduk']) ? $error['deskripsiProduk'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hargaProduk" class="col-sm-2 control-label">Harga Produk</label>
                                        <div class="col-sm-10">
                                            <input id="rupiah" type="text" class="form-control" name="hargaProduk" placeholder="Harga Produk" value="<?= $hargaProduk; ?>">
                                            <p class="text-red"><?php echo isset($error['hargaProduk']) ? $error['hargaProduk'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="slide" class="col-sm-2 control-label">Slide</label>
                                        <div class="col-sm-10">
                                            <div class="radio">

                                                <label>
                                                    <input type="radio" name="slide" value="Y" <?= ($slide == 'Y') ? 'checked="checked"'  :  ''; ?>>Ya
                                                </label>
                                                <label>
                                                    <input type="radio" name="slide" value="N" <?= ($slide == 'N') ? 'checked="checked"'  :  ''; ?>>No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rekomendasi" class="col-sm-2 control-label">Rekomendasi</label>
                                        <div class="col-sm-10">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="rekomendasi" value="Y" <?= ($rekomendasi == 'Y') ? 'checked="checked"'  :  ''; ?>>Ya
                                                </label>
                                                <label>
                                                    <input type="radio" name="rekomendasi" value="N" <?= ($rekomendasi == 'N') ? 'checked="checked"'  :  ''; ?>>No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>