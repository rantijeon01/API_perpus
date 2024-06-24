<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpus";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("connection failed: ".$koneksi->connect_error);
}


?>