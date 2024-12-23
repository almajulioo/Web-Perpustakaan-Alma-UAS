<?php
require 'Koneksi.php';
require 'BukuController.php';

// Menerima request json 
header('Content-Type: application/json'); 

// Koneksi Ke Database
$koneksi = new Koneksi();
$dbConnection = $koneksi->connect();
$controller = new BukuController($dbConnection);

try {
    // Handle request post
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['namaBuku'], $_POST['penulis'], $_POST['tahunTerbit'], $_POST['category'], $_POST['status'])) {
            $namaBuku = $_POST['namaBuku'];
            $penulis = $_POST['penulis'];
            $tahunTerbit = $_POST['tahunTerbit'];
            $kategori = $_POST['category'];
            $status = $_POST['status'];

            $result = $controller->createBuku($namaBuku, $penulis, $tahunTerbit, $kategori, $status);
            echo json_encode($result); 
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Input tidak lengkap.']);
        }
    // Handle request get
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = $controller->getBuku();
        echo json_encode($data); 
    // Menolak request lain
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Metode HTTP tidak didukung.']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Kesalahan pada server: ' . $e->getMessage()]);
}

$koneksi->close();
?>
