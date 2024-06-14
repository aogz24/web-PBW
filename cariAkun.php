<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "database.php";

// Query untuk mengambil data dari database
$email=$_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM akun WHERE email=:email");
$stmt->execute(array(':email' => "$email"));
$result = $stmt->fetch();
if($result){
    $nama= $result['nama'];
    $email= $result['email'];
    $angkatan=$result['angkatan'];
    $kelas=$result['kelas'];
    $alamat=$result['alamat'];
}

// Tutup koneksi ke database
$conn = null;
?>