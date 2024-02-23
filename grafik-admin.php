<?php
// Konfigurasi database Anda
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user_authentication';

// Membuat koneksi ke database
$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Koneksi ke database gagal: " . $connection->connect_error);
}

// Query untuk mengambil data
$query = "SELECT tempat, COUNT(*) as jumlah FROM meetings GROUP BY tempat";
$result = $connection->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Menutup koneksi ke database
$connection->close();

// Mengkonversi data menjadi format JSON
$dataJSON = json_encode($data);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUSKODAL</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <link rel="icon" href="img/logooo.jpg" type="image-logo" class="logo_title">
    <link rel="stylesheet" href="css/stylee.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="css/grafik.css?v=<?php echo time()?>">
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
                        <a href="admin.html">Beranda</a>
                    </li>
                    <li>
                        <a href="input_data.php">Input Data Rapat</a>
                    </li>
                    <li>
                        <a href="jadwal-rapat-admin.php" >Jadwal Rapat</a>
                    </li>
                    <li>
                        <a href="galeri-admin.php">Galeri</a>
                    </li>
                    <li>
                        <a href="#"class="active">Grafik</a>
                    </li>
                    <li>
                        <a href="contact.php">Kontak</a>
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
                <img src="img/background.png" alt="" class="bgmain">
                
                <div class="grafik" id="grafik1">
                <tr>
    <td><h2>Grafik Ruang Rapat Gedung Sate </h2>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['jk', 'tempat']
      <?php
      require'process/conn.php';
      $query = $conn -> query ("SELECT * FROM meetings GROUP by tempat");
      foreach ($query as $key => $value){
        $angka = mysqli_num_rows($conn -> query ("SELECT * FROM meetings WHERE tempat = '".$value ['tempat']."'"));
        echo ",['".$value['tempat']."', ".$angka."]";
      }
      ?>
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
 
    <center>
    <div id="piechart_3d" style="width: 700px; height: 500px;"></div>
  </center></td>

    </div>
</div>


</script>

<div class="grafik" id="grafik2">
                <tr>
    <td><h2>Grafik Ruang Rapat Gedung Sate </h2>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['jk', 'tempat']
      <?php
      require'process/conn.php';
      $query = $conn -> query ("SELECT * FROM meetings GROUP by tempat");
      foreach ($query as $key => $value){
        $angka = mysqli_num_rows($conn -> query ("SELECT * FROM meetings WHERE tempat = '".$value ['tempat']."'"));
        echo ",['".$value['tempat']."', ".$angka."]";
      }
      ?>
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.BarChart(document.getElementById('bar_chart'));
        chart.draw(data, options);
      }
    </script>
 
    <center>
    <div id="bar_chart" style="width: 700px; height: 500px;"></div>
  </center></td>
</div>
    </div>







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