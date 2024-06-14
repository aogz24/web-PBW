<?php
    session_start();
    
    require "database.php";

    // Ambil nilai dari formulir
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $angkatan = $_POST["angkatan"];
    $kelas = $_POST["kelas"];
    $alamat = $_POST["alamat"];
    $email2 = $_POST["email"];

    

    $sql_check = "SELECT COUNT(*) FROM akun WHERE email = :email";
    $statement = $conn->prepare($sql_check);
    $statement->bindParam(':email', $email);
    $statement->execute();
    $count = $statement->fetchColumn();

    if($count>0){
        $sql = "UPDATE akun SET nama = :nama, email = :email, angkatan = :angkatan, kelas = :kelas, alamat = :alamat WHERE email = :email2";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':angkatan', $angkatan);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':email2', $email2);
    } else{
        $sql = "INSERT INTO akun (nama, email, angkatan, kelas, alamat) VALUES (:nama, :email, :angkatan, :kelas, :alamat)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':angkatan', $angkatan);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindParam(':alamat', $alamat);
    }
    
    try {
        $stmt->execute();
        header('Location: akun.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Tutup koneksi ke database
    $conn = null;
?>
