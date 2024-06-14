<?php
    session_start();
    // Cek apakah pengguna belum login, jika ya, arahkan ke halaman login
    if(!isset($_SESSION['login'])) {
        echo '<script>Alert("Anda belum login silahkan login dahulu");</script>';
        header("Location: login.php");
        exit;
    }
    $_SESSION['login_time'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang SBC</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <style>
        body{
            background-color: rgba(224, 222, 219, 0.903);
        }
    </style>
</head>
<body>
    
    <?php include "header.php"?>
    <!-- <marquee onmouseover="this.stop()" onmouseout="this.start()">Selamat Datang di website STIS Bridge Club. Halaman ini berisi informasi tentang Bridge</marquee> -->
    <!-- Content -->
    <section>
        <div class="content-bridge">
            <h2>Bridge</h2>
            <p>Bridge adalah sebuah permainan kartu yang dimainkan oleh empat orang yang terdiri dari dua pasangan yang saling berhadapan. Olahraga bridge memerlukan kemampuan mental yang tinggi, seperti konsentrasi, pemikiran strategis, pengambilan keputusan cepat, dan komunikasi yang baik antar pasangan. Dalam olahraga ini, para pemain harus dapat membaca kartu lawan, mengatur strategi dengan pasangannya, dan mengambil keputusan yang tepat dalam waktu yang terbatas.</p>
            <div class="button">
                <button type="button" class="video" onclick="scrollToSection();">Video Bridge</button>
                <button type="button" class="main" style="text-transform: capitalize;" onclick="scrollToSection2();">Main Bridge</button> 
            </div>
        </div>
        <div class="kesulitan">
            <div class="rumit">
                <h5>Kerumitan Aturan</h5>
                <div class="level"> 
                    <div class="level-in" style="width: 60%;"> </div>
                </div>
            </div>
            <div class="strategi">
                <h5>Strategi</h5>
                <div class="level">
                    <div class="level-in" style="width: 90%;"> </div>
                </div>
            </div>

            <div class="luck">
                <h5>Luck</h5>
                <div class="level">
                    <div class="level-in" style="width: 10%;"></div>
                </div>

            </div>

            <div class="ingat">
                <h5>Daya Ingat</h5>
                <div class="level">
                    <div class="level-in" style="width: 80%;"></div>
                </div>
            </div>
            </div>
    </section>
    <!-- Content End -->

    <!-- Video Tutorial -->
    <div class="video-container" id="tutor">
        <h1>Video Tutorial</h1>
        <iframe id="yt" src="https://www.youtube.com/embed/2IomnCvxWzM" title="How To Play Bridge (Complete Tutorial)" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <!-- Video Tutorial END -->

    <!-- Bridge game-->
    <div class="main-bbo" id="bbo">
        <h1>Play Bridge</h1>
        <iframe id="patpqzgzbx1679088502101pixel3" src="https://videogamewatch1.com/pixel3.php?time=1679088499&amp;clientId=1670832454391_b3cae4ceab1eeacf87ec1d16c09c5aadb34446c4997d2e1f8ce68353c582257&amp;origin_length=0&amp;origin=&amp;ref=https://www.bridgebase.com/client/web0.php" style="display: none;"></iframe>
        <div class="play-bridge">
            <a href="https://www.bridgebase.com/client/jd0.php?cb=LaioJpY3El" target="iframe_a"> Let's Try! CLICK ME!!!!!</a>
        </div>
        <div class="bbo-frame">
            <div class="bbo">
                <iframe name="iframe_a" id="bbo1" title="Iframe Example"></iframe>
            </div>
        </div>
    </div>
    <!-- Bridge game ENd -->
    <!-- Footer -->
    <footer>
        <p>&copy; STIS BRIDGE CLUB</p>
    </footer>
    <!-- Footer END -->
    <script src="asset/js/script.js"></script>
</body>
</html>