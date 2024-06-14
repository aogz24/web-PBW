<?php
    $db_hostname = "localhost"; // Write your own db server here
    $db_database = "mhs_222111855"; // Write your own db name here
    $db_username = "root"; // Write your own username here
    $db_password = "Ar132109132109"; // Write your own password here
    // For the best practice, don’t use your “real” password when submitting your work
    $db_charset = "utf8mb4"; // Optional
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    );
    try {
        $conn = new PDO($dsn,$db_username,$db_password,$opt);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = $conn->query('SELECT * FROM `user` WHERE 1');
        $found = false;

        foreach($stmt as $baris){
            if($baris['email']===$email && $baris['password']===md5("1StyU6".$password."lkaj")){
                $found = true;
                $session_expiration = 1800;
                session_start();
                $_SESSION['last_activity'] = time() + $session_expiration;
                // Melakukan pengecekan waktu kadaluarsa pada setiap halaman yang memerlukan sesi
                if (isset($_SESSION['last_activity']) && (time() > $_SESSION['last_activity'])) {
                    // Sesuaikan tindakan yang diinginkan saat sesi kadaluarsa, seperti menghapus sesi atau melakukan logout
                    // Contoh:
                    session_unset();  // Menghapus semua data sesi
                    session_destroy();  // Menghancurkan sesi

                    // Redirect ke halaman login atau halaman lain yang sesuai
                    header('Location: login.php');
                    exit;
                } else {
                    // Update waktu kadaluarsa sesi setiap kali ada aktivitas pengguna
                    $_SESSION['last_activity'] = time();
                }
                $_SESSION['email']=$email;
                $_SESSION['login']=true;
                $_SESSION['username']=$baris['username'];
                $_SESSION['isAdmin']=$baris['is_admin'];
                header('Location: home.php');
                exit;
            } 
        }


        if (!$found) {
            // echo "<script>alert('Password atau email salah');</script>";
            // header('Location: login.php');
            // exit;
            echo '<script>alert("Password atau email salah"); window.location.href = "login.php";</script>';
        }

        $pdo = NULL;
        }
        catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
        }
?>