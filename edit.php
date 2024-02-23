<?php
// Langkah 1: Buat koneksi ke database
$host = 'localhost'; // Ganti dengan host Anda
$username = 'root'; // Ganti dengan username Anda
$password = ''; // Ganti dengan password Anda
$database = 'user_authentication'; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Langkah 2: Tangkap ID dari parameter URL
if (isset($_GET['id_room'])) {
    $id = $_GET['id_room'];

    // Langkah 3: Query SQL SELECT untuk mengambil data yang akan diubah
    $query = "SELECT * FROM meetings WHERE id_room = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id_room'];
        $tanggal = $row['tanggal'];
        $Mulai = $row['Mulai'];
        $Selesai = $row['Selesai'];
        $acara = $row['acara'];
        $Panitia = $row['Panitia'];
        $tempat = $row['tempat'];
        $gambar = $row['gambar'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak diberikan.";
    exit;
}

// Langkah 4: Tampilkan data dalam formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_baru = $_POST['tanggal'];
    $Mulai_baru = $_POST['Mulai'];
    $Selesai_baru = $_POST['Selesai'];
    $acara_baru = $_POST['acara'];
    $Panitia_baru = $_POST['Panitia'];
    $tempat_baru = $_POST['tempat'];
    $gambar_baru = $_POST['gambar'];

    // Langkah 5: Query SQL UPDATE untuk menyimpan perubahan
    $update_query = "UPDATE meetings SET 
        tanggal = '$tanggal_baru',
        Mulai = '$Mulai_baru',
        Selesai = '$Selesai_baru',
        acara = '$acara_baru',
        Panitia = '$Panitia_baru',
        tempat = '$tempat_baru',
        gambar = '$gambar_baru'
        WHERE id_room = $id";

    if (mysqli_query($koneksi, $update_query)) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Ambil data Panitia dari tabel panitia
$query_panitia = "SELECT * FROM panitia ORDER BY id_panitia";
$result_panitia = mysqli_query($koneksi, $query_panitia);

// Ambil data Ruang Rapat dari tabel mt_room
$query_tempat = "SELECT * FROM mt_room ORDER BY id_room";
$result_tempat = mysqli_query($koneksi, $query_tempat);

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here (same as index.html) -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Acara</title>
    <link rel="icon" href="img/logooo.jpg" type="image-logo" class="logo_title">
    <link rel="stylesheet" href="css/stylee.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="css/style-jadwal.css?v=<?php echo time()?>">
</head>
<body>
    <main>
            <div class="main">
            <img src="img/background.png" alt="" class="background">
            <div class="container">
            <h2>Edit Data Acara</h2>
    <form method="POST" action="process/process_edit.php?id_room=<?php echo $row["id_room"] ?>">
    
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>"><br>

        <label for="Mulai">Mulai:</label>
        <input type="time" id="Mulai" name="Mulai" value="<?php echo $Mulai; ?>"><br>

        <label for="Selesai">Selesai:</label>
        <input type="time" id="Selesai" name="Selesai" value="<?php echo $Selesai; ?>"><br>

        <label for="acara">Acara:</label>
        <input type="text" id="acara" name="acara" value="<?php echo $acara; ?>"><br>

        <!-- Tampilan Panitia -->
        <label for="panitia">Pilih Panitia:</label>
        <select name="Panitia" style="width:200px;">
            <?php
            while ($data_panitia = mysqli_fetch_array($result_panitia)) {
                $selected = ($Panitia == $data_panitia['nama_biro']) ? 'selected' : '';
                echo '<option value="' . $data_panitia['nama_biro'] . '" ' . $selected . '>' . $data_panitia['nama_biro'] . '</option>';
            }
            ?>
        </select>

        <!-- Tampilan Ruang Rapat -->
        <label for="ruang_rapat">Pilih Ruang Rapat:</label>
        <select name="tempat" style="width:200px;">
            <?php
            while ($data_tempat = mysqli_fetch_array($result_tempat)) {
                $selected = ($tempat == $data_tempat['Ruangan']) ? 'selected' : '';
                echo '<option value="' . $data_tempat['Ruangan'] . '" ' . $selected . '>' . $data_tempat['Ruangan'] . '</option>';
            }
            ?>
        </select>

        <label for="gambar">Gambar Tempat:</label>
        <input type="file" id="gambar" name="gambar" accept="img/*" required value="<?php echo $gambar; ?>"><br>
        <input type="submit" value="Tambah Rapat">
    </form>
            </div>
            </div>
    </main>

</body>
</html>
