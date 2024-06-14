<?php
    require "database.php";
    try {

        $id = $_REQUEST["id"];

        $sql = "DELETE FROM `jadwal` WHERE `id`='$id'";
        $conn->exec($sql);
        echo "Data berhasil dihapus dengan slot:".$slot1;

        $pdo = NULL;
        header("Location: Jadwal_Kosong.php");
        exit;
        }
        catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
        }
?>