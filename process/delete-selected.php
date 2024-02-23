<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dipilih dari checkbox
    if (isset($_POST["data"]) && is_array($_POST["data"])) {
        $dataToDelete = $_POST["data"];
        
        // Koneksi ke database (gantilah dengan informasi database Anda)
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "user_authentication";

        $conn = new mysqli($host, $username, $password, $database);
        $id_room = $_GET["id_room"];

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Hapus data dari tabel berdasarkan ID yang dipilih
        foreach ($dataToDelete as $id) {
            $sql = "DELETE FROM meetings WHERE id_room = $id";
            mysqli_query($conn, "UPDATE meetings SET total=total-1 WHERE id_room
            ='$id_room'");

            if ($conn->query($sql) === TRUE) {
                header("location:../jadwal-rapat-admin.php?id_room=$id_room");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    } else {
        echo "Tidak ada data yang dipilih untuk dihapus.";
    }
}
?>