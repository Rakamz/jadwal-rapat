<?php
// edit.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET["id"];
    $tanggal = $_POST["tanggal"];
    $jam = $_POST["jam"];
    $acara = $_POST["acara"];
    $tempat = $_POST["tempat"];

    $connection = mysqli_connect("localhost", "username", "password", "user_authentication");

    $query = "UPDATE meetings SET tanggal='$tanggal', jam='$jam', acara='$acara', tempat='$tempat' WHERE id=$id";
    mysqli_query($connection, $query);

    header("Location: ../jadwal-rapat-admin.php");
}
?>

<!-- Kode HTML untuk formulir pengeditan data rapat -->

<?php
require "conn.php";


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
    <link rel="stylesheet" href="../css/stylee.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="../css/style-jadwal.css?v=<?php echo time()?>">
</head>
<body>

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
