<?php
// Konfigurasi Database
$host     = "localhost";     // Server database (biasanya localhost jika menggunakan XAMPP/Laragon)
$username = "root";          // Username default database
$password = "";              // Password default database (biasanya kosong)
$database = "db_portofolio"; // Sesuaikan dengan nama database yang kamu buat

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Mengecek apakah koneksi berhasil atau gagal
if ($conn->connect_error) {
    // Jika gagal, proses akan dihentikan dan menampilkan pesan error
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengatur charset ke UTF-8 untuk mendukung berbagai jenis karakter (opsional tapi sangat disarankan)
$conn->set_charset("utf8");

// Catatan: Jangan hapus tag penutup "? >" di bawah ini jika file ini hanya berisi PHP murni.
// Namun, jika kamu ingin meng-include file ini ke file lain, praktik terbaik adalah menghilangkan tag penutupnya.
?>