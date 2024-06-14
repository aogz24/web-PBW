<?php

require "database.php";

// Query untuk mengambil data dari database
$sql = "SELECT * FROM jadwal";
$stmt = $conn->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tutup koneksi ke database
$conn = null;
?>