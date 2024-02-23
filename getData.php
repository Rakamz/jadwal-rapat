<?php
// Sambungkan ke database MySQL Anda
$host = "localhost";
$username = "root";
$password = "";
$database = "user_authentication";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Query untuk mengambil jumlah pertemuan per tempat
$query = "SELECT tempat, COUNT(*) as count FROM meetings GROUP BY tempat";

$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Tutup koneksi database
$conn->close();
?>
