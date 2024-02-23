<?php
// delete.php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $connection = mysqli_connect("localhost", "root", "", "user_authentication");

    $query = "DELETE FROM meetings WHERE id=$id";
    mysqli_query($connection, $query);

    header("Location:../jadwal-rapat-admin.php");
}
?>