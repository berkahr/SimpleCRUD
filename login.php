<?php 
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($conn, "select * from pengguna where username='$username'");
$data = mysqli_fetch_assoc($login);

if ($data>0) {
    if (password_verify($password, $data['password'])) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $data['nama'];
        $_SESSION['role'] = $data['role'];
        if(($_POST['remember_me']==1)||($_POST['remember_me']=='on')){
          $remember=time()+3600;
          setcookie('nama',$data['nama'],$remember);
          setcookie('username',$username,$remember);
          setcookie('active',1,$remember);
        }
        if($data['role']=='admin'){
          header('location:dashboard_admin.php');
        } else if($data['role']==''){
          header("location:dashboard.php"); 
        }
        exit();
    } else {
        echo '<script>
        alert("Password salah");
        window.location.href = "login.html";
      </script>';
    }
} else {
    echo '<script>
            alert("Username tidak ditemukan");
            window.location.href = "login.html";
          </script>';
}

$conn->close();
?>