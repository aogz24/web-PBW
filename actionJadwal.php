<?php
    session_start();
    require "database.php";

    // Ambil nilai dari formulir
    $nama = $_POST["nama"];
    $latihan = $_POST["sex"];
    $angkatan = $_POST["angkatan"];
    $hari = $_POST["hari"];
    $hariStr = implode(", ", $hari);
    $tanggal = $_POST["tanggal"];
    $jam = $_POST["jam"];

    if ($tanggal < $today) {
        $tanggal = $today;
      }

    
    $sql = "INSERT INTO jadwal (nama, latihan, angkatan, hari, tanggal, jam, email_pembuat) VALUES (:nama, :latihan, :angkatan, :hari, :tanggal, :jam, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':latihan', $latihan);
    $stmt->bindParam(':angkatan', $angkatan);
    $stmt->bindParam(':hari', $hariStr);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':jam', $jam);
    $stmt->bindParam(':email', $_SESSION['email']);

    try {
        $stmt->execute();
        header('Location: Jadwal_Kosong.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Tutup koneksi ke database
    $conn = null;
?>
