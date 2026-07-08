<?php

include "koneksi.php";

/** @var mysqli $conn */
if (!isset($conn) || !$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$nim = mysqli_real_escape_string($conn, $_POST['nim'] ?? '');
$nama = mysqli_real_escape_string($conn, $_POST['nama'] ?? '');
$prodi = mysqli_real_escape_string($conn, $_POST['prodi'] ?? '');
$angkatan = mysqli_real_escape_string($conn, $_POST['angkatan'] ?? '');

$query = mysqli_query(
    $conn,
    "INSERT INTO mahasiswa (nim, nama, prodi, angkatan) VALUES ('$nim','$nama','$prodi','$angkatan')"
);

if ($query) {
    header("Location:index.php");
    exit;
}

die("Query gagal: " . mysqli_error($conn));
?> 
