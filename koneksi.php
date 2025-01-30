<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Warteg";

$conn = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
  }
?>