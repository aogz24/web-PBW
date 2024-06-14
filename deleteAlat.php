<?php
    require "database.php";
    try {

        $id = $_REQUEST["id"];

        $sql1 = "SELECT surat_peminjaman FROM alat WHERE id = :id";
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $suratPeminjaman = $result['surat_peminjaman'];
            $targetDir = "uploads/";
            $filePath = $targetDir . $suratPeminjaman;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $sql = "DELETE FROM `alat` WHERE `id`='$id'";
        $conn->exec($sql);
        echo "Data berhasil dihapus dengan slot:".$slot1;

        $pdo = NULL;
        header("Location: Peminjaman_alat.php");
        exit;
        }
        catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
        }
?>