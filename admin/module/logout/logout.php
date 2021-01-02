<?php 
session_start();

$_SESSION["namauser"] = [];
$_SESSION["passuser"] = [];
        session_unset();
        session_destroy();
        echo '<script>
        alert("Anda Logout");
        document.location.href="../../index.php";
        </script>';