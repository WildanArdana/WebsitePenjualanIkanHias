<?php
session_start();

include "../lib/config.php";
include "../lib/koneksi.php";
$id_customer = $_POST['id_customer'];

if (isset($_POST['edit_profile'])) {

   $username = $_POST['username'];
   $email = trim($_POST['email']);
   $nama_lengkap = trim($_POST['nama_lengkap']);
   $no_hp = trim($_POST['hp']);
   $alamat = trim($_POST['alamat']);
   $kota = trim($_POST['kota']);

   if ($username != $_SESSION['namauser']) {
      $querycek = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username ='$username'");
      $ketemu = mysqli_num_rows($querycek);
      if ($ketemu > 0) {
         echo    "<script>alert
       alert('Username sudah digunakan!'); 
       window.location = '$base_url'+'?page=profile';
       </script>";
      }
   }

   $queryEdit = mysqli_query(
      $koneksi,
      "UPDATE tbl_customer 
            SET 
            username = '$username',
            nama = '$nama_lengkap',
            alamat = '$password',
            email = '$email',
            id_kota = '$kota',
            alamat = '$alamat',
            no_hp = '$no_hp'
        WHERE id_customer ='$id_customer' "
   );

   if ($queryEdit) {
      $_SESSION['namauser'] = $username;

      echo    "<script>alert
         alert('Update berhasil'); 
         window.location = '$base_url'+'?page=profile';
         </script>";
   } else {
      echo    "<script>alert
         alert('Update gagal'); 
         window.location = '$base_url'+'?page=profile';
         </script>";
   }
} else if (isset($_POST['cp'])) {
   $passwordLama = trim($_POST['password_lama']);
   $passwordBaru = trim($_POST['password_baru']);

   if (empty($passwordLama) or empty($passwordBaru)) {
      echo    "<script>
        alert('Password Tidak Boleh Kosong!'); 
        window.location = '$base_url'+'?page=profile';
        </script>";
   } else {
      $querycek = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE id_customer = '$id_customer'");
      $cek = mysqli_fetch_array($querycek);
      if ($passwordLama == $cek['password']) {


         $queryEdit = mysqli_query(
            $koneksi,
            "UPDATE tbl_customer 
                    SET 
                    password = '$passwordBaru'
                WHERE id_customer ='$id_customer' "
         );
         if ($queryEdit) {
            $_SESSION['passuser'] = $passwordBaru;

            echo    "<script>
                alert('Password Berhasil di Perbarui!'); 
                window.location = '$base_url'+'?page=profile';
                </script>";
         } else {
            echo    "<script>
            alert('Password Gagal di Perbarui!'); 
            window.location = '$base_url'+'?page=profile';
            </script>";
         }
      } else {
         echo    "<script>
         alert('Password Salah!'); 
         window.location = '$base_url'+'?page=profile';
         </script>";
      }
   }
}
