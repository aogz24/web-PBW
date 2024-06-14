<?php
    session_start();
    // Cek apakah pengguna belum login, jika ya, arahkan ke halaman login
    if(!isset($_SESSION['login'])) {
        echo '<script>Alert("Anda belum login silahkan login dahulu");</script>';
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STIS BRIDGE CLUB</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <style>
        body{
            background-color: rgb(224, 219, 219);
        }
    </style>
</head>
<body>
    <?php include "header.php"?>
    <!-- Content 1-->
    <div class="container-content">
        <div class="content">
            <h1>Selamat Datang <?php echo $_SESSION['username']?></h1>
            <h1>di STIS BRIDGE CLUB STIS</h1>
            <p>STIS Bridge Club (SBC) merupakan bagian dari UKM Olahraga bidang strategi yang menjadi wadah bagi mahasiswa Politeknik Statistika STIS untuk mempelajari, mengembangkan bakat, dan meraih prestasi pada cabang olahraga Bridge.</p>
            
            <div class="button">
                <a href="about.php">
                    <button type="button" class="Bridge">About Bridge</button>
                </a>
                <a href="Jadwal_Kosong.php">
                    <button type="button" class="jadwal" style="text-transform: capitalize;"> Jadwal Kosong</button>
                </a>
                 
            </div>
        </div>
        <div class="img-content">
            <img src="asset/img/Foto.jpg" alt="foto">
        </div>      
    </div>
<!-- Content End -->

<!-- Footer -->
<footer>
    <p>&copy; STIS BRIDGE CLUB</p>
</footer>
<!-- Footer END -->

<script src="asset/js/script.js"></script>    
</body>
</html>