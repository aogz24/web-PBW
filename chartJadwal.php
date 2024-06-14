<?php
require "database.php";

// Query untuk mengambil data hari dari database
$sql = "SELECT hari FROM jadwal";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Memproses data hari menjadi array terpisah
$hariCount = array();
foreach ($results as $row) {
    $hariArr = explode(", ", $row['hari']);
    foreach ($hariArr as $hari) {
        if (isset($hariCount[$hari])) {
            $hariCount[$hari]++;
        } else {
            $hariCount[$hari] = 1;
        }
    }
}

// Memformat data untuk digunakan dalam chart
$hariLabels = array_keys($hariCount);
$jumlahData = array_values($hariCount);

// Tutup koneksi ke database
$conn = null;
?>
