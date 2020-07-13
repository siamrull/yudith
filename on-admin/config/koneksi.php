<?php
$server = "localhost";
$username = "u1025002_pencatatan";
$password = "yudith123";
$database = "u1025002_pencatatan";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
