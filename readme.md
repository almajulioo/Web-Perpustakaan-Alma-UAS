# **Penjelasan Website Manajemen Buku **

## **Bagian 1: Client-side Programming (Bobot: 30%)**

### **1.1 Manipulasi DOM dengan JavaScript (15%)**

- **Form**:
  Ada lima elemen input yaitu untuk nama buku, pengarang, tahun terbit, kategori, dan status buku
- **Tabel**:
  Tabel ditampilkan dari servel dengan nama tabel yaitu buku

### **1.2 Event Handling (15%)**

- **Implementasi**:
  - Handle form dilakukan ketika keydown untuk mengecek apakah setiap text input kosong atau tidak,
  - Kemudian dilakukan juga pengecekan saat submit untuk harus mengisi form category yang berbentuk radio
  - Terakhir ada input untuk handle focus dan blur

---

## **Bagian 2: Server-side Programming (Bobot: 30%)**

### **2.1 Pengelolaan Data dengan PHP (20%)**

- **Implementasi**:
  - Berhasil Menangani request `GET` dan `POST`.
  - Validasi data sebelum menyimpan ke database dilakukan pada BukuController.php.
  - Respons dalam format JSON untuk komunikasi dengan client.

### **2.2 Objek PHP Berbasis OOP (10%)**

- **Implementasi**:
  - BukuController dan Koneksi menggunakan OOP.
  - BukuController memiliki method getBuku dan createBuku.

---

## **Bagian 3: Database Management (Bobot: 20%)**

### **3.1 Pembuatan Tabel Database (5%)**

- **Implementasi**:
  - Perintah SQL untuk membuat database dan tabel ada di Perpustakaan.sql
  - Tipe data juga sudah ditentukan sesuai dengan kebutuhan.

### **3.2 Konfigurasi Koneksi Database (5%)**

- **Implementasi**:
  - Menyediakan konfigurasi seperti host, username, password, dan nama database di Koneksi.php.

### **3.3 Manipulasi Data pada Database (10%)**

- **Implementasi**:
  - Menghandle Create dan Read untuk tabel Buku

---

## **Bagian 4: State Management (Bobot: 20%)**

### **4.1 State Management dengan Session (10%)**

- **Implementasi**:
  - Menyimpan data pengguna seperti browser, ip dan access_count dalam session.
  - Mengatur state dalam stateManagement.php terdapat fungsi untuk storeState, getState dan removeState
  - Menggunakan `session_start()` untuk memulai sesi.

### **4.2 Pengelolaan State dengan Cookie dan Browser Storage (10%)**

- **Implementasi**:
  - Mengelola state theme dengan cookie dengan javascript pada cookieManagement.js
  - Mengelola state catatan dengan lokal storage dengan javascript pada storageManagement.js

---

## Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)##

- **Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?**:
  -
