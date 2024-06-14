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
    <title>Peminjaman Alat</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <style>
        body{
            background-color: #e0dbdb;
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
            width : 20%;
            align-self: center;

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
    <!-- Navbar END -->
    <div class="container1">
        <div class="content">
            <h1>Form Peminjaman</h1>
            <h1>Barang</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta dignissimos praesentium, quod suscipit sunt corporis eius debitis, dolorem quae reprehenderit sint deleniti ad nihil ipsum amet distinctio optio aspernatur quisquam ratione fugiat cupiditate laborum. Minus, nulla quas dolor consequuntur ipsum, numquam pariatur sapiente, dignissimos neque maiores error maxime at facilis!</p>
            <button class="btn" onclick="getData()">Isi dengan data sendiri</button>
        </div>
        <div class="form1">
            <h1>Form Peminjaman Barang</h1>
            <!-- onsubmit="return validateForm2()" -->
            <form enctype="multipart/form-data" action="actionAlat.php" method="post" >
                <label for="nama">Nama</label><br>
                <input type="text" id="nama" name="nama">
                <label></label><br>
                <input type="radio" id="male" name="sex" value="male">
                <label for="male">Laki-laki</label>
                <input type="radio" id="female" name="sex" value="female">
                <label for="male">Perempuan</label><br>
                <label>Angkatan</label><br>
                <select name="angkatan" id="angkatan">
                    <option value="63">SBC 63</option>
                    <option value="64">SBC 64</option>
                </select><br>
                <label>Alat yang akan dipinjam</label><br>
                <input type="checkbox" id="al" name="alat[]" value="kartu">
                <label >Kartu Bridge</label><br>
                <input type="checkbox" id="al" name="alat[]" value="buku bidding">
                <label >Buku Bidding</label><br>
                <input type="checkbox" id="al" name="alat[]" value="kartu bid">
                <label >Kartu Bidding</label><br>
                <label>Tanggal Peminjaman</label><br>
                <input type="date" id="tanggal1" name="tanggal1" onchange="validasi2();"><br>
                <label>Tanggal Pengembalian</label><br>
                <input type="date" id="tanggal2" name="tanggal2" onchange="validasi2();"><br>
                <label for="jumlah">Jumlah yang dipinjam</label><br>
                <input type="number" id="jumlah" name="jumlah" min="1" max="2"> <br>
                <label>Surat peminjaman</label><br>
                <input type="file" id="file" name="file" accept=".pdf" class="file" onchange="validatePDF(file)">
                <div class="button">
                    <input type="submit" class="submit">
                    <input type="reset" class="reset">
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; STIS BRIDGE CLUB</p>
    </footer>
    <script src="asset/js/script.js"></script>
    <script>
        function getData() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "getAkunData.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('angkatan').value = data.angkatan;
                    document.getElementById('angkatan').selected = true;
                }
        };
        xhr.send();
        }
    </script>
</body>
</html>