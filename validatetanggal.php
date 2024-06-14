<?php
    $tanggal = $_POST["tanggal"];
    $today = date("Y-m-d");

    if ($tanggal < $today) {
        echo "Tanggal harus lebih besar atau sama dengan hari ini";
    } else {
        echo "valid";
    }
?>
