<?php
$base_url = "http://localhost/project_tpe";
$admin_url = "http://localhost/project_tpe/admin/";
$user_url = "http://localhost/project_tpe/user/";


$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
