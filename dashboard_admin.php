<?php
include 'koneksi.php';
    if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
      echo '<script>
      alert("Akses ditolak");
      window.location.href = "login.html";
      </script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styleadmin.css"/>
    <title>Warteg Online</title>
</head>
<body>
    <div class="crud">
        <div class="active">
            <a href="#" data-content="home.php">Home</a>
        </div>
        <div>
            <a href="#" data-content="menu.php">Menu</a>
        </div>
        <div>
            <a href="#" data-content="tambah.php">Tambah</a>
        </div>  
    </div>
    <div class="container" id="main-content">
        <div class="main">
            <div>selamat datang <?php echo $_SESSION['name'];?></div>
            <a href="index.html">Logout</a>
        </div>
    </div>
    <script>
        const divlink = document.querySelectorAll('.crud div')
        const mainContent = document.getElementById('main-content');
        divlink.forEach(items => {
            items.addEventListener('click',() =>{
                divlink.forEach(items =>{
                    if(items.classList.contains('active')){
                        items.classList.remove('active');
                    };
                });
                items.classList.add('active');
                const file = event.target.getAttribute('data-content');
                fetch(file)
                .then(response => response.text())
                .then(data => {
                    mainContent.innerHTML = data;
                })
                .catch(error  => {
                    mainContent.innerHTML = "<p>Error memuat halaman</p>";
                    console.error('Error:', error)
                });

            });
        });
    </script>
</body>
</html>

