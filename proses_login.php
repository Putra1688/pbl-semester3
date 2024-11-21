<?php
include "koneksi.php";

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($koneksi, $query);

// Mengecek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result); // Ambil data dari hasil query

    if ($row['level'] == 1) {
        echo "Selamat datang, $email! Anda berhasil login sebagai Admin."; ?>
        <a href="dashboardAdmin.html">Halaman Admin</a>;
        <?php
    } else if ($row['level'] == 2) {
        echo "Selamat datang, $email! Anda berhasil login sebagai Santri."; ?>
        <a href="dashboardSantri.html">Halaman Santri</a>
        <?php
    } 
} else {
    echo "Maaf, Anda tidak memiliki hak akses untuk login. Silahkan ";?>
    <a href="...">Login Kembali</a>
    <?php
    echo mysqli_error($koneksi);
}
?>