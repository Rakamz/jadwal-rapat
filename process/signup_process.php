<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_authentication";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    echo "koneksi error : ".mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Insert data into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to login.php with a success message
        header("Location: login.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
