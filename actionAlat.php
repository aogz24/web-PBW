<?php
 require "database.php";

// Ambil nilai dari formulir
$nama = $_POST["nama"];
$jenisKelamin = $_POST["sex"];
$angkatan = $_POST["angkatan"];
$alat = $_POST["alat"];
$alatStr = implode(", ", $alat);
$tanggalPeminjaman = $_POST["tanggal1"];
$tanggalPengembalian = $_POST["tanggal2"];
$jumlah = $_POST["jumlah"];

if ($tanggalPeminjaman > $tanggalPengembalian) {
    $tanggalPengembalian = date("Y-m-d", strtotime($tanggalPeminjaman . "+3 days"));
  }

$timestamp = time(); // Timestamp saat ini
$randomNumber = mt_rand(1000, 9999); // Nomor acak antara 1000 dan 9999
$fileExtension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION); // Ekstensi file asli

$newFileName = $timestamp . "_" . $randomNumber . "." . $fileExtension;

$targetDir = "uploads/";
$targetFile = $targetDir . $newFileName;
move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);

$suratPeminjaman = $newFileName;

// Query untuk menyimpan data ke database dengan parameter yang di-bind
$sql = "INSERT INTO alat (nama, jenis_kelamin, angkatan, alat, tanggal_peminjaman, tanggal_pengembalian, jumlah, surat_peminjaman, email_pembuat) VALUES (:nama, :jenisKelamin, :angkatan, :alat, :tanggalPeminjaman, :tanggalPengembalian, :jumlah, :suratPeminjaman, :email)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nama', $nama);
$stmt->bindParam(':jenisKelamin', $jenisKelamin);
$stmt->bindParam(':angkatan', $angkatan);
$stmt->bindParam(':alat', $alatStr);
$stmt->bindParam(':tanggalPeminjaman', $tanggalPeminjaman);
$stmt->bindParam(':tanggalPengembalian', $tanggalPengembalian);
$stmt->bindParam(':jumlah', $jumlah);
$stmt->bindParam(':suratPeminjaman', $suratPeminjaman);
$stmt->bindParam(':email', $_SESSION['email']);

try {
    $stmt->execute();
    header('Location: Peminjaman_alat.php');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Tutup koneksi ke database
$conn = null;
?>
