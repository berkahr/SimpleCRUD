<?php
include 'koneksi.php';
    // Cek apakah admin sudah login
    if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
      echo '<script>
      alert("Akses ditolak");
      window.location.href = "login.html";
      </script>';
      exit();
    }

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM menu WHERE id=$id";
    
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dihapus";
            header("Location: dashboard_admin.php"); // Redirect ke halaman utama
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>