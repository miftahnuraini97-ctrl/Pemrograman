<?php session_start(); 
 
// Proteksi halaman User 
if (!isset($_SESSION['user'])) {     echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";     exit; 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head><title>Dashboard User</title></head> 
<body> 
    <h1>Halo Pengguna, <?php echo $_SESSION['username']; ?>!</h1> 
    <p>Ini adalah halaman dashboard profil utama Anda.</p> 
    <br> 
    <a href="logout.php">Keluar / Logout</a> 
</body> 
</html> 
