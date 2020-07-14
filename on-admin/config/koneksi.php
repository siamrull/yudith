<?php
include_once "parser-php-version.php";
$server = "localhost";
$username = "root";
$password = "";
$database = "pencatatan";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
