<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (!isset($conn)) {
    if (isset($koneksi)) {
        $conn = $koneksi;
    } elseif (isset($connection)) {
        $conn = $connection;
    } else {
        die('Database connection not found.');
    }
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: ../auth/login.php");
    exit;
}

$cari = isset($_GET['cari']) ? trim($_GET['cari']) : "";
if ($cari !== "") {
    $cariEsc = mysqli_real_escape_string($conn, $cari);
    $query = "SELECT * FROM buku WHERE judul LIKE '%$cariEsc%' OR penulis LIKE '%$cariEsc%' ORDER BY judul ASC";
} else {
    $query = "SELECT * FROM buku ORDER BY judul ASC";
}
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard User - Perpustakaan</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="navbar">
    <h2>📚 Perpustakaan — Halo, <?= htmlspecialchars($_SESSION['nama']) ?></h2>
    <a href="../auth/logout.php">Logout</a>
</div>

<div class="container">
    <div class="card">
        <h3>Daftar Buku Tersedia</h3>
        <form method="GET" style="margin-top:15px; display:flex; gap:10px;">
            <input type="text" name="cari" placeholder="Cari judul atau penulis..." value="<?= htmlspecialchars($cari) ?>">
            <button type="submit">Cari</button>
        </form>

        <table>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Lokasi</th>
                <th>Stok</th>
                <th>Status</th>
            </tr>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($buku = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($buku['judul']) ?></td>
                    <td><?= htmlspecialchars($buku['penulis']) ?></td>
                    <td><?= htmlspecialchars($buku['tahun_terbit']) ?></td>
                    <td><?= htmlspecialchars($buku['lokasi']) ?></td>
                    <td><?= htmlspecialchars($buku['stok']) ?></td>
                    <td>
                        <span class="badge badge-<?= $buku['status'] ?>">
                            <?= $buku['status'] === 'tersedia' ? 'Tersedia' : 'Dipinjam' ?>
                        </span>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;color:#888;">Buku tidak ditemukan.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<p class = "copyright" > © 2026 Perpustakaan Nasional. All rights reserved.</p>

</body>
</html>
