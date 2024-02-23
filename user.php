<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUSKODAL</title>
    <link rel="icon" href="img/logooo.jpg" type="image-logo" class="logo_title">
    <link rel="stylesheet" href="css/stylee.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onbeforeunload="window.scrollTo(0, 0);">
    <header>
        <div class="header-left">
            <div class="logo">
                <img src="./img/logooo.jpg" alt="" class="logo-p">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="" class="active">Beranda</a>
                    </li>
                    <li>
                        <a href="jadwal-rapat-user.php" >Jadwal Rapat</a>
                    </li>
                    <li>
                        <a href="galeri-user.php">Galeri</a>
                    </li>
                    <li>
                        <a href="grafik.php">Grafik</a>
                    </li>
                    <li>
                        <a href="">Kontak</a>
                    </li>
                </ul>
                <div class="login-signup">
                     <a href="index.html">logout</a>
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
        <div class="main-index">
                <img src="img/background.png" alt=""class="background">
                <h1>PUSKODAL</h1>
                <h2>(Pusat Komando Dan Pengendalian)</h2>
                <p>Puskodal adalah Akronim dari Pusat Komando dan Pengendalian. Dinamai Puskodal karena didalamnya mengendalikan dan membuat berbagai macam software aplikasi buatan maupun instalasi kebutuhan Pemerintahan Provinsi Jawa Barat, diantaranya yaitu Monitoring Kelistrikan, Buku Tamu Online, SMS Gateway, Teleconference, CCTV, IP Camera dan masih banyak lagi.</p>
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
        

        document.addEventListener("DOMContentLoaded", function () {
  // Scroll ke bagian atas saat halaman dimuat ulang
  window.scrollTo(0, 0);
});


    </script>
</body>
</html>