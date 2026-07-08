<?php 
require 'koneksi.php'; 

// Ensure $conn is defined (fallback if koneksi.php did not set it)
if (!isset($conn) || !$conn) {
    // Attempt a default local connection (adjust credentials if needed)
    $conn = @mysqli_connect('localhost', 'root', '', '');
    if (!$conn) {
        die('Database connection not found and default connection failed.');
    }
}
 
if (isset($_POST['register'])) { 
    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = $_POST['password']; 
    $role     = $_POST['role']; 
 
    // Enkripsi password demi keamanan 
    $password_encrypted = password_hash($password, PASSWORD_DEFAULT); 
 
    // Cek apakah username sudah terdaftar 
    $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'"); 
    if (mysqli_num_rows($cek_user) > 0) {         echo "<script>alert('Username sudah digunakan!'); window.location='register.php';</script>"; 
    } else { 
        // Simpan data user baru 
        $query = "INSERT INTO users (username, password, role) VALUES 
('$username', '$password_encrypted', '$role')";         if (mysqli_query($conn, $query)) {             echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='login.php';</script>"; 
        } else { 
            echo "Error: " . mysqli_error($conn); 
        } 
    } 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head><title>Form Registrasi</title></head> 
<body> 
    <h2>Registrasi Akun Baru</h2> 
    <form method="POST" action=""> 
        <label>Username:</label><br> 
        <input type="text" name="username" required><br><br>  
        <label>Password:</label><br> 
        <input type="password" name="password" required><br><br>  
        <label>Daftar Sebagai:</label><br> 
        <select name="role"> 
            <option value="user">User Biasa</option> 
            <option value="admin">Admin</option> 
        </select><br><br> 
 
        <button type="submit" name="register">Daftar</button> 
    </form> 
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p> 
</body> 
</html> 
