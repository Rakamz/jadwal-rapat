<?php
require "conn.php";

if (isset($_POST['add'])) {
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['Mulai'];
    $jam = $_POST['Selesai'];
    $acara = $_POST['acara'];
    $jam = $_POST['Panitia'];
    $tempat = $_POST['tempat'];

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($gambar_tmp, "../img/$gambar");

    $query = "INSERT INTO meetings (tanggal, Mulai, Selesai, acara, Panitia, tempat, gambar) VALUES ('$tanggal', '$Mulai', '$Selesai', '$acara', '$Panitia', '$tempat', '$gambar')";
    $conn->query($query);
    header('Location: ../jadwal-rapat-admin.php');
}
?>
