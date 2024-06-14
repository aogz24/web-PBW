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
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <link rel="stylesheet" href="style/style.css">
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
    <form class="example" action="action_page.php">
        <input type="text" placeholder="Cari dengan nama..." name="search" onkeyup="showHint(this.value)">
    </form>

    <div class="table-alat" style="width: 100vw; height:80%; overflow-x:scroll; align-self: center;">
        <h1 style="align-self: center;">Peminjaman alat</h1>
        <table style="width:98%; margin : auto; overflow: scroll; align-self: center;">
            <thead>
                <tr>
                    <th >Nama <span onclick="sortTable('nama')" id="nama">&#9652; </span></th>
                    <th>Jenis Kelamin  <span onclick="sortTable('jenis_kelamin')" id= 'jenis_kelamin'>&#9652; </span></th>
                    <th>Angkatan  <span onclick="sortTable('angkatan')" id="angkatan">&#9652; </span></th>
                    <th>Barang yang dipinjam</th>
                    <th >Tanggal Pinjam  <span onclick="sortTable('tanggal_peminjaman')" id="tanggal_peminjaman">&#9652; </span></th>
                    <th >Tanggal Pengembalian <span onclick="sortTable('tanggal_pengembalian')" id="tanggal_pengembalian">&#9652; </span></th>
                    <th>Jumlah</th>
                    <?php if($_SESSION['isAdmin']==1 or $_SESSION['email']==$row['email_pembuat']){
                        echo '<th>Surat peminjaman</th>';
                        echo '<th>action</th>';
                    } ?>
                    
                </tr>
            </thead>
            <tbody id="bodi">
                <?php require "tabelAlat.php"?>
                <?php 
                    if (count($results) > 0) {
                        foreach ($results as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['jenis_kelamin'] . "</td>";
                            echo "<td>" . $row['angkatan'] . "</td>";
                            echo "<td>" . $row['alat'] . "</td>";
                            echo "<td>" . $row['tanggal_peminjaman'] . "</td>";
                            echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
                            echo "<td>" . $row['jumlah'] . "</td>";
                            if($_SESSION['isAdmin']==1 or $_SESSION['email']==$row['email_pembuat']){
                                echo '<td><a href="uploads/' . $row['surat_peminjaman'] . '">Download File</a></td>';
                                echo '<td style="display:flex">';
                                echo "<a href='deleteAlat.php?id=",$row["id"],"'><img src='asset/img/remove.png' style='width:30px;height:30px;'></a>";
                                echo "<form action='Form_Peminjaman_alat2.php' method='post'>";
                                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                echo "<input type='hidden' name='token' value='4kUaN4k1Nd0Ne5iA'>";
                                echo "<input type='hidden' name='nama' value='" . $row['nama'] . "'>";
                                echo "<input type='hidden' name='angkatan' value='" . $row['angkatan'] . "'>";
                                echo "<input type='hidden' name='tanggal_peminjaman' value='" . $row['tanggal_peminjaman'] . "'>";
                                echo "<input type='hidden' name='tanggal_pengembalian' value='" . $row['tanggal_pengembalian'] . "'>";
                                echo "<input type='hidden' name='jumlah' value='" . $row['jumlah'] . "'>";
                                echo "<input type='submit' value='Update' class='submit' style='width:100%'>";
                                echo "</form>";
                                echo '</td>';
                            }
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="b">
        <a href="Form_Peminjaman_alat.php" style="text-decoration:none;">
            <button type="button" class="button-jadwal">+</button>
        </a> 
    </div>

    <div class="b">
        
    </div>

    <!-- Footer -->
    <footer class="foo">
        <p>&copy; STIS BRIDGE CLUB</p>
    </footer>

    <script src="asset/js/script.js"></script>

    <script>
        function showHint(str) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("bodi").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "filter_alat.php", true);
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
            xhttp.open("GET", "sort_alat.php?column=" + column + "&order=desc", true);
            sort = column + "_desc";
            symbol.innerHTML = "&#9652;";
        } else {
            xhttp.open("GET", "sort_alat.php?column=" + column + "&order=asc", true);
            sort = column + "_asc";
            symbol.innerHTML = "&#9662;";
        }
        xhttp.send();
    }
</script>

</body>
</html>