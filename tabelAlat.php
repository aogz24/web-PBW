<?php
// Koneksi ke database (ganti dengan informasi koneksi Anda)

require "database.php";

// Query untuk mengambil data dari database
$sql = "SELECT * FROM alat";
$stmt = $conn->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tutup koneksi ke database
$conn = null;
?>