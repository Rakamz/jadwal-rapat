<?php
require "process/conn.php";


$connection = mysqli_connect("localhost", "root", "", "user_authentication");

$query = "SELECT * FROM meetings";
$result = mysqli_query($connection, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here (same as index.html) -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Rapat</title>
    <link rel="icon" href="img/logooo.jpg" type="image-logo" class="logo_title">
    <link rel="stylesheet" href="css/stylee.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="css/style-jadwal.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<header>
        <div class="header-left">
            <div class="logo">
                <img src="./img/logooo.jpg" alt="" class="logo-p">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="admin.html">Beranda</a>
                    </li>
                    <li>
                        <a href="#"  class="active" >Input Data Rapat</a>
                    </li>
                    <li>
                        <a href="jadwal-rapat-admin.php">Jadwal Rapat</a>
                    </li>
                    <li>
                        <a href="galeri-admin.php">Galeri</a>
                    </li>
                    <li>
                        <a href="grafik.php">Grafik</a>
                    </li>
                    <li>
                        <a href="contact">Kontak</a>
                    </li>
                </ul>
                <div class="login-signup">
                    <a href="login.php">Login</a> or <a href="signup.php">Signup</a>
                </div>
            </nav>
        </div>
        <div class="header-right">
            <div class="login-signup">
                <a href="index.html">Logout</a>
            </div>
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
    <main>
    <main>
        <div class="main">
            <img src="img/background.png" alt="" class="background">

            <div class="container">
            <h2>Tambah Rapat Baru</h2>
        <form action="process/create.php" method="post" enctype="multipart/form-data">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" required><br>
            <label for="Mulai">mulai:</label>
            <input type="time" name="Mulai" required><br>
            <label for="Selesai">Selesai:</label>
            <input type="time" name="Selesai" required><br>
            <label for="acara">Acara:</label>
            <input type="text" name="acara" required><br>

            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
            <p>Pilih Panitia:</p>
            <select name="id_panitia" style="width:200px;">
               <?php
                include "process/conn.php";
                //query menampilkan Ruangan pegawai ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM panitia ORDER BY id_panitia");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?=$data['id_panitia'];?>"><?php echo $data['nama_biro'];?></option>
                <?php
                }
                ?>
            </select>

        <?php
        if (isset($_GET['id_panitia'])) {
            $id_room=$_GET['id_panitia'];
        }?>

            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
            <p>Pilih Ruang Rapat:</p>
            <select name="id_room" style="width:200px;">
               <?php
                include "process/conn.php";
                //query menampilkan Ruangan pegawai ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM mt_room ORDER BY id_room");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?=$data['id_room'];?>"><?php echo $data['Ruangan'];?></option>
                <?php
                }
                ?>
            </select>

        <?php
        if (isset($_GET['id_room'])) {
            $id_room=$_GET['id_room'];
        }?>
            <label for="gambar">Gambar Tempat:</label>
            <input type="file" name="gambar" accept="img/*" required><br>
            <input type="submit" value="Tambah Rapat">
            </form>
        </form>
    </form>
            </div>
        </div>
    </main>
            
    </div>
    </main>

    <footer class="footer">
        <div class="footer-left">
            <h3>PUSKODAL</h3>
            <div class="credit-cards">
                <img src="img/logooo.jpg" alt="">
            </div>
            <p class="footer-copyright">2023 @Rakamz</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Indonesia</span>Gedung Sate , Bandung - Jawa Barat</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+62 077-777-77</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="#">puskodal86@gmail.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="footer-about">
                <span>Tentang</span>
                Di Channel ini kita akan berbagi barbagai Tutorial design, Pemograman dan lain-lain. Silahkan subscribe untuk kemajuan channel ini, jangan lupa, like dan comments. agar channel ini semakin berkembang
            </p>

            <div class="footer-media">
                <a href="https://www.instagram.com/puskodal_gedung_sate" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/raka-muhamad-zidan-63865a27b" target="_blank"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>

    </footer>

    <script>
        hamburger = document.querySelector(".hamburger");
        nav = document.querySelector("nav");
        hamburger.onclick = function() {
            nav.classList.toggle("active");
        }
    </script>
</body>
</html>
