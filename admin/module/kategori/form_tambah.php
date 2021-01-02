    <!-- Content Wrapper. Contains page content -->
    <div class="content-body">
    
    <div class="container-fluid mt-3">
    <div class="content-wrapper">
<section class="content-header">
<h2>
    Manajemen Kategori
</h2>
</section>
      <section class="content">

        <form action="../module/kategori/aksi_simpan.php" method="post">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">From Tambah Kategori</h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="namaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori"
                    name="namaKategori">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
            </div>
          </div>
        </form>