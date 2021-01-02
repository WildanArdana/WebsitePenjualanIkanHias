 <!-- Content Wrapper. Contains page content -->
 
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content-body">
    
            <div class="container-fluid mt-3">
            <div class="content-wrapper">
    <section class="content-header">
        <h2>
            Manajemen Kategori
        </h2>
    </section>
     <div class="card">
       <div class="card-header">
         <h3 class="card-title">Data Kategori</h3>
         <form class="form-inline float-right" method="post" action="">
           <div class="input-group input-group-sm">
             <input class="form-control" type="search" placeholder="Cari Kategori" aria-label=""
               name="cariKategori">
             <div class="input-group-append">
               <button class="btn btn-primary" type="submit">
                 <i class="fa fa-search"></i>
               </button>
             </div>
           </div>
         </form>
       </div>
       <div class="card-body">
         <table class="table table-hover">
           <tr>
             <thead class="thead-light">
               <th>Kategori</th>
               <th style="width: 150px">Aksi</th>
             </thead>

           </tr>

           <?php
      include "../../lib/config.php";
      include "../../lib/koneksi.php";

      $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
// searching kategori
      if (isset($_POST['cariKategori'])) {
          $cariKategori = $_POST['cariKategori'];
          $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE nama_kategori LIKE '%$cariKategori%'");
      }
      
      while ($kat = mysqli_fetch_array($kueriKategori)) {
          ?>
           <tr>
             <td>
               <?php echo $kat['nama_kategori']; ?>
             </td>
             <td>
               <div class="btn-group">
                 <a href="<?php echo $admin_url; ?>asset/adminweb.php?module=edit_kategori&id_kategori=<?php echo $kat['id_kategori']; ?>"
                   class="btn btn-warning">
                   <i class="fa fa-pencil"></i>
                 </a>
                 <a href="<?php echo $admin_url; ?>module/kategori/aksi_hapus.php?id_kategori=<?php echo $kat['id_kategori']; ?>"
                   onCLick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger">
                   <i class="fa fa-power-off"></i>
                 </a>
               </div>
             </td>
           </tr>
           <?php
      } ?>
         </table>
       </div>
       <div class="card-footer">
         <a href="adminweb.php?module=tambah_kategori" class="btn btn-primary ml-1">Tambah kategori</a>
       </div>
     </div>