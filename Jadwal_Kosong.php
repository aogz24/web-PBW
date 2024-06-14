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
    <title>Jadwal Kosong</title>
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <style>
        body{
            background-color:rgb(215, 229, 229);
        }
        .submit {
        font-family: Roboto, sans-serif;
        font-weight: 600;
        font-size: 16px;
        color: #fff;
        background-color: #0066CC;
        padding: 10px 30px;
        border: none;
        border-radius: 50px;
        transition: 0.3s;
        cursor: pointer;
        width: 20%;
        align-self: center;
    }

    .submit:hover {
        background-color: #fff;
        color: #0066CC;
        border: 2px solid #0066CC;
        transition: 0.3s;
    }

    </style>
</head>
<body>
    <?php include "header.php"?>
    <h1>Jadwal Kosong</h1>
    <div class="tampilan">
        <label for="tampilan">Tampilan : </label>
        <select name="tampilan" id="tampilan">
            <option value="semua">Tabel dan Chart</option>
            <option value="table">Tabel</option>
            <option value="chart">Chart</option>
        </select>
    </div>

    <form class="example" action="">
        <input type="text" placeholder="Cari dengan nama..." name="search" onkeyup="showHint(this.value)">
    </form>

    
    <div id="table-jadwal" style="width: 100vw; height:80%; overflow: scroll;">
        <table style="width:98%; margin : auto; align-self: center;">
            <thead>
            <tr>
                <th>
                    Nama
                    <span onclick="sortTable('nama')" id="nama">&#9652;</span>
                </th>
                <th >
                    Latihan
                    <span onclick="sortTable('latihan')" id="latihan">&#9652;</span>
                </th>
                <th >
                    Angkatan
                    <span onclick="sortTable('angkatan')" id="angkatan">&#9652;</span>
                </th>
                <th >
                    Hari Bisa Latihan Rutin
                </th>
                <th >
                    Tanggal Kosong Kelas
                    <span onclick="sortTable('tanggal')" id="tanggal">&#9652;</span>
                </th>
                <th >
                    Jam Kosong
                    <span onclick="sortTable('jam')" id="jam">&#9652;</span>
                </th>
                <?php if($_SESSION['isAdmin']==1 or $_SESSION['email']==$row['email_pembuat']){
                        echo '<th>action</th>';
                    } ?>
            </tr>
            </thead>
            <tbody id="bodi">
            <?php require "tabelJadwalKosong.php" ?>
            <?php 
            // Menampilkan data
                if (count($results) > 0) {
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['latihan'] . "</td>";
                        echo "<td>" . $row['angkatan'] . "</td>";
                        echo "<td>" . $row['hari'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['jam'] . "</td>";
                        if($_SESSION['isAdmin']==1 or $_SESSION['email']==$row['email_pembuat']){
                            echo "<td style='display:flex'>";
                            echo "<a href='deleteJadwal.php?id=",$row["id"],"'><img src='asset/img/remove.png' style='width:30px;height:30px;'></a>";
                            echo "<a>";
                            echo "<form action='Form_jadwal_kosong2.php' method='post'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<input type='hidden' name='token' value='1@1SaY4nkIbu'>";
                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                            echo "<input type='hidden' name='nama' value='" . $row['nama'] . "'>";
                            echo "<input type='hidden' name='angkatan' value='" . $row['angkatan'] . "'>";
                            echo "<input type='hidden' name='tanggal' value='" . $row['tanggal'] . "'>";
                            echo "<input type='hidden' name='jam' value='" . $row['jam'] . "'>";
                            echo "<input type='submit' value='Update' class='submit' style='width:100%'>";
                            echo "</form></a>";
                            echo "</td>";
                        }
                        echo "</tr>";
                    }}
            ?>
        </tbody>
        </table>
    </div>
    <div id="chart-container">
        <div>
            <h2 id="chart">Chart</h2>
            <div class="chart-con">
                <div class="canvas">
                    <canvas id="myChart" style="height:98%" ></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="b"> 
        <a href="Form_jadwal_kosong.php" style="text-decoration:none;">
            <button type="button" class="button-jadwal" >+</button>
        </a>
    </div>

    <?php include "chartJadwal.php"?>

    <!-- Footer -->
    <footer>
        <p>&copy; STIS BRIDGE CLUB</p>
    </footer>


    <script >
        const data = {
    labels:<?php echo json_encode($hariLabels); ?> ,
    datasets: [{
        label: 'Hari bisa latihan',
        data: <?php echo json_encode($jumlahData); ?>,
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(20,215,0)',
        'rgb(191,0,255)',
        'rgb(255,0,0)',
        'rgb(0,0,255)'
        ],
        hoverOffset: 4
    }]
    };
    const config = {
        type: 'pie',
        data: data,
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
        );
    </script>

    <script src="asset/js/script.js"></script>
    <script src="asset/js/script_tampilan.js"></script>
    <script>
        function showHint(str) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("bodi").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "filter_jadwal.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("search=" + str);
        }
    </script>
    <script>
        let sort = "";
        function sortTable(column) {
            var symbol = document.getElementById(column);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("bodi").innerHTML = this.responseText;
                }
            };
            if (sort === column + "_asc") { 
                xhttp.open("GET", "sort_jadwal.php?column=" + column + "&order=desc", true);
                sort = column + "_desc";
                symbol.innerHTML = "&#9652;";
            } else {
                xhttp.open("GET", "sort_jadwal.php?column=" + column + "&order=asc", true);
                sort = column + "_asc";
                symbol.innerHTML = "&#9662;";
            }
            xhttp.send();
        }
    </script>
</body>
</html>