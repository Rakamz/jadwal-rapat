<!DOCTYPE html>
<html lang="en">
<head>
<title>Gallery</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="icon" href="img/logooo.jpg" type="image-logo" class="logo_title">
    <link rel="stylesheet" href="css/galeri.css?v=<?php echo time()?>">
</head>
<body>
<header>
        <div class="header-left">
            <div class="logo">
                <img src="./img/logooo.jpg" alt="" class="logo-nav">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="user.php">Beranda</a>
                    </li>
                    <li>
                        <a href="jadwal-rapat.php" >Jadwal Rapat</a>
                    </li>
                    <li>
                        <a href="#"  class="active" >Galeri</a>
                    </li>
                    <li>
                        <a href="grafik.php">Grafik</a>
                    </li>
                    <li>
                        <a href="">Kontak</a>
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
    <div class="main">
            <img src="./img/background.png" alt="" class="logo-p">
            <div class="container">

<h3 style="text-align: center; font-size: 35px;color:azure" ><i><b>Galeri Puskodal</b></i></h3>

<div class="row">
    <div class='list-group gallery' style="width:100%;">
        <?php
        require('process/conn.php');

        $sql = "SELECT * FROM image_gallery";
        $images = $conn->query($sql);

        while ($image = $images->fetch_assoc()) {

        ?>
            <div class='gambar' style="float: left;">

                <a class="thumbnail fancybox" rel="ligthbox" href="./uploads/<?php echo $image['image'] ?>">
                
                    <img alt="" src="./uploads/<?php echo $image['image'] ?>" />
                    <div class='text-center'>
                        <small class='text-muted'><?php echo $image['title'] ?></small>
                    </div> <!-- text-center / end -->
                </a>

                <!-- form to delete image -->
                

            </div> <!-- col-6 / end -->
        <?php } ?>

    </div> <!-- list-group / end -->
</div> <!-- row / end -->
</div> <!-- container / end -->
    </div>
            
     </div>
    </main>

    <footer class="footer">
        <div class="footer-left">
            <h3>PUSKODAL</h3>
            <div class="credit-cards">
                <img src="img/logooo.jpg" alt=""class="logo-nav">
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
    <script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none",
        });
    });
</script>
</body>
</html>
