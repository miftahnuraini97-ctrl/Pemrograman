<?php
session_start();
require_once '../config/db.php';

if (!isset($conn)) {
    die('Database connection failed.');
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$error = "";
$success = "";

// Tambah data peminjam (otomatis ubah status buku jadi 'dipinjam')
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_peminjam'])) {
    $buku_id = (int) $_POST['buku_id'];
    $nama = trim($_POST['nama_peminjam']);
    $kontak = trim($_POST['kontak_peminjam']);
    $tgl_pinjam = $_POST['tanggal_pinjam'];

    if ($buku_id === 0 || $nama === "" || $tgl_pinjam === "") {
        $error = "Mohon lengkapi data peminjam.";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO peminjaman (buku_id, nama_peminjam, kontak_peminjam, tanggal_pinjam, status) VALUES (?, ?, ?, ?, 'dipinjam')");
        mysqli_stmt_bind_param($stmt, "isss", $buku_id, $nama, $kontak, $tgl_pinjam);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_query($conn, "UPDATE buku SET status='dipinjam' WHERE id=$buku_id");
            $success = "Data peminjam berhasil ditambahkan.";
        } else {
            $error = "Gagal menambahkan data peminjam.";
        }
    }
}

// Update status menjadi dikembalikan (otomatis ubah status buku jadi 'tersedia')
if (isset($_GET['kembalikan'])) {
    $id = (int) $_GET['kembalikan'];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT buku_id FROM peminjaman WHERE id=$id"));
    if ($row) {
        mysqli_query($conn, "UPDATE peminjaman SET status='dikembalikan', tanggal_kembali=CURDATE() WHERE id=$id");
        mysqli_query($conn, "UPDATE buku SET status='tersedia' WHERE id=" . $row['buku_id']);
        header("Location: peminjam.php?returned=1");
        exit;
    }
}
if (isset($_GET['returned'])) {
    $success = "Status buku berhasil diupdate menjadi dikembalikan.";
}

$bukuList = mysqli_query($conn, "SELECT id, judul FROM buku ORDER BY judul ASC");
$peminjamanList = mysqli_query($conn, "
    SELECT p.*, b.judul FROM peminjaman p
    JOIN buku b ON p.buku_id = b.id
    ORDER BY p.tanggal_pinjam DESC
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Peminjam - Admin</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="navbar">
    <h2>👤 Data Peminjam Buku</h2>
    <a href="dashboard.php" style="background:#374151">← Kembali</a>
</div>

<div class="container">

    <div class="card">
        <h3>Tambah Data Peminjam</h3>
        <?php if ($error): ?><div class="alert alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <?php if ($success): ?><div class="alert alert-success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
        <form method="POST">
            <label>Pilih Buku</label>
            <select name="buku_id" required>
                <option value="">-- Pilih Buku --</option>
                <?php while ($b = mysqli_fetch_assoc($bukuList)): ?>
                    <option value="<?= $b['id'] ?>"><?= htmlspecialchars($b['judul']) ?></option>
                <?php endwhile; ?>
            </select>

            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" required>

            <label>Kontak Peminjam (No. HP/Email)</label>
            <input type="text" name="kontak_peminjam">

            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" required>

            <button type="submit" name="tambah_peminjam">Tambah Peminjam</button>
        </form>
    </div>

    <div class="card">
        <h3>Riwayat Peminjaman</h3>
        <table>
            <tr>
                <th>Judul Buku</th><th>Peminjam</th><th>Kontak</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Status</th><th>Aksi</th>
            </tr>
            <?php while ($p = mysqli_fetch_assoc($peminjamanList)): ?>
            <tr>
                <td><?= htmlspecialchars($p['judul']) ?></td>
                <td><?= htmlspecialchars($p['nama_peminjam']) ?></td>
                <td><?= htmlspecialchars($p['kontak_peminjam']) ?></td>
                <td><?= htmlspecialchars($p['tanggal_pinjam']) ?></td>
                <td><?= $p['tanggal_kembali'] ? htmlspecialchars($p['tanggal_kembali']) : '-' ?></td>
                <td>
                    <span class="badge badge-<?= $p['status'] === 'dipinjam' ? 'dipinjam' : 'tersedia' ?>">
                        <?= $p['status'] === 'dipinjam' ? 'Dipinjam' : 'Dikembalikan' ?>
                    </span>
                </td>
                <td>
                    <?php if ($p['status'] === 'dipinjam'): ?>
                        <a href="?kembalikan=<?= $p['id'] ?>" class="btn btn-success" style="padding:6px 12px;font-size:12px;text-decoration:none;color:#fff;" onclick="return confirm('Tandai buku ini sudah dikembalikan?')">Tandai Kembali</a>
                    <?php else: ?>
                        <span style="color:#9ca3af;font-size:12px;">Selesai</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</div>
</body>
</html>
