
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="asset/img/logo-sbc.ico">
    <style>
        body{
            background-color: rgba(224, 222, 219, 0.903);
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }

        
        .dropbtn {
            background-color: transparent;
            color: #000;
            padding: 8px 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Show the dropdown content when dropdown button is hovered or focused */
        .dropdown:hover .dropdown-content,
        .dropdown:focus .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header style="display: flex;background-color: rgb(248, 187, 194); justify-content: space-evenly;">
        <a href="https://instagram.com/sbc.stis?igshid=YmMyMTA2M2Y=" style="margin: 2px 2px;">
            <img src="asset/img/instagram.ico" alt="icon">
        </a>
        <a href="https://instagram.com/sbc.stis?igshid=YmMyMTA2M2Y=" style="margin: 2px 2px;">
            <img src="asset/img/web.ico" alt="icon">
        </a>
    </header>
    <!-- Header END -->
    
    <!-- NAVBAR -->
    <nav>
        <div class="logo">
            <img src="asset/img/logo-sbc.png" alt="logo">
            <h4 class="h4">STIS BRIDGE CLUB</h4>
        </div>
    <ul>
            <li>
                <a href="home.php" class="a-navbar">Home</a>
            </li>
            <li>
                <a href="about.php" class="a-navbar">Tentang Bridge</a>
            </li>
            <li>
                <a href="Jadwal_Kosong.php" class="a-navbar">Latihan</a>
            </li>
            <li>
                <a href="Peminjaman_alat.php" class="a-navbar">Peminjaman</a>
            </li>
            <li>
                <a href="event.php" class="a-navbar">Kegiatan</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn" style="color:aqua;"><span><?php 
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }                
                echo $_SESSION['username'] ?></span></a>
                <div class="dropdown-content">
                    <?php if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    if($_SESSION['isAdmin']==1){
                        echo '<a href="admin.php">Halaman admin</a>';
                    }?>
                    <a href="akun.php">Informasi Akun</a>
                    <a href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <script src="asset/js/script.js"></script>
</body>
</html>