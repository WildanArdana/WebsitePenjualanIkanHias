<?php
include "../lib/koneksi.php";
include "../lib/config.php";

$username = trim($_POST['username']);
$pass = trim($_POST['password']);
// pastikan username dan password adalah berupa huruf atau angka.

if (!ctype_alnum($username) or !ctype_alnum($pass)) {
   echo "
    <script> 
         alert('Isi Username dan Password!'); 
         window.location = '$base_url'+'?page=login';
    </script>
    ";
} else {
   $login = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username = '$username' AND password = '$pass' ");
   $ketemu = mysqli_num_rows($login);
   $r = mysqli_fetch_array($login);

   // Apabila username dan password ditemukan
   if ($ketemu > 0) {
      $status = $r['status'];

      if ($status !== '1') {
         echo "
            <script> 
            alert('Maaf, Sepertinya akun Anda diblokir hubungi Admin!'); 
            window.location = '$base_url'+'?page=login';
            </script>
            ";
      } else {
         session_start();
         $_SESSION['namauser'] = $r['username'];
         $_SESSION['passuser'] = $r['password'];

         if (isset($_GET['checkout'])) {
            header("location: $base_url?page=checkout");
         } else {
            header("location: $base_url?page=home");
         }
      }
   } else {
      echo "
        <script> 
        alert('Username atau Password Salah!'); 
         window.location = '$base_url'+'?page=login';
        </script>
        ";
   }
}
