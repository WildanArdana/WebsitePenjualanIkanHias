<?php
include "../lib/koneksi.php";
include "../lib/config.php";


$tgl_daftar = date("Y-m-d");
$active = '1';
$saldo = 0;
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$nama_lengkap = trim($_POST['nama_lengkap']);
$no_hp = trim($_POST['hp']);
$alamat = trim($_POST['alamat']);
$kota = trim($_POST['kota']);

if (!empty($username)) {
   $querycek = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username ='$username'");
   $ketemu = mysqli_num_rows($querycek);
   if ($ketemu > 0) {
      echo    "<script>alert
    alert('Username sudah digunakan!'); 
    window.location = '$base_url'+'?page=daftar';
    </script>";
   } else {

      if (
         empty($username) or empty($email) or empty($pass)
         or empty($nama_lengkap) or empty($no_hp) or empty($alamat) or empty($kota)
      ) {
         echo    "<script>alert
          alert('Data Harus di Isi Penuh!'); 
          window.location = '$base_url'+'?page=daftar';
          </script>";
      } else {
         $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_customer (username,password,nama,alamat,id_kota,email,no_hp,saldo,status,tgl_daftar) 
          VALUES ('$username','$pass','$nama_lengkap','$alamat','$kota','$email','$no_hp','$saldo','$active','$tgl_daftar')");


         if ($querySimpan) {
            echo    "<script>alert
          alert('Daftar Berhasil!'); 
          window.location = '$base_url'+'?page=login';
          </script>";
         } else {
            echo    "<script>alert
          alert('Daftar Gagal!'); 
          window.location = '$base_url'+'?page=daftar';
          </script>";
         }
      }
   }
}
