<?php
    session_start();
    // Cek apakah pengguna belum login, jika ya, arahkan ke halaman login
    if(!isset($_SESSION['login'])) {
        echo '<script>Alert("Anda belum login silahkan login dahulu");</script>';
        header("Location: login.php");
        exit;
    }
    if($_SESSION['isAdmin']!==1){
      header('Location: home.php');
    }

    $_SESSION['login_time'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <style>
        body{
            background-color: rgba(224, 222, 219, 0.903);
            font-family: Arial, sans-serif;
        }
    h1 {
      text-align: center;
    }

    .info-container {
      max-width: 400px;
      margin: 0 auto;
      height:74vh;
    }

    .info-container p {
      margin-bottom: 10px;
    }

    .info-container label {
      font-weight: bold;
    }

    .info-container input {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 14px;
    }
    footer{
        width:100vw;
        bottom:0;
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
    <h1>Halaman admin</h1>
    <?php require "database.php";
      $query = "SELECT username FROM user";
      $stmt = $conn->query($query);
    ?>

  <div class="info-container">
    <form method="POST" action="update_status.php">
    <label for="username">Username:</label>
    <select id="username" name="username" required>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
        <?php } ?>
    </select>
        <br>
        <label for="admin_status">Status Admin:</label>
        <select id="admin_status" name="admin_status">
            <option value="0">Non-Admin</option>
            <option value="1">Admin</option>
        </select>
        <br>
        <input type="submit" value="Simpan" style="color:black;">
    </form>
    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; STIS BRIDGE CLUB</p>
    </footer>
    <!-- Footer END -->
    <script src="asset/js/script.js"></script>
</body>
</html>