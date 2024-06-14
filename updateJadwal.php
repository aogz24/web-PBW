<?php
    session_start();
    require "database.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $latian = $_POST['sex'];
    $angkatan = $_POST['angkatan'];
    $hari = $_POST['hari'];
    $hariStr = implode(", ", $hari);
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    $sql = "UPDATE jadwal SET nama=:nama, latihan=:latihan, angkatan=:angkatan, hari=:hari, tanggal=:tanggal, jam=:jam WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':latihan', $latian);
    $stmt->bindParam(':angkatan', $angkatan);
    $stmt->bindParam(':hari', $hariStr);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':jam', $jam);
    $stmt-> bindParam(':id', $id);
    
    try {
        $stmt->execute();
        header('Location: Jadwal_Kosong.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Menutup koneksi
    $conn->null;
?>