<?php
// Langkah 1: Buat koneksi ke database (sama seperti pada file sebelumnya)
$host = 'localhost'; // Ganti dengan host Anda
$username = 'root'; // Ganti dengan username Anda
$password = ''; // Ganti dengan password Anda
$database = 'user_authentication'; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
$id = $_GET['id_room'];

// (Kode koneksi ke database - seperti yang diberikan sebelumnya)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_baru = $_POST['tanggal'];
    $Mulai_baru = $_POST['Mulai'];
    $Selesai_baru = $_POST['Selesai'];
    $acara_baru = $_POST['acara'];
    $Panitia_baru = $_POST['Panitia']; // Mengambil nilai dari formulir
    $tempat_baru = $_POST['tempat']; // Mengambil nilai dari formulir


    // Define the target directory for uploaded files
    $targetDir = "../img/";
    
    // Check if a file was uploaded
    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] === 0) {
        // Construct the target file path
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, proceed with updating the database
            
            $update_query = "UPDATE meetings SET 
                tanggal = '$tanggal_baru',
                Mulai = '$Mulai_baru',
                Selesai = '$Selesai_baru',
                acara = '$acara_baru',
                Panitia = '$Panitia_baru',
                tempat = '$tempat_baru',
                gambar = '$gambar_baru'
                WHERE id_room = $id";
            
            if ($koneksi->query($update_query) === TRUE) {
                header("Location: ../jadwal-rapat-admin.php?success=true");
            } else {
                echo "Error updating user: " . $koneksi->error;
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        // Proceed with updating the database without uploading a new file
        $update_query = "UPDATE meetings SET 
        tanggal = '$tanggal_baru',
        Mulai = '$Mulai_baru',
        Selesai = '$Selesai_baru',
        acara = '$acara_baru',
        Panitia = '$Panitia_baru',
        tempat = '$tempat_baru'
        WHERE id_room = $id";
            
        if ($koneksi->query($update_query) === TRUE) {
            header("Location: ../jadwal-rapat-admin.php?success=true");
        } else {
            echo "Error updating user: " . $koneksi->error;
        }
    }
} else {
    echo "Invalid request.";
}

        

$koneksi->close();
?>
