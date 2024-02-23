<?php
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST["tanggal"];
    $Mulai = $_POST["Mulai"];
    $Selesai = $_POST["Selesai"];
    $acara = $_POST["acara"];
    $id_panitia = $_POST["id_panitia"];
    $id_room = $_POST["id_room"];

    // Mengunggah gambar tempat
    $uploadDir = "../img/";
    $gambarName = $_FILES["gambar"]["name"];
    $gambarTmp = $_FILES["gambar"]["tmp_name"];
    $targetPath = $uploadDir.basename($gambarName);
    move_uploaded_file($gambarTmp, $targetPath);
    $gambarPath = $targetPath;

    // Koneksi ke database
    $connection = mysqli_connect("localhost", "root", "", "user_authentication");

    // Query untuk mendapatkan nama ruangan berdasarkan id_room
    $getRoomQuery = "SELECT ruangan FROM mt_room WHERE id_room = $id_room";
    $resultRoom = mysqli_query($connection, $getRoomQuery);

    // Query untuk mendapatkan nama biro berdasarkan id_panitia
    $getPanitiaQuery = "SELECT nama_biro FROM panitia WHERE id_panitia = $id_panitia";
    $resultPanitia = mysqli_query($connection, $getPanitiaQuery);

    if ($resultRoom && $resultPanitia) {
        $rowRoom = mysqli_fetch_assoc($resultRoom);
        $tempat = $rowRoom["ruangan"];

        $rowPanitia = mysqli_fetch_assoc($resultPanitia);
        $Panitia = $rowPanitia["nama_biro"];

        // Query untuk memasukkan data ke dalam tabel meetings
        $query = "INSERT INTO meetings (tanggal, Mulai, Selesai, acara, Panitia, tempat, gambar) 
                  VALUES ('$tanggal', '$Mulai', '$Selesai', '$acara', '$Panitia', '$tempat', '$gambarPath')";
        
        mysqli_query($connection, $query);

        header("Location: ../jadwal-rapat-admin.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
