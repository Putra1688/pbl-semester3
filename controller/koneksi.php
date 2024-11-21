<?php
$host = 'localhost';
$dbname = 'prakwebdb';
$username = 'root';
$password = '';

// Membuat koneksi ke database dengan mysqli
$koneksi = mysqli_connect($host, $username, $password, $dbname);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
