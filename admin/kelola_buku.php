<?php
session_start();
require_once '../config/db.php';
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}
if (!isset($conn)) {
    die("Database connection not found.");
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$error = "";
$success = "";

// Tambah buku
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);
    $tahun = trim($_POST['tahun_terbit']);
    $lokasi = trim($_POST['lokasi']);
    $stok = trim($_POST['stok']);

    if ($judul === "" || $penulis === "" || $tahun === "" || $lokasi === "" || $stok === "") {
        $error = "Semua field wajib diisi.";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO buku (judul, penulis, tahun_terbit, lokasi, stok, status) VALUES (?, ?, ?, ?, ?, 'tersedia')");
        mysqli_stmt_bind_param($stmt, "ssisi", $judul, $penulis, $tahun, $lokasi, $stok);        if (mysqli_stmt_execute($stmt)) {
            $success = "Buku berhasil ditambahkan.";
        } else {
            $error = "Gagal menambahkan buku.";
        }
    }
}

// Hapus buku
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    header("Location: kelola_buku.php?deleted=1");
    exit;
}
if (isset($_GET['deleted'])) {
    $success = "Buku berhasil dihapus.";
}

$result = mysqli_query($conn, "SELECT * FROM buku ORDER BY judul ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Buku - Admin</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="navbar">
    <h2>📖 Kelola Buku</h2>
    <a href="dashboard.php" style="background:#374151">← Kembali</a>
</div>

<div class="container">

    <div class="card">
        <h3>Tambah Buku Baru</h3>
        <?php if ($error): ?><div class="alert alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <?php if ($success): ?><div class="alert alert-success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
        <form method="POST">
            <label>Judul Buku</label>
            <input type="text" name="judul" required>

            <label>Penulis</label>
            <input type="text" name="penulis" required>

            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" min="1800" max="2100" required>

            <label>Lokasi (contoh: Rak A1)</label>
            <input type="text" name="lokasi" required>

            <label>Jumlah Stok</label>
            <input type="number" name="stok" min="1" value="1" required>

            <button type="submit" name="tambah">Tambah Buku</button>
        </form>
    </div>

    <div class="card">
        <h3>Daftar Buku</h3>
        <table>
            <tr>
                <th>Judul</th><th>Penulis</th><th>Tahun</th><th>Lokasi</th><th>Stok</th><th>Status</th><th>Aksi</th>
            </tr>
            <?php while ($buku = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($buku['judul']) ?></td>
                <td><?= htmlspecialchars($buku['penulis']) ?></td>
                <td><?= htmlspecialchars($buku['tahun_terbit']) ?></td>
                <td><?= htmlspecialchars($buku['lokasi']) ?></td>
                <td><?= htmlspecialchars($buku['stok']) ?></td>
                <td><span class="badge badge-<?= $buku['status'] ?>"><?= $buku['status'] === 'tersedia' ? 'Tersedia' : 'Dipinjam' ?></span></td>
                <td><a href="?hapus=<?= $buku['id'] ?>" class="btn btn-danger" style="padding:6px 12px;font-size:12px;text-decoration:none;color:#fff;" onclick="return confirm('Yakin hapus buku ini?')">Hapus</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</div>
</body>
</html>
