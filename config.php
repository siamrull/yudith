<?php
include "parser-php-version.php";
define('DBHOST', 'localhost');
define('DBUSER', 'u1025002_pencatatan');
define('DBPASS', 'yudith123');
define('DBNAME', 'u1025002_pencatatan');

/**
 * $dbconnect : koneksi kedatabase
 */
$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
	die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}
