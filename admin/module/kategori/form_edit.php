<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$idKategori = $_GET['id_kategori'];
$queryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE id_kategori='$idKategori'");
$hasilQuery = mysqli_fetch_array($queryEdit);
$namaKategori = $hasilQuery['nama_kategori'];

?>

<div class="content-body">
    
    <div class="container-fluid mt-3">
    <div class="content-wrapper">
<section class="content-header">
<h2>
    Manajemen Kategori
</h2>
</section>
      <section class="content">

<form action="../module/kategori/aksi_edit.php" method="post">
<input type="hidden" name="id_kategori" value="<?php echo $idKategori; ?>">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">From Edit Kategori</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="namaKategori" class="col-sm-1 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori" name="nama_kategori" value="<?php echo $namaKategori; ?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
        </div>
    </div>
</form>

