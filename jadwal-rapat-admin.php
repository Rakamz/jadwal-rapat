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


    <style>
        .print{
            position: relative;
            padding: 10px;
            border-radius: 25px;
        }
    </style>
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
                        <a href="input_data.php">Input Data Rapat</a>
                    </li>
                    <li>
                        <a href="#"  class="active" >Jadwal Rapat</a>
                    </li>
                    <li>
                        <a href="galeri-admin.php">Galeri</a>
                    </li>
                    <li>
                        <a href="grafik-admin.php">Grafik</a>
                    </li>
                    <li>
                        <a href="contact.php">Kontak</a>
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
            <img src="img/background.png" alt=""class="background">
    
            <div class="container-table">
        <h1>Daftar Jadwal Rapat</h1>
<!-- ... Bagian HTML lainnya ... -->
<div class="search-container">
    <input type="text" id="search-input" placeholder="Cari...">

    <button onclick="printTable()" class="print">Cetak Tabel</button>

<script>
function printTable() {
    var printWindow = window.open('', '', 'width=600,height=600');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Cetak Tabel</title></head><body>');
    printWindow.document.write('<h1>Tabel Jadwal Rapat</h1>');
    printWindow.document.write(document.querySelector('table').outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}
</script>

<table>
<thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th>Acara</th>
        <th>Panitia</th>
        <th>Tempat</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    </thead>
     <tbody>
    <?php
    $counter = 1;         
    while ($row = mysqli_fetch_assoc($result)) :
    ?>
        <tr>
            <td><?= $counter++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['Mulai']; ?></td>
            <td><?= $row['Selesai']; ?></td>
            <td><?= $row['acara']; ?></td>
            <td><?= $row['Panitia']; ?></td>
            <td><?= $row['tempat']; ?></td>
            <td><img src="img/<?= $row['gambar']; ?>" width="50" height="50"></td>
            <form id="deleteForm" action="process/delete-selected.php?id_room=<?php echo $row["id_room"] ?>" method="post">
                                <td style="display: flex; justify-content: center; align-items: center;">
                                    <label for="data1">
                                        <input type="checkbox" class="checkbox" name="data[]" value="<?php echo $row["id_room"];?>" data-id="<?php echo $row["id_room"];?>"> 
                                    </label>
                                </td>
                                    <!-- Script for chance href -->
                                    <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const checkboxes = document.querySelectorAll(".checkbox");
                                        
                                        checkboxes.forEach(function (checkbox) {
                                            checkbox.addEventListener("change", function () {
                                                let selectedIds = [];
                                                
                                                // Mengumpulkan ID prangkat yang dicentang
                                                checkboxes.forEach(function (cb) {
                                                    if (cb.checked) {
                                                        selectedIds.push(cb.value);
                                                    }
                                                });
                                                
                                                // Membuat tautan dengan ID yang dipilih
                                                const href = "edit.php?id_prangkat=" + selectedIds.join(",") + "&id_room=<?php echo $row["id_room"];?>";
                                                
                                                // Mengubah tautan href
                                                document.getElementById("myLink").setAttribute("href", href);
                                            });
                                        });
                                    });
                                    </script>
                                        <?php endwhile ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </tr>
                <div class="action">
                    <label for=""></label>
                    <input type="submit" class="del" value="Hapus" onclick="return confirm('Apakah kamu yakin ingin menghapus ini?')">
                </form>
                <button class="edit" id="editButton" >Edit</button>
                </div>

</table>




<!-- Tambahkan tombol "Hapus yang Dipilih" -->
</div>
</main>

<!-- ... Bagian HTML lainnya ... -->


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
    </script>
<script>
function searchMeeting() {
    var input, filter, table, tr, td, i, txtValue, filterBy;
    input = document.getElementById("search-input");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    var radioButtons = document.getElementsByName("search-type");
    for (var j = 0; j < radioButtons.length; j++) {
        if (radioButtons[j].checked) {
            filterBy = radioButtons[j].value;
            break;
        }
    }

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[getIndexByFilter(filterBy)];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


</script>
<script>
// Memilih elemen input pencarian
var input = document.getElementById("search-input");

// Mendengarkan perubahan input
input.addEventListener("input", function() {
    searchMeeting();
});

function searchMeeting() {
    var filter, table, tr, td, i, txtValue;
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        var display = false; // Menyimpan status tampilan baris
        for (var j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    display = true;
                    break; // Jika ada kecocokan, tampilkan baris
                }
            }
        }
        tr[i].style.display = display ? "" : "none";
    }
}
</script>

<script src="edit-button.js"></script>

</body>
</html>
