<?php
require_once dirname(__DIR__) . '/config/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($nama === "" || $username === "" || $password === "") {
        $error = "Semua field wajib diisi.";
    } elseif ($password !== $konfirmasi) {
        $error = "Konfirmasi password tidak cocok.";
    } else {
        // cek username sudah ada atau belum
        $cek_stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ?");
        mysqli_stmt_bind_param($cek_stmt, "s", $username);
        mysqli_stmt_execute($cek_stmt);
        $cek = mysqli_stmt_get_result($cek_stmt);
        
        if (mysqli_num_rows($cek) > 0) {
            $error = "Username sudah digunakan, silakan pilih yang lain.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            // Registrasi publik selalu sebagai role 'user'
            $stmt = mysqli_prepare($conn, "INSERT INTO users (nama, username, password, role) VALUES (?, ?, ?, 'user')");
            mysqli_stmt_bind_param($stmt, "sss", $nama, $username, $hash);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: login.php?registered=1");
                exit;
            } else {
                $error = "Gagal mendaftar, coba lagi.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Akun - Perpustakaan</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="navbar">
    <h2>📚 Selamat Datang di Perpustakaan Nasional</h2>
</div>
<div class="auth-box">
    <h2>📚 Daftar Akun</h2>
    <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="konfirmasi" required>

        <button type="submit" style="width:100%">Daftar</button>
    </form>
    <p class="link-bawah">Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>
<p class="copyright"> © 2026 Perpustakaan Nasional. All rights reserved.</p>
</body>
</html>
