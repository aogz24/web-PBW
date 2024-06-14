<?php 

    session_start();
    require "database.php";
    $username = $_POST['username'];
    $admin_status = $_POST['admin_status'];

    $sql = "UPDATE user SET is_admin = :admin_status WHERE username = :username";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':admin_status', $admin_status);
    $stmt->bindParam(':username', $username);

    try {
        $stmt->execute();
        header('Location: admin.php');
    } catch (PDOException $e) {
        echo "Terjadi kesalahan saat memperbarui status admin: " . $e->getMessage();
    }

    $conn = null;

?>