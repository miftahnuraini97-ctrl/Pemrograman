<?php session_start(); require_once __DIR__ . '/koneksi.php'; 

if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

if (isset($_POST['login'])) { 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; 
 
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username 
= '$username'"); 
     
    if (mysqli_num_rows($result) === 1) { 
        $row = mysqli_fetch_assoc($result); 
         
        // Verifikasi kecocokan password terenkripsi        
         if (password_verify($password, $row['password'])) { 
             
            // Membuat Session data pengguna 
            $_SESSION['id_user']  = $row['id']; 
            $_SESSION['username'] = $row['username'];             $_SESSION['role']     = $row['role'];  
            // Pemisahan Redirect halaman berdasarkan Role             
            if ($row['role'] == 'admin') { 
                header("Location: dashboard_admin.php");                 exit; 
            } elseif ($row['role'] == 'user') {                 header("Location: dashboard_user.php");                 exit; 
            } 
        } 
    } 
    $error = true; 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head><title>Form Login</title></head> 
<body> 
    <h2>Halaman Login</h2> 
    <?php if(isset($error)) : ?> 
        <p style="color: red;">Username atau Password salah!</p> 
    <?php endif; ?> 
 
    <form method="POST" action=""> 
        <label>Username:</label><br> 
        <input type="text" name="username" required><br><br> 
 
        <label>Password:</label><br> 
        <input type="password" name="password" required><br><br> 
 
        <button type="submit" name="login">Masuk</button> 
    </form> 
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</body> 
</html> 
