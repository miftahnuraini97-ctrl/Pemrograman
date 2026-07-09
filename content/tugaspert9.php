<?php
echo "<h1>Belajar PHP - Tugas Pertemuan 9</h1>";
?>

<h2>Cek Kategori Usia Mahasiswa</h2>

<h5> Selamat datang di sistem Pengecekan Kategori Usia Mahasiswa! Silakan masukkan Nama dan Umur Anda </h5>

<form method="POST">
    Nama :
    <input type="text" name="nama" placeholder="Masukkan nama" required>
    <br><br>

    Umur :
    <input type="number" name="umur" placeholder="Masukkan umur" required>
    <br><br>

    <button type="submit" name="submit">Cek Kategori</button>
</form>

<hr>

<?php
if (isset($_POST['submit'])) {

    // Variabel
    $nama = $_POST['nama'];
    $umur = (int) $_POST['umur'];

    // Percabangan if elseif else
    if ($umur < 13) {
        $kategori = "Anak-anak";
    } elseif ($umur >= 13 && $umur <= 17) {
        $kategori = "Remaja";
    } elseif ($umur >= 18 && $umur <= 59) {
        $kategori = "Dewasa";
    } else {
        $kategori = "Lansia";
    }

    // Output
   echo "<h3>Hasil</h3>";
   echo "<p>Halo, <b>$nama</b>!</p>";
   echo "<p>Usia Anda <b>$umur tahun</b> dan kamu dikategorikan <b>$kategori</b>.</p>";
}
?>