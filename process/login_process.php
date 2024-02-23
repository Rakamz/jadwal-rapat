<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_authentication";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    echo "koneksi error : ".mysqli_connect_error();
}

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

if(isset($_POST["login"])){
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        
    if(mysqli_num_rows($result) == 1){
        $query = mysqli_fetch_assoc($result);
        $name = $query["username"];
        $password_data = $query['password'];
            
        if(!empty($username) && !empty($password)){
            if($password == $password_data){
                $code = $query["id"];

                $_SESSION["user_login"] = true;

                if($query["role"] == 'admin') {
                    header("Location: ../admin.html");
                } else {
                    header("Location: ../user.php");
                }
                exit();
            } else {
                echo "<script> 
                alert('Password salah') ;
                document.location.href = '../login.php';
                </script>";
            }
        } else {
            echo "<script> 
            alert('Username atau password kosong') ;
            document.location.href = '../login.php';
            </script>";
        }
    } else {
        echo "<script> 
        alert('Username tidak ditemukan') ;
        document.location.href = '../login.php';
        </script>";
    }
}

mysqli_close($conn);
?>