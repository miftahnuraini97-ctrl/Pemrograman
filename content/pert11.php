<?php 
 
// deklarasi variabel 
$db_host = "localhost"; 
$db_user = "root"; 
$db_pass = ""; 
$db_name = "[nama_database]"; 
 
$connenction = mysqli_connect($db_host, $db_user, $db_pass, 
$db_name); 
 
if ($connenction) {     echo '     <script> 
        alert("Koneksi dengan database berhasil"); 
    </script>'; } else {     echo '     <script> 
        alert("Koneksi dengan database gagal"); 
    </script>' . mysqli_connect_error(); 
} 
?> 
 
$db_host = "localhost"; 
$db_user = "root"; 
$db_pass = ""; 
$db_name = "[nama_database]"; 
 
$connenction = mysqli_connect($db_host, $db_user, $db_pass, 
$db_name);  
 
if ($connenction) {  
<script> 
    alert("Koneksi dengan database berhasil"); 
</script>'; 
 
else {     echo '     <script> 
        alert("Koneksi dengan database gagal"); 
    </script>' . mysqli_connect_error(); 
} 
