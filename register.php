<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Warteg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama = mysqli_real_escape_string($conn,$_POST['name']);
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$simpan = "INSERT INTO pengguna (nama, username, password) VALUES('$nama', '$username', '$hash_password')";

if (mysqli_query($conn, $simpan)) {
    echo '<script>
            alert("Registrasi Berhasil");
            window.location.href = "login.html";
          </script>';
} else {
    echo "Error: " . $simpan . "<br>" . $conn->error;
}

$conn->close();
?>