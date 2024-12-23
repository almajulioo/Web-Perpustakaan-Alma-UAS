<?php 
  Require "SessionManagement.php";
  storeUserState();
  $informasi = getState("user_state");
  echo "Browser Pengguna : " . $informasi['browser'] . "<br>";
  echo "IP Pengguna : " . $informasi['ip'] . "<br>";
  echo "Access Count : " . $informasi['access_count'] . "<br>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Form Pendataan Buku Perpustakaan</title>
  </head>
  <body>
    <div class="container">
      <h1>Form Pendataan Perpustakaan</h1>
      <p id="responseMessage"></p>
      <form id="bukuForm" action="RequestHandler.php" method="POST">
        <!-- Input Nama Buku -->
        <p class="bukuError error-message">Nama buku harus diisi</p>
        <div class="form-group">
          <label for="namaBuku">Nama Buku</label>
          <input type="text" id="namaBuku" name="namaBuku" required />
        </div>

        <!-- Input Pengarang -->
        <p class="penulisError error-message">Penulis harus diisi</p>
        <div class="form-group">
          <label for="penulis">Pengarang</label>
          <input type="text" id="penulis" name="penulis" required />
        </div>

        <!-- Input Tahun Terbit -->
        <p class="tahunTerbitError error-message">Tahun terbit harus diisi</p>
        <div class="form-group">
          <label for="tahunTerbit">Tahun Terbit</label>
          <input
            type="number"
            id="tahunTerbit"
            name="tahunTerbit"
              required
          />
        </div>

        <!-- Checkbox Kategori Buku -->
        <div class="form-group">
          <label for="category">Kategori</label>
          <label><input type="checkbox" name="category[]" value="Fiksi" />Fiksi</label>
          <label><input type="checkbox" name="category[]" value="Non-Fiksi" />Non-Fiksi</label>
          <label><input type="checkbox" name="category[]" value="Edukasi" />Edukasi</label>
        </div>

        <!-- Radio Status Buku -->
        <div class="form-group">
          <label>Status</label>
          <label><input type="radio" name="status" value="Tersedia" required />Tersedia</label>
          <label><input type="radio" name="status" value="Dipinjam" />Dipinjam</label>
        </div>

        <!-- Submit Button -->
        <button type="submit">Simpan Data</button>
      </form>

      <!-- Tabel Data Buku -->
      <h2>Data Buku</h2>
      <table id="bukuTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Buku</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Kategori</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <div class="container">
      <h1>Cookie Management</h1>
      <form class="cookie-form" method="POST">
        <input type="text" name="cookie_name" placeholder="Nama Cookie (theme)">
        <input type="text" name="cookie_value" placeholder="Nilai Cookie (dark atau light)">
        <button name="action" value="set">Set Cookies</button>
        <button style="margin-top: 10px;" name="action" value="get">Get Cookies</button>
      </form>
      <p id="cookieMessage">Value : </p>
    </div>

      <div class="container">
    <h1>Manajemen Catatan</h1>
    <form id="catatanForm">
      <input type="text" id="catatanInput" placeholder="Masukkan catatan" required>
      <button type="submit">Tambah Catatan</button>
    </form>
    <ul id="catatanList"></ul>
  </div>

  <!-- Script untuk local storage management -->
  <script src="js/storageManagement.js"></script>

    <!-- Script untuk cookie management -->
    <script src="js/cookieManagement.js"></script>

    <!-- Script untuk event handling -->
    <script src="js/eventhandling.js"></script>
      
    <!-- Script untuk mengirim data ke server -->
    <script src="js/fetchDataAndSubmit.js"></script>
  </body>
</html>
