<?php
    session_start();
    require "database.php";
    $id = $_POST['id'];
    $nama = $_POST["nama"];
    $jenisKelamin = $_POST["sex"];
    $angkatan = $_POST["angkatan"];
    $alat = $_POST["alat"];
    $alatStr = implode(", ", $alat);
    $tanggalPeminjaman = $_POST["tanggal1"];
    $tanggalPengembalian = $_POST["tanggal2"];
    $jumlah = $_POST["jumlah"];

    $sql = "UPDATE alat SET nama = :nama, jenis_kelamin = :jenisKelamin, angkatan = :angkatan, alat = :alat, tanggal_peminjaman = :tanggalPeminjaman, tanggal_pengembalian = :tanggalPengembalian, jumlah = :jumlah, surat_peminjaman = :suratPeminjaman WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':jenisKelamin', $jenisKelamin);
    $stmt->bindParam(':angkatan', $angkatan);
    $stmt->bindParam(':alat', $alatStr);
    $stmt->bindParam(':tanggalPeminjaman', $tanggalPeminjaman);
    $stmt->bindParam(':tanggalPengembalian', $tanggalPengembalian);
    $stmt->bindParam(':jumlah', $jumlah);
    $stmt->bindParam(':suratPeminjaman', $suratPeminjaman);
    $stmt->bindParam(':id', $id);
    
    try {
        $stmt->execute();
        header('Location: Peminjaman_alat.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Menutup koneksi
    $conn->null;
?>