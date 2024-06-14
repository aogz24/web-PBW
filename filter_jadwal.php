<?php
// Koneksi ke database

session_start();

require "database.php";

// Ambil nilai pencarian dari permintaan Ajax
$search = $_POST['search'];

// Bangun query berdasarkan nilai pencarian
$sql = "SELECT * FROM jadwal WHERE nama LIKE '%$search%'";

// Eksekusi query
$result = $conn->query($sql);

// Tampilkan hasil dalam bentuk tabel
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada hasil.</td></tr>";
}

$conn=null;
?>
