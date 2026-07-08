<?php
require_once '../config/db.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}
if (!isset($conn)) {
    $conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin - Perpustakaan</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="navbar">
    <h2>🛠️ Admin Panel — Halo, <?= htmlspecialchars($_SESSION['nama']) ?></h2>
    <a href="../auth/logout.php">Logout</a>
</div>

<div class="container">
    <div class="card">
        <h3>Menu Admin</h3>
        <div class="menu-grid">
            <a href="kelola_buku.php">📖 Kelola Buku<br><small>Tambah / Hapus Buku</small></a>
            <a href="peminjam.php">👤 Data Peminjam<br><small>Tambah & Update Status Pengembalian</small></a>
        </div>
    </div>

    <div class="card">
        <h3>Ringkasan</h3>
        <?php
        $totalBuku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM buku"))['jml'];
        $totalPinjam = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM peminjaman WHERE status='dipinjam'"))['jml'];
        ?>
        <p>Total judul buku: <b><?= $totalBuku ?></b></p>
        <p>Sedang dipinjam: <b><?= $totalPinjam ?></b></p>
    </div>
</div>
</body>
</html>
