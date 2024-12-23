<?php
// OOP untuk controller buku yang berisi create dan get buku
class BukuController {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function createBuku($namaBuku, $penulis, $tahunTerbit, $kategori, $status) {

        // Validasi sisi server
        if (empty($namaBuku)) {
            return ['error' => 'Nama buku tidak boleh kosong.'];
        }
        if (empty($penulis)) {
            return ['error' => 'Pengarang tidak boleh kosong.'];
        }
        if ($tahunTerbit < 1800 || $tahunTerbit > date('Y')) {
            return ['error' => 'Tahun terbit tidak valid.'];
        }
        if (empty($kategori) || !is_array($kategori)) {
            return ['error' => 'Minimal satu kategori harus dipilih.'];
        }
        if (!in_array($status, ['Tersedia', 'Dipinjam'], true)) {
            return ['error' => 'Status tidak valid.'];
        }

        // Gabungkan kategori
        $kategoriStr = implode(",", $kategori);

        // Masukkan ke database
        $stmt = $this->connection->prepare("INSERT INTO Buku (namaBuku, penulis, tahunTerbit, kategori, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $namaBuku, $penulis, $tahunTerbit, $kategoriStr, $status);

        if ($stmt->execute()) {
            $stmt->close();
            return ['message' => 'Data berhasil ditambahkan!'];
        } else {
            $stmt->close();
            return ['error' => 'Gagal menambahkan data ke database.'];
        }
    }

    public function getBuku() {
        $result = $this->connection->query("SELECT * FROM Buku");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
