<?php
    session_start();
    // Cek apakah pengguna belum login, jika ya, arahkan ke halaman login
    if(!isset($_SESSION['login'])) {
        echo '<script>Alert("Anda belum login silahkan login dahulu");</script>';
        header("Location: login.php");
        exit;
    }
    if($_REQUEST['token']!=='1@1SaY4nkIbu'){
        header("Location: Jadwal_Kosong.php");
    }
    $_SESSION['login_time'] = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal kuliah Kosong</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <style>
        body{
            background-color: #e0dbdb;
        }
    </style>
</head>
<body>
    <?php include "header.php"?>
    <!-- Navbar END -->
    <!-- Form jadwal -->
    <div class="container1">
        <div class="content">
            <h1>Form Pengisian</h1>
            <h1>Jadwal Kosong</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta dignissimos praesentium, quod suscipit sunt corporis eius debitis, dolorem quae reprehenderit sint deleniti ad nihil ipsum amet distinctio optio aspernatur quisquam ratione fugiat cupiditate laborum. Minus, nulla quas dolor consequuntur ipsum, numquam pariatur sapiente, dignissimos neque maiores error maxime at facilis!</p>
        </div>
        <div class="form1">
            <h1>Form Jadwal Kosong</h1>
            <div class="container-form1">
                <form action="updateJadwal.php" method="post" onsubmit="return validateForm()">
                    <label for="nama">Nama</label><br>
                    <input type="text" id="nama" name="nama" value="<?php echo $_REQUEST['nama']; ?>"><br>
                    <label for="latian">Latihan secara:</label><br>
                    <input type="radio" id="latian" name="sex" value="daring">
                    <label for="latian">Daring</label>
                    <input type="radio" id="latihan" name="sex" value="luring">
                    <label for="latihan">Luring</label><br>
                    <label>Angkatan</label><br>
                    <select name="angkatan" id="angkatan">
                        <option value="63" <?php if ($_REQUEST['angkatan'] == '63') echo 'selected'; ?>>SBC 63</option>
                        <option value="64" <?php if ($_REQUEST['angkatan'] == '64') echo 'selected'; ?>>SBC 64</option>
                    </select><br>
                    <label>Hari Bisa latihan rutin</label><br>
                    <input type="checkbox" class="hari" id="minggu" name="hari[]" value="minggu">
                    <label for="minggu">Minggu</label><br>
                    <input type="checkbox" class="hari" id="senin" name="hari[]" value="senin">
                    <label for="senin">Senin</label><br>
                    <input type="checkbox" class="hari" id="selasa" name="hari[]" value="selasa">
                    <label for="selasa">Selasa</label><br>
                    <input type="checkbox" class="hari" id="rabu" name="hari[]" value="rabu">
                    <label for="rabu">Rabu</label><br>
                    <input type="checkbox" class="hari" id="kamis" name="hari[]" value="kamis">
                    <label for="kamis">Kamis</label><br>
                    <input type="checkbox" class="hari" id="jumat" name="hari[]" value="jumat">
                    <label for="jumat">Jumat</label><br>
                    <input type="checkbox" class="hari" id="sabtu" name="hari[]" value="sabtu">
                    <label for="sabtu">Sabtu</label><br>
                    <label>Tanggal Kosong</label><br>
                    <input type="date" id="tanggal" name="tanggal" value='<?php echo $_REQUEST['tanggal']?>' onchange="validateTanggal()"><br>
                    <label>Jam Kosong</label><br>
                    <input type="time" id="jam" name="jam" value='<?php echo $_REQUEST['jam']?>'><br>
                    <input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['id']; ?>"><br>
                    <div class="button">
                        <input type="submit" value="Submit" class="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; STIS BRIDGE CLUB</p>
    </footer>
    <!-- Form end -->
    <script src="asset/js/script.js"></script>
    <script>
        function validateTanggal() {
            // Ambil nilai input dari form
            var tanggal = document.getElementById("tanggal").value;

            // Lakukan validasi tanggal menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "validateTanggal.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === "valid") {
                        // Tanggal valid, lanjutkan submit form
                        return true;
                    } else {
                        // Tanggal tidak valid, tampilkan pesan error
                        alert(response);
                        return false;
                    }
                }
            };

            var data = "tanggal=" + encodeURIComponent(tanggal);
            xhr.send(data);

            // Mengembalikan false agar form tidak dikirim secara default
            return false;
        }
    </script>
</body>
</html>