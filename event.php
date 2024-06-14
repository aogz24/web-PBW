<?php
    session_start();
    // Cek apakah pengguna belum login, jika ya, arahkan ke halaman login
    if(!isset($_SESSION['login'])) {
        echo '<script>Alert("Anda belum login silahkan login dahulu");</script>';
        header("Location: login.php");
        exit;
    }
    $sessionTimeout = 1800;
    $elapsedTime = time() - $_SESSION['login_time'];

        // Memeriksa apakah waktu sesi sudah melewati batas
        if ($elapsedTime > $sessionTimeout) {
            // Menghapus sesi dan mengarahkan pengguna ke halaman login
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit();
        }
        // Mengupdate waktu sesi login dengan waktu saat ini
        $_SESSION['login_time'] = time();
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
        .container-content1{
            background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  
            background: linear-gradient(to right, #ffffff, #abbaab); 
            display: flex;
            align-items: center;
            flex-direction: column; 
        }
        .marquee{
            font-size: medium;
            color: rgb(174, 31, 193);
            text-align: center;
            background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  
            background: linear-gradient(to right, #ffffff, #abbaab);
            font-size: medium;
        }
        #agenda{
            width: 95vw;
            height: 80vh;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include "header.php"?>
    <!-- Content 1-->
    <!-- <marquee onmouseover="this.stop()" onmouseout="this.start()">Agenda Kegiatan STIS BRIDGE CLUB</marquee> -->
    <!-- <marque onmouseover="this.stop()" onmouseout="this.start()"></marque> -->
    <div class="container-content1">
        <div class="marque">
            Agenda Kegiatan STIS BRIDGE CLUB
        </div>
        <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%237986CB&ctz=Asia%2FJakarta&showTitle=0&src=MjIyMTExODU1QHN0aXMuYWMuaWQ&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=dWttc2JjQHN0aXMuYWMuaWQ&color=%23039BE5&color=%230B8043&color=%23F6BF26" style="border:solid 1px #777" id="agenda"></iframe>
    </div>
    <!-- Content End -->

<!-- Footer -->
<footer>
    <p>&copy; STIS BRIDGE CLUB</p>
</footer>
<!-- Footer END -->

<script src="asset/js/script.js"></script>  
<script src="asset/js/landing.js"></script>  
</body>
</html>