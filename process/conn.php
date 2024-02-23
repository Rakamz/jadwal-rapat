<?php
$dbhost  = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'user_authentication';
$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if( $conn->connect_error )
{
 die( 'Oops!! Koneksi Gagal : '. $conn->connect_error );
}   
?>