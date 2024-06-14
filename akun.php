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
    <title>Akun</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <style>
        body{
            background-color: rgba(224, 222, 219, 0.903);
            font-family: Arial, sans-serif;
        }
    h1 {
      text-align: center;
    }

    .info-container {
      max-width: 400px;
      margin: 0 auto;
      height:74vh;
    }

    .info-container p {
      margin-bottom: 10px;
    }

    .info-container label {
      font-weight: bold;
    }

    .info-container input {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 14px;
    }
    footer{
        width:100vw;
        bottom:0;
    }

    .btn{

        font-family: Roboto, sans-serif;
        font-weight: 0;
        font-size: 14px;
        color: #fff;
        background-color: #0066CC;
        padding: 10px 30px;
        border: 2px solid #0066cc;
        box-shadow: rgb(0, 0, 0) 0px 0px 0px 0px;
        border-radius: 50px;
        transition : 1000ms;
        transform: translateY(0);
        display: flex;
        flex-direction: row;
        align-items: center;
        cursor: pointer;
    }

    .btn:hover{

        transition : 1000ms;
        padding: 10px 50px;
        transform : translateY(-0px);
        background-color: #fff;
        color: #0066cc;
        border: solid 2px #0066cc;
    }
    a{
        text-decoration:none;
    }
    </style>
</head>
<body>
    
    <?php include "header.php"?>
    <h1>Informasi Akun</h1>

  <div class="info-container">
    <?php 
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    include "cariAkun.php"?>
    <p>
      <label for="nama">Nama:</label>
      <input type="text" id="nama" value="<?php echo $nama ?>" readonly style="color:black;">
    </p>
    <p>
      <label for="email">Email:</label>
      <input type="email" id="email" value="<?php echo $email ?>" readonly style="color:black;">
    </p>
    <p>
      <label for="kelas">Kelas:</label>
      <input type="text" id="kelas" value="<?php echo $kelas ?>" readonly style="color:black;">
    </p>
    <p>
      <label for="angkatan">Angkatan:</label>
      <input type="text" id="angkatan" value="<?php echo $angkatan ?>" readonly style="color:black;">
    </p>
    <p>
      <label for="alamat">Alamat:</label>
      <input type="text" id="alamat" value="<?php echo $alamat ?>" readonly style="color:black;">
    </p>
    <a href="ubahAkun.php">
        <button class="btn">Ubah</button>
    </a>
    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; STIS BRIDGE CLUB</p>
    </footer>
    <!-- Footer END -->
    <script src="asset/js/script.js"></script>
</body>
</html>