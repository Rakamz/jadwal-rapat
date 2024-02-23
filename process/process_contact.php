<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Konfigurasi email
    $to = "puskodal86@gmail.com"; // Ganti dengan alamat email tujuan
    $subject = "Pesan dari: $name";
    $headers = "From: $email";
    
    // Kirim email
    if (mail($to, $subject, $message, $headers)) {
        echo "Pesan Anda telah terkirim. Terima kasih!";
    } else {
        echo "Maaf, ada masalah saat mengirim pesan Anda.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>