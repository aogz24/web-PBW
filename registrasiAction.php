<?php
session_start();
    require "database.php";

    // Ambil nilai dari formulir
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', md5("1StyU6".$password."lkaj"));

    try {
        $stmt->execute();
        echo "<script>alert('Berhasil membuat akun');</script>";
        header('Location: login.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Tutup koneksi ke database
    $conn = null;
?>
