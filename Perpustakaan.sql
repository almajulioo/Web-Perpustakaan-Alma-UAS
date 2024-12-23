-- Membuat database PerpustakaanAlma
CREATE DATABASE PerpustakaanAlma;

-- Menggunakan database PerpustakaanAlma
USE PerpustakaanAlma;

-- Membuat tabel Buku
CREATE TABLE Buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    namaBuku VARCHAR(255) NOT NULL,
    penulis VARCHAR(255) NOT NULL,
    tahunTerbit YEAR NOT NULL,
    kategori VARCHAR(255) NOT NULL,
    status ENUM('Tersedia', 'Dipinjam') NOT NULL
);
