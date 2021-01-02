<?php
session_start();
session_destroy();

include "../lib/config.php";
header("Location: $base_url");
