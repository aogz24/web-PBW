<?php

session_start();

// Koneksi ke database (ganti dengan informasi koneksi Anda)
require "database.php";

// Query untuk mengambil data dari database
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM akun WHERE email=:email");
$stmt->execute(array(':email' => $email));
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);

// Tutup koneksi ke database
$conn = null;
?>
