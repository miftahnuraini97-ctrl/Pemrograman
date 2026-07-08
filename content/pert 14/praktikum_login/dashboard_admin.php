<?php session_start(); 
 
// Proteksi halaman Admin 
if (!isset($_SESSION['admin'])) {     
    echo "<script>alert('Akses Ditolak! Anda bukan Admin.'); window.location='login.php';</script>";    
    exit; 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head><title>Dashboard Admin</title></head> 
<body> 
    <h1>Selamat Datang di Ruang Admin, <?php echo 
$_SESSION['username']; ?>!</h1> 
    <p>Ini adalah halaman rahasia khusus yang hanya bisa diakses oleh akun bertipe Admin.</p> 
    <br> 
    <a href="logout.php">Keluar / Logout</a> 
</body> 
</html> 
