<?php
session_start();
// load DB config; use absolute path to avoid relative include issues
require_once __DIR__ . '/../config/db.php';

// If $conn isn't provided by config, create a fallback connection
if (!isset($conn) || !($conn instanceof mysqli)) {
    $conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
    if (!$conn) {
        die('Database connection error');
    }
}

$error = "";
if (isset($_GET['registered'])) {
    $success = "Pendaftaran berhasil! Silakan login.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT id, nama, password, role FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../user/dashboard.php");
        }
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login - Perpustakaan</title>
<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="navbar">
    <h2>📚 Selamat Datang di Perpustakaan Nasional</h2>
</div>
<div class="auth-box">
    <h2>📚 Login Perpustakaan</h2>
    <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" style="width:100%">Login</button>
    </form>
    <p class="link-bawah">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    <p class="link-bawah" style="color:#9ca3af;font-size:12px">Login admin pakai akun admin yang sudah terdaftar di database.</p>
</div>

<p class = "copyright" > © 2026 Perpustakaan Nasional. All rights reserved.</p>

</body>
</body>
</html>
