<?php
// Konfigurasi koneksi database
// Sesuaikan jika username/password MySQL Anda berbeda (default XAMPP: root, tanpa password)

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "perpustakaan";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
