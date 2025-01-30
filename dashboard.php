<?php
include 'koneksi.php';
    if($_SESSION['username']==""){
      echo '<script>
      alert("Silahkan Login Terlebih dahulu");
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
    <link rel="stylesheet" href="styleuser2.css"/>
    <title>Warteg Online</title>
</head>
<body>
    <div class="navigation">
      <h3 class="logo"><a href="index.html">WB</a></h3>
        <ul class="center-links">
          <li class="Menu"><a href="#menu">Menu</a></li>
          <li class="Waktu"><a href="#Contact">Waktu</a></li>
          <li class="Lokasi"><a href="#lokasi">Lokasi</a></li>
        </ul>
        <ul>
          <div class="profile-container">
            <li class="user"><?php echo $_SESSION['name'];?></li>
            <a href="profil.php" class="profile"><i class="bi bi-person-circle" style="font-size: 25px;"></i></a>
            <!-- <div class="menuprofile">
              <div><a href="">Profile</a></div>
              <div><a href="logout.php">Logout</a></div>
            </div> -->
          </div>
          <li  class="logout"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <!-- <div class="menuprofile">
      <div><a href="">Profile</a></div>
      <div><a href="logout.php">Logout</a></div>
    </div> -->
    <a name="menu"></a>
    <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <img src="img\food1.png" alt="Teh Tarik" class="img-fluid">
              <h4>Teh Tarik</h4>
              <p>Teh tarik dengan rasa manis dan aroma yang khas, cocok untuk menemani makan siang.</p>
            </div>
            <div class="col-md-4">
              <img src="img\food1.png" alt="Kopi Hitam" class="img-fluid">
              <h4>Kopi Hitam</h4>
              <p>Kopi hitam pekat dan pahit, cocok untuk kamu yang suka kopi strong.</p>
            </div>
            <div class="col-md-4">
              <img src="img\food1.png" alt="Susu Jahe" class="img-fluid">
              <h4>Susu Jahe</h4>
              <p>Susu jahe hangat yang menyegarkan, cocok untuk menghangatkan badan.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <img src="img\food1.png" alt="Teh Tarik" class="img-fluid">
              <h4>Teh Tarik</h4>
              <p>Teh tarik dengan rasa manis dan aroma yang khas, cocok untuk menemani makan siang.</p>
            </div>
            <div class="col-md-4">
              <img src="img\food1.png" alt="Kopi Hitam" class="img-fluid">
              <h4>Kopi Hitam</h4>
              <p>Kopi hitam pekat dan pahit, cocok untuk kamu yang suka kopi strong.</p>
            </div>
            <div class="col-md-4">
              <img src="img\food1.png" alt="Susu Jahe" class="img-fluid">
              <h4>Susu Jahe</h4>
              <p>Susu jahe hangat yang menyegarkan, cocok untuk menghangatkan badan.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <img src="img\food1.png" alt="Teh Tarik" class="img-fluid">
              <h4>Teh Tarik</h4>
              <p>Teh tarik dengan rasa manis dan aroma yang khas, cocok untuk menemani makan siang.</p>
            </div>
            <div class="col-md-4">
              <img src="img\food1.png" alt="Kopi Hitam" class="img-fluid">
              <h4>Kopi Hitam</h4>
              <p>Kopi hitam pekat dan pahit, cocok untuk kamu yang suka kopi strong.</p>
            </div>
            <div class="col-md-4">
              <img src="img\food1.png" alt="Susu Jahe" class="img-fluid">
              <h4>Susu Jahe</h4>
              <p>Susu jahe hangat yang menyegarkan, cocok untuk menghangatkan badan.</p>
            </div>
          </div>
        </div>
    </div>
    <section class="border">
    <div class="container">
      <div class="waktu-text">Waktu Operasional</div>
      <div class="waktu-time">07:00 - 21:00</div>
    </div>
    <div class="maps">
      <a name="lokasi"></a>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.663948124194!2d106.78467046950175!3d-6.176811899613158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f658626c9431%3A0xbd9038f6ef3c8cd5!2sJl.%20Delima%20V%20No.29%2014%2C%20RT.8%2FRW.5%2C%20Tj.%20Duren%20Sel.%2C%20Kec.%20Grogol%20petamburan%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2011470!5e0!3m2!1sid!2sid!4v1726493046403!5m2!1sid!2sid" width="450" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
  </body>
</html>