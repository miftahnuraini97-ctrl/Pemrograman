CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;

-- Tabel users (untuk user & admin, dibedakan lewat kolom role)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user','admin') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel buku
CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    tahun_terbit YEAR NOT NULL,
    lokasi VARCHAR(100) NOT NULL,   -- contoh: Rak A1, Lantai 2
    stok INT NOT NULL DEFAULT 1,
    status ENUM('tersedia','dipinjam') NOT NULL DEFAULT 'tersedia',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel peminjaman
CREATE TABLE IF NOT EXISTS peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buku_id INT NOT NULL,
    nama_peminjam VARCHAR(100) NOT NULL,
    kontak_peminjam VARCHAR(50),
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali DATE NULL,
    status ENUM('dipinjam','dikembalikan') NOT NULL DEFAULT 'dipinjam',
    FOREIGN KEY (buku_id) REFERENCES buku(id) ON DELETE CASCADE
);

-- Akun admin default (username: admin, password: admin123)
INSERT INTO users (nama, username, password, role)
VALUES ('Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.YeWHrkLpqIfvAhUM6QM4hSSDhqIQpb4dC', 'admin');
-- hash di atas = password "admin123"

-- Contoh data buku
INSERT INTO buku (judul, penulis, tahun_terbit, lokasi, stok, status) VALUES
('Laskar Pelangi', 'Andrea Hirata', 2005, 'Rak A1', 3, 'tersedia'),
('Bumi Manusia', 'Pramoedya Ananta Toer', 1980, 'Rak A2', 2, 'tersedia'),
('Filosofi Teras', 'Henry Manampiring', 2018, 'Rak B1', 1, 'tersedia');
