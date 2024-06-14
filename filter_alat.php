<?php
session_start();
require "database.php";

// Ambil nilai pencarian dari permintaan Ajax
$search = $_POST['search'];


$sql = "SELECT * FROM alat WHERE nama LIKE '%$search%'";

// Eksekusi query
$result = $conn->query($sql);

// Tampilkan hasil dalam bentuk tabel
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
} else {
    echo "<tr><td colspan='6'>Tidak ada hasil.</td></tr>";
}

$conn=null;
?>